<?php
/**
 * Hides the core 'cod' gateway from checkout whenever Partial COD is enabled.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_COD_Disabler {

	public static function init() {
		add_filter( 'woocommerce_available_payment_gateways', array( __CLASS__, 'hide_core_cod' ), 99 );
	}

	public static function hide_core_cod( $gateways ) {
		if ( ! isset( $gateways['cod'] ) || ! isset( $gateways[ PCOD_Plugin::GATEWAY_ID ] ) ) {
			return $gateways;
		}
		if ( 'yes' === $gateways[ PCOD_Plugin::GATEWAY_ID ]->enabled ) {
			unset( $gateways['cod'] );
		}
		return $gateways;
	}
}
