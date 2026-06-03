<?php
/**
 * The Partial COD payment gateway. Provides the settings tab under
 * WooCommerce → Settings → Payments → Partial COD and renders the
 * customer-facing checkout panel.
 */

defined( 'ABSPATH' ) || exit;

class PCOD_Gateway extends WC_Payment_Gateway {

	public function __construct() {
		$this->id                 = PCOD_Plugin::GATEWAY_ID;
		$this->method_title       = __( 'Partial COD', 'partial-cod' );
		$this->method_description = __( 'Collect an advance online and the balance in cash on delivery.', 'partial-cod' );
		$this->has_fields         = true;
		$this->supports           = array( 'products' );

		$this->init_form_fields();
		$this->init_settings();

		$this->title       = $this->get_option( 'title', __( 'Partial COD (pay an advance now, rest on delivery)', 'partial-cod' ) );
		$this->description = $this->get_option( 'description', '' );
		$this->enabled     = $this->get_option( 'enabled', 'no' );

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
	}

	public function init_form_fields() {
		$this->form_fields = array(
			'enabled'         => array(
				'title'   => __( 'Enable/Disable', 'partial-cod' ),
				'type'    => 'checkbox',
				'label'   => __( 'Enable Partial COD', 'partial-cod' ),
				'default' => 'no',
			),
			'title'           => array(
				'title'       => __( 'Title', 'partial-cod' ),
				'type'        => 'text',
				'description' => __( 'Shown to the customer at checkout.', 'partial-cod' ),
				'default'     => __( 'Partial COD (pay an advance now, rest on delivery)', 'partial-cod' ),
				'desc_tip'    => true,
			),
			'description'     => array(
				'title'   => __( 'Description', 'partial-cod' ),
				'type'    => 'textarea',
				'default' => __( 'Pay a small advance online to confirm your order. Pay the remaining amount in cash when your order is delivered.', 'partial-cod' ),
			),
			'advance_type'    => array(
				'title'   => __( 'Advance type', 'partial-cod' ),
				'type'    => 'select',
				'default' => 'percentage',
				'options' => array(
					'percentage' => __( 'Percentage of order total', 'partial-cod' ),
					'fixed'      => __( 'Fixed amount', 'partial-cod' ),
				),
			),
			'advance_value'   => array(
				'title'       => __( 'Advance value', 'partial-cod' ),
				'type'        => 'decimal',
				'description' => __( 'Either the percentage (e.g. 20) or the fixed amount, depending on the type above.', 'partial-cod' ),
				'default'     => '20',
				'desc_tip'    => true,
			),
			'advance_min'     => array(
				'title'       => __( 'Minimum advance (optional)', 'partial-cod' ),
				'type'        => 'decimal',
				'description' => __( 'Floor on the calculated advance amount. Leave blank for no floor.', 'partial-cod' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'advance_max'     => array(
				'title'       => __( 'Maximum advance (optional)', 'partial-cod' ),
				'type'        => 'decimal',
				'description' => __( 'Ceiling on the calculated advance amount. Leave blank for no ceiling.', 'partial-cod' ),
				'default'     => '',
				'desc_tip'    => true,
			),
			'instructions'    => array(
				'title'   => __( 'Customer instructions', 'partial-cod' ),
				'type'    => 'textarea',
				'default' => __( 'Please keep the remaining balance ready in cash at the time of delivery.', 'partial-cod' ),
			),
			'allowed_subs'    => array(
				'title'       => __( 'Allowed advance-payment gateways', 'partial-cod' ),
				'type'        => 'multiselect',
				'class'       => 'wc-enhanced-select',
				'description' => __( 'Customers can pick one of these to pay the advance. Leave empty to allow every enabled non-COD gateway.', 'partial-cod' ),
				'default'     => array(),
				'options'     => $this->get_sub_gateway_options(),
				'desc_tip'    => true,
			),
		);
	}

	private function get_sub_gateway_options() {
		$options = array();
		if ( ! function_exists( 'WC' ) || ! WC()->payment_gateways() ) {
			return $options;
		}
		foreach ( WC()->payment_gateways()->payment_gateways() as $gateway ) {
			if ( in_array( $gateway->id, array( $this->id, 'cod' ), true ) ) {
				continue;
			}
			$options[ $gateway->id ] = $gateway->get_method_title();
		}
		return $options;
	}

	/**
	 * Returns the WC_Payment_Gateway objects the customer can choose from to
	 * pay the advance.
	 *
	 * @return WC_Payment_Gateway[]
	 */
	public function get_available_sub_gateways() {
		$allowed = (array) $this->get_option( 'allowed_subs', array() );
		$result  = array();
		$all     = WC()->payment_gateways()->get_available_payment_gateways();

		foreach ( $all as $id => $gateway ) {
			if ( in_array( $id, array( $this->id, 'cod' ), true ) ) {
				continue;
			}
			if ( ! empty( $allowed ) && ! in_array( $id, $allowed, true ) ) {
				continue;
			}
			$result[ $id ] = $gateway;
		}
		return $result;
	}

	public function payment_fields() {
		$split        = PCOD_Calculator::for_cart();
		$sub_gateways = $this->get_available_sub_gateways();
		$selected     = ! empty( $_POST['pcod_sub_gateway'] ) ? wc_clean( wp_unslash( $_POST['pcod_sub_gateway'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( '' === $selected && ! empty( $sub_gateways ) ) {
			$first    = reset( $sub_gateways );
			$selected = $first->id;
		}

		include PCOD_PATH . 'templates/checkout-partial-cod.php';
	}

	public function validate_fields() {
		$sub_gateways = $this->get_available_sub_gateways();

		if ( empty( $sub_gateways ) ) {
			wc_add_notice( __( 'No advance-payment gateway is available. Please contact the store.', 'partial-cod' ), 'error' );
			return false;
		}

		$chosen = isset( $_POST['pcod_sub_gateway'] ) ? wc_clean( wp_unslash( $_POST['pcod_sub_gateway'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( '' === $chosen || ! isset( $sub_gateways[ $chosen ] ) ) {
			wc_add_notice( __( 'Please choose how you want to pay the advance.', 'partial-cod' ), 'error' );
			return false;
		}

		return true;
	}

	/**
	 * Hands processing off to the chosen sub-gateway. PCOD_Order has already
	 * swapped the order's payment_method and hooked the total filter so the
	 * sub-gateway charges the advance only.
	 */
	public function process_payment( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			return array( 'result' => 'failure' );
		}

		$sub_id   = $order->get_payment_method();
		$gateways = WC()->payment_gateways()->payment_gateways();

		if ( ! isset( $gateways[ $sub_id ] ) ) {
			wc_add_notice( __( 'The selected advance-payment gateway is no longer available.', 'partial-cod' ), 'error' );
			return array( 'result' => 'failure' );
		}

		PCOD_Order::begin_advance_charge( $order_id );
		$result = $gateways[ $sub_id ]->process_payment( $order_id );
		PCOD_Order::end_advance_charge();

		return $result;
	}
}
