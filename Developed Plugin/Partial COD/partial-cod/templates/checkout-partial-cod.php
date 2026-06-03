<?php
/**
 * Rendered inside PCOD_Gateway::payment_fields().
 *
 * @var array               $split        Advance/balance split.
 * @var WC_Payment_Gateway[] $sub_gateways Allowed sub-gateways.
 * @var string              $selected     Pre-selected sub-gateway id.
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="pcod-checkout-panel">
	<?php if ( ! empty( $this->description ) ) : ?>
		<p class="pcod-description"><?php echo wp_kses_post( wpautop( $this->description ) ); ?></p>
	<?php endif; ?>

	<div class="pcod-split">
		<div class="pcod-split__row">
			<span class="pcod-split__label"><?php esc_html_e( 'Pay now (advance)', 'partial-cod' ); ?></span>
			<span class="pcod-split__value pcod-advance"><?php echo wp_kses_post( wc_price( $split['advance'] ) ); ?></span>
		</div>
		<div class="pcod-split__row">
			<span class="pcod-split__label"><?php esc_html_e( 'Pay on delivery (balance)', 'partial-cod' ); ?></span>
			<span class="pcod-split__value pcod-balance"><?php echo wp_kses_post( wc_price( $split['balance'] ) ); ?></span>
		</div>
	</div>

	<?php if ( empty( $sub_gateways ) ) : ?>
		<p class="pcod-no-gateways">
			<?php esc_html_e( 'No online payment method is available right now to collect the advance. Please contact the store.', 'partial-cod' ); ?>
		</p>
	<?php else : ?>
		<fieldset class="pcod-sub-gateways">
			<legend><?php esc_html_e( 'Pay the advance with', 'partial-cod' ); ?></legend>
			<?php foreach ( $sub_gateways as $sub_id => $sub_gateway ) : ?>
				<label class="pcod-sub-gateway">
					<input
						type="radio"
						name="pcod_sub_gateway"
						value="<?php echo esc_attr( $sub_id ); ?>"
						<?php checked( $selected, $sub_id ); ?>
					/>
					<span class="pcod-sub-gateway__title">
						<?php echo esc_html( $sub_gateway->get_title() ); ?>
					</span>
					<?php
					$icon = $sub_gateway->get_icon();
					if ( $icon ) {
						echo wp_kses_post( $icon );
					}
					?>
				</label>
			<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>
</div>
