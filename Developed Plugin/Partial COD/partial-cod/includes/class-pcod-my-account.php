<?php
/**
 * My Account: balance-due column on the Orders list and a split breakdown
 * block on the View Order page.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_My_Account {

	public static function init() {
		add_filter( 'woocommerce_my_account_my_orders_columns', array( __CLASS__, 'add_balance_column' ) );
		add_action( 'woocommerce_my_account_my_orders_column_pcod-balance', array( __CLASS__, 'render_balance_column' ) );
		add_action( 'woocommerce_order_details_after_order_table', array( __CLASS__, 'render_view_order_split' ) );
	}

	public static function add_balance_column( $columns ) {
		$new = array();
		foreach ( $columns as $key => $label ) {
			$new[ $key ] = $label;
			if ( 'order-total' === $key ) {
				$new['pcod-balance'] = __( 'Balance due', 'partial-cod' );
			}
		}
		return $new;
	}

	public static function render_balance_column( $order ) {
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			echo '&mdash;';
			return;
		}
		$balance        = (float) $order->get_meta( '_pcod_balance_due' );
		$balance_status = $order->get_meta( '_pcod_balance_status' );

		echo wp_kses_post( wc_price( $balance, array( 'currency' => $order->get_currency() ) ) );
		echo ' <small>(' . esc_html( ucfirst( $balance_status ) ) . ')</small>';
	}

	public static function render_view_order_split( $order ) {
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			return;
		}

		$advance        = (float) $order->get_meta( '_pcod_advance_amount' );
		$balance        = (float) $order->get_meta( '_pcod_balance_due' );
		$advance_status = $order->get_meta( '_pcod_advance_status' );
		$balance_status = $order->get_meta( '_pcod_balance_status' );
		$currency       = array( 'currency' => $order->get_currency() );

		?>
		<section class="woocommerce-pcod-split">
			<h2><?php esc_html_e( 'Partial COD', 'partial-cod' ); ?></h2>
			<table class="shop_table pcod-myaccount-split">
				<tbody>
					<tr>
						<th><?php esc_html_e( 'Advance paid', 'partial-cod' ); ?></th>
						<td><?php echo wp_kses_post( wc_price( $advance, $currency ) ); ?> (<?php echo esc_html( ucfirst( $advance_status ) ); ?>)</td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'Balance due on delivery', 'partial-cod' ); ?></th>
						<td><?php echo wp_kses_post( wc_price( $balance, $currency ) ); ?> (<?php echo esc_html( ucfirst( $balance_status ) ); ?>)</td>
					</tr>
				</tbody>
			</table>
		</section>
		<?php
	}
}
