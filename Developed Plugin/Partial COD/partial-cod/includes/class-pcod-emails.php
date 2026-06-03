<?php
/**
 * Injects the Partial COD split into customer-facing order emails and the
 * thank-you page.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Emails {

	public static function init() {
		add_action( 'woocommerce_email_order_meta', array( __CLASS__, 'render_email_split' ), 20, 4 );
		add_action( 'woocommerce_thankyou', array( __CLASS__, 'render_thankyou_split' ), 5 );
	}

	public static function render_email_split( $order, $sent_to_admin, $plain_text, $email ) {
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			return;
		}

		self::render_block( $order, $plain_text );
	}

	public static function render_thankyou_split( $order_id ) {
		$order = $order_id ? wc_get_order( $order_id ) : null;
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			return;
		}

		self::render_block( $order, false );
	}

	private static function render_block( WC_Order $order, $plain_text ) {
		$advance        = (float) $order->get_meta( '_pcod_advance_amount' );
		$balance        = (float) $order->get_meta( '_pcod_balance_due' );
		$advance_status = $order->get_meta( '_pcod_advance_status' );
		$balance_status = $order->get_meta( '_pcod_balance_status' );
		$currency       = array( 'currency' => $order->get_currency() );

		if ( $plain_text ) {
			echo "\n" . esc_html__( 'Partial COD', 'partial-cod' ) . "\n";
			echo esc_html__( 'Advance paid', 'partial-cod' ) . ': ' . wp_strip_all_tags( wc_price( $advance, $currency ) ) . ' (' . esc_html( $advance_status ) . ")\n";
			echo esc_html__( 'Balance due on delivery', 'partial-cod' ) . ': ' . wp_strip_all_tags( wc_price( $balance, $currency ) ) . ' (' . esc_html( $balance_status ) . ")\n";
			return;
		}

		?>
		<h2 style="margin-top:24px;"><?php esc_html_e( 'Partial COD', 'partial-cod' ); ?></h2>
		<table cellspacing="0" cellpadding="6" style="width:100%;border:1px solid #eee;" border="1">
			<tbody>
				<tr>
					<th style="text-align:left;"><?php esc_html_e( 'Advance paid', 'partial-cod' ); ?></th>
					<td><?php echo wp_kses_post( wc_price( $advance, $currency ) ); ?> (<?php echo esc_html( ucfirst( $advance_status ) ); ?>)</td>
				</tr>
				<tr>
					<th style="text-align:left;"><?php esc_html_e( 'Balance due on delivery', 'partial-cod' ); ?></th>
					<td><?php echo wp_kses_post( wc_price( $balance, $currency ) ); ?> (<?php echo esc_html( ucfirst( $balance_status ) ); ?>)</td>
				</tr>
			</tbody>
		</table>
		<?php
	}
}
