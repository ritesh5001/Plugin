<?php
/**
 * Checkout-side wiring: asset loading and AJAX endpoint used to refresh the
 * advance/balance numbers when the cart total changes.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Checkout {

	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
		add_action( 'wc_ajax_pcod_recalc', array( __CLASS__, 'ajax_recalc' ) );
		add_action( 'wp_ajax_pcod_recalc', array( __CLASS__, 'ajax_recalc' ) );
		add_action( 'wp_ajax_nopriv_pcod_recalc', array( __CLASS__, 'ajax_recalc' ) );
	}

	public static function enqueue_assets() {
		if ( ! is_checkout() ) {
			return;
		}

		wp_enqueue_style(
			'pcod-checkout',
			PCOD_URL . 'assets/css/pcod.css',
			array(),
			PCOD_VERSION
		);

		wp_enqueue_script(
			'pcod-checkout',
			PCOD_URL . 'assets/js/pcod-checkout.js',
			array( 'jquery', 'wc-checkout' ),
			PCOD_VERSION,
			true
		);

		wp_localize_script(
			'pcod-checkout',
			'pcodCheckout',
			array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'action'   => 'pcod_recalc',
				'gateway'  => PCOD_Plugin::GATEWAY_ID,
			)
		);
	}

	public static function ajax_recalc() {
		if ( ! WC()->cart ) {
			wp_send_json_error();
		}

		WC()->cart->calculate_totals();
		$split = PCOD_Calculator::for_cart();

		wp_send_json_success(
			array(
				'advance' => wc_price( $split['advance'] ),
				'balance' => wc_price( $split['balance'] ),
			)
		);
	}
}
