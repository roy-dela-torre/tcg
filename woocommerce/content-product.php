<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_title = get_the_title($product->get_id());
$product_short_description = $product->get_short_description();
$product_link = get_permalink($product->get_id());

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'col-xl-3 col-lg-4 col-md-6 col-sm-12', $product ); ?>>
	<div class="product_content">
		<div class="product_image">
			<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" />	
		</div>
		<h3 class="title">
			<?php echo $product_title; ?>
		</h3>
		<p class="price">
			<?php wc_get_template('loop/price.php'); ?>
		</p>
		<div class="group_button">
			<a href="<?php echo $product_link; ?>" target="_blank" rel="noopener noreferrer" class="view">
				View
			</a>
			<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="add_to_cart_button">
				Add to Cart
			</a>
		</div>
	</div>
</div>
