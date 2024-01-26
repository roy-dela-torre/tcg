<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="cart-totals-title">
		<h3><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h3>
	</div>

	<div class="cart-totals-wrapper">
		<div class="cart-subtotal d-none">
			<div class="cart-totals-label"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="cart-totals-value" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) : ?>
            <div class="cart-product-summary">
                <div class="cart-totals-label">
					<p class="product_title"><?php  echo wp_trim_words(esc_html( $cart_item['data']->get_title() ),3) . ' x' . esc_html( $cart_item['quantity'] ); ?></p>
                    <p class="product_title_total"><?php echo wc_price( $cart_item['data']->get_price() ); ?></p>
                </div>
            </div>
        <?php endforeach; ?>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div class="cart-totals-label"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
				<div class="cart-totals-value" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<div class="shipping">
				<div class="cart-totals-label"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>
				<div class="cart-totals-value" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php wc_cart_totals_shipping_html(); ?></div>
			</div>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<div class="shipping">
				<div class="cart-totals-label"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></div>
				<div class="cart-totals-value" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></div>
			</div>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<div class="cart-totals-label"><?php echo esc_html( $fee->name ); ?></div>
				<div class="cart-totals-value" data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<div class="cart-totals-label"><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<div class="cart-totals-value" data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
					</div>
					<?php
				}
			} else {
				?>
				<div class="tax-total">
					<div class="cart-totals-label"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="cart-totals-value" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
				<?php
			}
		}
		?>

	</div>
	<?php if ( wc_coupons_enabled() ) { ?>
		<div class="coupon">
			<h5 class="text-uppercase">promo code</h5>
			<div class="group">
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
				<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'enter', 'woocommerce' ); ?>"><?php esc_html_e( 'enter', 'woocommerce' ); ?>
				</button>
			</div>
			<?php do_action( 'woocommerce_cart_coupon' ); ?>
		</div>
	<?php } ?>

	<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

	<div class="order-total">
		<div class="cart-totals-label"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
		<div class="cart-totals-value" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
	</div>

	<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	<div class="wc-proceed-to-checkout">
		<a href="<?php echo get_home_url(); ?>/shop/" target="_blank" rel="noopener noreferrer" class="browse_product">Browse product</a>
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>

