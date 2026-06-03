<?php
/**
 * Admin order edit screen: shows the Partial COD meta box with advance/balance
 * status and a "Mark balance collected" button. HPOS-aware.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Admin_Order {

	const META_BOX_ID = 'pcod-admin-balance-box';
	const AJAX_ACTION = 'pcod_mark_balance_paid';
	const NONCE       = 'pcod_mark_balance_paid_nonce';

	public static function init() {
		add_action( 'add_meta_boxes', array( __CLASS__, 'register_meta_box' ), 30, 2 );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_action( 'wp_ajax_' . self::AJAX_ACTION, array( __CLASS__, 'ajax_mark_balance_paid' ) );
	}

	public static function register_meta_box( $screen_or_post_type, $post_or_order ) {
		$screen_id = self::resolve_screen_id();
		if ( ! $screen_id ) {
			return;
		}

		add_meta_box(
			self::META_BOX_ID,
			__( 'Partial COD', 'partial-cod' ),
			array( __CLASS__, 'render_meta_box' ),
			$screen_id,
			'side',
			'default'
		);
	}

	private static function resolve_screen_id() {
		if (
			class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' ) &&
			method_exists( '\Automattic\WooCommerce\Utilities\OrderUtil', 'custom_orders_table_usage_is_enabled' ) &&
			\Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled()
		) {
			return wc_get_page_screen_id( 'shop-order' );
		}
		return 'shop_order';
	}

	public static function render_meta_box( $post_or_order ) {
		$order = $post_or_order instanceof WC_Order ? $post_or_order : wc_get_order( $post_or_order->ID ?? 0 );
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			echo '<p>' . esc_html__( 'Not a Partial COD order.', 'partial-cod' ) . '</p>';
			return;
		}

		$advance        = (float) $order->get_meta( '_pcod_advance_amount' );
		$balance        = (float) $order->get_meta( '_pcod_balance_due' );
		$advance_status = $order->get_meta( '_pcod_advance_status' );
		$balance_status = $order->get_meta( '_pcod_balance_status' );
		$gateway_title  = $order->get_meta( '_pcod_advance_gateway_title' );

		?>
		<div class="pcod-admin-balance-box">
			<div class="pcod-row">
				<span><?php esc_html_e( 'Advance', 'partial-cod' ); ?></span>
				<span>
					<?php echo wp_kses_post( wc_price( $advance, array( 'currency' => $order->get_currency() ) ) ); ?>
					— <span class="pcod-status-<?php echo esc_attr( $advance_status ); ?>"><?php echo esc_html( ucfirst( $advance_status ) ); ?></span>
				</span>
			</div>
			<div class="pcod-row">
				<span><?php esc_html_e( 'Balance', 'partial-cod' ); ?></span>
				<span>
					<?php echo wp_kses_post( wc_price( $balance, array( 'currency' => $order->get_currency() ) ) ); ?>
					— <span class="pcod-status-<?php echo esc_attr( $balance_status ); ?>"><?php echo esc_html( ucfirst( $balance_status ) ); ?></span>
				</span>
			</div>
			<?php if ( $gateway_title ) : ?>
				<div class="pcod-row">
					<span><?php esc_html_e( 'Advance via', 'partial-cod' ); ?></span>
					<span><?php echo esc_html( $gateway_title ); ?></span>
				</div>
			<?php endif; ?>

			<?php if ( 'paid' !== $balance_status ) : ?>
				<p>
					<button
						type="button"
						class="button button-primary pcod-mark-balance-paid"
						data-order="<?php echo esc_attr( $order->get_id() ); ?>"
						data-nonce="<?php echo esc_attr( wp_create_nonce( self::NONCE ) ); ?>">
						<?php esc_html_e( 'Mark balance collected', 'partial-cod' ); ?>
					</button>
				</p>
			<?php else : ?>
				<p><em><?php esc_html_e( 'Balance has been collected.', 'partial-cod' ); ?></em></p>
			<?php endif; ?>
		</div>
		<?php
	}

	public static function enqueue_assets( $hook ) {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		if ( ! $screen ) {
			return;
		}
		if ( ! in_array( $screen->id, array( 'shop_order', wc_get_page_screen_id( 'shop-order' ) ), true ) ) {
			return;
		}

		wp_enqueue_style( 'pcod-admin', PCOD_URL . 'assets/css/pcod.css', array(), PCOD_VERSION );
		wp_enqueue_script(
			'pcod-admin',
			PCOD_URL . 'assets/js/pcod-admin.js',
			array( 'jquery' ),
			PCOD_VERSION,
			true
		);
		wp_localize_script(
			'pcod-admin',
			'pcodAdmin',
			array(
				'ajaxUrl' => admin_url( 'admin-ajax.php' ),
				'action'  => self::AJAX_ACTION,
				'i18n'    => array(
					'confirm' => __( 'Confirm balance collected and mark order as completed?', 'partial-cod' ),
					'error'   => __( 'Could not update order. Please reload and try again.', 'partial-cod' ),
				),
			)
		);
	}

	public static function ajax_mark_balance_paid() {
		check_ajax_referer( self::NONCE, 'nonce' );

		if ( ! current_user_can( 'edit_shop_orders' ) ) {
			wp_send_json_error( array( 'message' => __( 'Insufficient permissions.', 'partial-cod' ) ), 403 );
		}

		$order_id = isset( $_POST['order_id'] ) ? absint( $_POST['order_id'] ) : 0;
		$order    = $order_id ? wc_get_order( $order_id ) : null;

		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			wp_send_json_error( array( 'message' => __( 'Order not found.', 'partial-cod' ) ), 404 );
		}

		$balance = (float) $order->get_meta( '_pcod_balance_due' );

		$order->update_meta_data( '_pcod_balance_status', 'paid' );
		$order->add_order_note(
			sprintf(
				/* translators: %s: balance amount */
				__( 'Partial COD: balance of %s marked as collected on delivery.', 'partial-cod' ),
				wp_strip_all_tags( wc_price( $balance, array( 'currency' => $order->get_currency() ) ) )
			)
		);
		$order->update_status( 'completed', __( 'Partial COD balance collected.', 'partial-cod' ) );
		$order->save();

		wp_send_json_success( array( 'message' => __( 'Order marked as completed.', 'partial-cod' ) ) );
	}
}
