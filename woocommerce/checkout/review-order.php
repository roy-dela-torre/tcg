<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-checkout-review-order-container">

<!-- Product List -->
<div class="product-list">
	<?php
	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

		if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
			?>
			<div class="product-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
				<div class="product-name">
					<?php echo wp_trim_words(wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)),3) . '&nbsp;'; ?>
					<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', '<strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); ?>
					<?php echo wc_get_formatted_cart_item_data($cart_item); ?>
				</div>
				<div class="product-total">
					<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
				</div>
			</div>
			<?php
		}
	}
	?>
</div>

<!-- Cart Totals -->
<div class="cart-totals">
	<div class="cart-subtotal">
		<div class="subtotal-label"><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
		<div class="subtotal-value"><?php wc_cart_totals_subtotal_html(); ?></div>
	</div>

	<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
		<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
			<div class="coupon-label"><?php wc_cart_totals_coupon_label($coupon); ?></div>
			<div class="coupon-value"><?php wc_cart_totals_coupon_html($coupon); ?></div>
		</div>
	<?php endforeach; ?>

	<!-- Other Totals and Fees - You can continue this structure for shipping, fees, taxes, order total, etc. -->

	<div class="order-total">
		<div class="total-label"><?php esc_html_e('Total', 'woocommerce'); ?></div>
		<div class="total-value"><?php wc_cart_totals_order_total_html(); ?></div>
	</div>
</div>

</div>

