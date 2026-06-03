<?php
/**
 * Plugin Name: Partial COD for WooCommerce
 * Description: Lets customers pay a percentage or fixed advance online and the rest in cash on delivery. Replaces the standard WooCommerce COD gateway.
 * Version: 1.0.0
 * Author: Ritesh Giri
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * WC requires at least: 7.0
 * WC tested up to: 9.4
 * Text Domain: partial-cod
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

define( 'PCOD_VERSION', '1.0.0' );
define( 'PCOD_FILE', __FILE__ );
define( 'PCOD_PATH', plugin_dir_path( __FILE__ ) );
define( 'PCOD_URL', plugin_dir_url( __FILE__ ) );
define( 'PCOD_BASENAME', plugin_basename( __FILE__ ) );

require_once PCOD_PATH . 'includes/class-pcod-plugin.php';

add_action( 'plugins_loaded', array( 'PCOD_Plugin', 'instance' ), 11 );

add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', PCOD_FILE, true );
		}
	}
);
