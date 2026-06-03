<?php
/**
 * Pure math for working out the advance/balance split.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Calculator {

	/**
	 * Compute advance + balance from a total.
	 *
	 * @param float       $total Order/cart total.
	 * @param string      $type  'percentage' or 'fixed'.
	 * @param float       $value Percentage (0-100) or fixed amount.
	 * @param float|null  $min   Optional floor on the advance.
	 * @param float|null  $max   Optional ceiling on the advance.
	 * @return array{advance: float, balance: float}
	 */
	public static function compute( $total, $type, $value, $min = null, $max = null ) {
		$total = max( 0.0, (float) $total );
		$value = max( 0.0, (float) $value );

		if ( 'percentage' === $type ) {
			$advance = $total * ( $value / 100 );
		} else {
			$advance = $value;
		}

		if ( null !== $min && '' !== $min ) {
			$advance = max( $advance, (float) $min );
		}
		if ( null !== $max && '' !== $max ) {
			$advance = min( $advance, (float) $max );
		}

		// Advance can never exceed the order total.
		$advance = min( $advance, $total );
		$advance = round( $advance, wc_get_price_decimals() );
		$balance = round( $total - $advance, wc_get_price_decimals() );

		return array(
			'advance' => $advance,
			'balance' => $balance,
		);
	}

	public static function settings() {
		$gateway = WC()->payment_gateways() ? WC()->payment_gateways()->payment_gateways() : array();
		$gateway = isset( $gateway[ PCOD_Plugin::GATEWAY_ID ] ) ? $gateway[ PCOD_Plugin::GATEWAY_ID ] : null;

		if ( ! $gateway ) {
			return array(
				'type'  => 'percentage',
				'value' => 20,
				'min'   => '',
				'max'   => '',
			);
		}

		return array(
			'type'  => $gateway->get_option( 'advance_type', 'percentage' ),
			'value' => $gateway->get_option( 'advance_value', '20' ),
			'min'   => $gateway->get_option( 'advance_min', '' ),
			'max'   => $gateway->get_option( 'advance_max', '' ),
		);
	}

	public static function for_cart() {
		$total = WC()->cart ? (float) WC()->cart->get_total( 'edit' ) : 0.0;
		$s     = self::settings();
		return self::compute( $total, $s['type'], $s['value'], $s['min'], $s['max'] );
	}

	public static function for_order( WC_Order $order ) {
		$original = $order->get_meta( '_pcod_original_total' );
		$total    = '' !== $original ? (float) $original : (float) $order->get_total();
		$s        = self::settings();
		return self::compute( $total, $s['type'], $s['value'], $s['min'], $s['max'] );
	}
}
