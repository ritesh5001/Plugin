<?php
/**
 * Owns the Partial COD order lifecycle.
 *
 * Flow:
 *   1. woocommerce_checkout_create_order — tag the order with partial-cod
 *      meta, swap payment_method to the customer-chosen sub-gateway.
 *   2. PCOD_Gateway::process_payment — calls begin_advance_charge(), then the
 *      sub-gateway's process_payment, then end_advance_charge(). While the
 *      charge runs, get_total filters are active so the sub-gateway sees the
 *      advance amount.
 *   3. woocommerce_payment_complete — restore the real total, move the order
 *      to the partial-paid status, leave an order note.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Order {

	/** Order id currently being charged for the advance. 0 if none. */
	private static $advance_order_id = 0;

	public static function init() {
		add_action( 'woocommerce_checkout_create_order', array( __CLASS__, 'tag_order' ), 10, 2 );

		add_action( 'woocommerce_payment_complete', array( __CLASS__, 'on_payment_complete' ), 5 );

		// Catch gateways that set the status directly (without calling payment_complete).
		add_action( 'woocommerce_order_status_processing', array( __CLASS__, 'on_payment_complete' ), 5 );
		add_action( 'woocommerce_order_status_completed', array( __CLASS__, 'on_payment_complete' ), 5 );

		// Prevent the sub-gateway from auto-transitioning a partial order to processing/completed.
		add_filter( 'woocommerce_payment_complete_order_status', array( __CLASS__, 'override_complete_status' ), 10, 3 );
	}

	public static function tag_order( $order, $data ) {
		if ( PCOD_Plugin::GATEWAY_ID !== ( $data['payment_method'] ?? '' ) ) {
			return;
		}

		$sub_id = isset( $_POST['pcod_sub_gateway'] ) ? wc_clean( wp_unslash( $_POST['pcod_sub_gateway'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( '' === $sub_id ) {
			return;
		}

		$gateways = WC()->payment_gateways()->payment_gateways();
		if ( ! isset( $gateways[ $sub_id ] ) ) {
			return;
		}

		$sub_gateway = $gateways[ $sub_id ];
		$total       = (float) $order->get_total();
		$settings    = PCOD_Calculator::settings();
		$split       = PCOD_Calculator::compute( $total, $settings['type'], $settings['value'], $settings['min'], $settings['max'] );

		$order->update_meta_data( '_pcod_is_partial', 'yes' );
		$order->update_meta_data( '_pcod_original_total', $total );
		$order->update_meta_data( '_pcod_advance_amount', $split['advance'] );
		$order->update_meta_data( '_pcod_balance_due', $split['balance'] );
		$order->update_meta_data( '_pcod_advance_gateway', $sub_id );
		$order->update_meta_data( '_pcod_advance_gateway_title', $sub_gateway->get_method_title() );
		$order->update_meta_data( '_pcod_advance_status', 'pending' );
		$order->update_meta_data( '_pcod_balance_status', 'pending' );

		// Swap the payment method to the sub-gateway so its process_payment runs natively.
		$order->set_payment_method( $sub_gateway );
	}

	public static function begin_advance_charge( $order_id ) {
		self::$advance_order_id = (int) $order_id;
		add_filter( 'woocommerce_order_get_total', array( __CLASS__, 'filter_total' ), 1000, 2 );
	}

	public static function end_advance_charge() {
		remove_filter( 'woocommerce_order_get_total', array( __CLASS__, 'filter_total' ), 1000 );
		self::$advance_order_id = 0;
	}

	public static function filter_total( $total, $order ) {
		if ( ! self::$advance_order_id || ! $order || $order->get_id() !== self::$advance_order_id ) {
			return $total;
		}
		$advance = $order->get_meta( '_pcod_advance_amount' );
		return '' !== $advance ? (float) $advance : $total;
	}

	public static function on_payment_complete( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( ! $order || 'yes' !== $order->get_meta( '_pcod_is_partial' ) ) {
			return;
		}
		if ( 'paid' === $order->get_meta( '_pcod_advance_status' ) ) {
			return;
		}

		$original = (float) $order->get_meta( '_pcod_original_total' );
		$advance  = (float) $order->get_meta( '_pcod_advance_amount' );
		$balance  = (float) $order->get_meta( '_pcod_balance_due' );
		$sub_name = $order->get_meta( '_pcod_advance_gateway_title' );

		$order->update_meta_data( '_pcod_advance_status', 'paid' );

		if ( $original > 0 ) {
			$order->set_total( $original );
		}

		$order->add_order_note(
			sprintf(
				/* translators: 1: advance amount, 2: gateway name, 3: balance amount */
				__( 'Partial COD: advance of %1$s paid via %2$s. Balance of %3$s due on delivery.', 'partial-cod' ),
				wp_strip_all_tags( wc_price( $advance ) ),
				$sub_name ? $sub_name : __( 'online gateway', 'partial-cod' ),
				wp_strip_all_tags( wc_price( $balance ) )
			)
		);

		$order->update_status( PCOD_Plugin::ORDER_STATUS, __( 'Advance paid, awaiting cash on delivery.', 'partial-cod' ) );
		$order->save();
	}

	public static function override_complete_status( $status, $order_id, $order ) {
		if ( $order && 'yes' === $order->get_meta( '_pcod_is_partial' ) ) {
			return PCOD_Plugin::ORDER_STATUS;
		}
		return $status;
	}
}
