<?php
/**
 * Bootstrap class. Wires up every sub-module once WooCommerce is loaded.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Plugin {

	const GATEWAY_ID    = 'partial_cod';
	const ORDER_STATUS  = 'partial-paid';
	const STATUS_SLUG   = 'wc-partial-paid';

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		if ( ! class_exists( 'WooCommerce' ) ) {
			add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
			return;
		}

		$this->load_files();
		$this->register_hooks();
	}

	private function load_files() {
		require_once PCOD_PATH . 'includes/class-pcod-calculator.php';
		require_once PCOD_PATH . 'includes/class-pcod-gateway.php';
		require_once PCOD_PATH . 'includes/class-pcod-checkout.php';
		require_once PCOD_PATH . 'includes/class-pcod-order.php';
		require_once PCOD_PATH . 'includes/class-pcod-cod-disabler.php';
		require_once PCOD_PATH . 'includes/class-pcod-admin-order.php';
		require_once PCOD_PATH . 'includes/class-pcod-emails.php';
		require_once PCOD_PATH . 'includes/class-pcod-my-account.php';
	}

	private function register_hooks() {
		add_filter( 'woocommerce_payment_gateways', array( $this, 'register_gateway' ) );

		add_action( 'init', array( $this, 'register_order_status' ) );
		add_filter( 'wc_order_statuses', array( $this, 'add_order_status_to_list' ) );

		add_filter( 'plugin_action_links_' . PCOD_BASENAME, array( $this, 'plugin_action_links' ) );

		add_action( 'plugins_loaded', array( $this, 'init_modules' ), 20 );
	}

	public function init_modules() {
		PCOD_Checkout::init();
		PCOD_Order::init();
		PCOD_COD_Disabler::init();
		PCOD_Admin_Order::init();
		PCOD_Emails::init();
		PCOD_My_Account::init();
	}

	public function register_gateway( $gateways ) {
		$gateways[] = 'PCOD_Gateway';
		return $gateways;
	}

	public function register_order_status() {
		register_post_status(
			self::STATUS_SLUG,
			array(
				'label'                     => _x( 'Partially paid (COD)', 'Order status', 'partial-cod' ),
				'public'                    => true,
				'exclude_from_search'       => false,
				'show_in_admin_all_list'    => true,
				'show_in_admin_status_list' => true,
				/* translators: %s: number of orders */
				'label_count'               => _n_noop( 'Partially paid (COD) <span class="count">(%s)</span>', 'Partially paid (COD) <span class="count">(%s)</span>', 'partial-cod' ),
			)
		);
	}

	public function add_order_status_to_list( $statuses ) {
		$new = array();
		foreach ( $statuses as $key => $label ) {
			$new[ $key ] = $label;
			if ( 'wc-processing' === $key ) {
				$new[ self::STATUS_SLUG ] = __( 'Partially paid (COD)', 'partial-cod' );
			}
		}
		if ( ! isset( $new[ self::STATUS_SLUG ] ) ) {
			$new[ self::STATUS_SLUG ] = __( 'Partially paid (COD)', 'partial-cod' );
		}
		return $new;
	}

	public function plugin_action_links( $links ) {
		$settings_url = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=' . self::GATEWAY_ID );
		array_unshift(
			$links,
			'<a href="' . esc_url( $settings_url ) . '">' . esc_html__( 'Settings', 'partial-cod' ) . '</a>'
		);
		return $links;
	}

	public function woocommerce_missing_notice() {
		echo '<div class="notice notice-error"><p>' . esc_html__( 'Partial COD requires WooCommerce to be installed and active.', 'partial-cod' ) . '</p></div>';
	}
}
