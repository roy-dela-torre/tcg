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

defined('ABSPATH') || exit;

global $product;

$product_link = get_permalink($product->get_id());
$lifeline_product_title = get_the_title($product->get_id());
// Ensure visibility.
$short_description = $product->get_short_description();
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('col-xl-3 col-lg-4 col-md-6 col-sm-12', $product); ?>>

	<a href="<?php echo $product_link; ?>" target="_blank">
		<div class="product-item">
			<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" />
			<!-- <?php //if (get_field('hover_product_image')): ?>
				<img src="<?php //the_field('hover_product_image'); ?>" class="image-product-hover" />
			<?php //endif; ?> -->

			<div class="product-content">
				<div class="row">
					<div class="col-xl-12">
						<div class="item-product-info">
							<h5 class="card-title product-name">
								<?php echo $lifeline_product_title ?>
							</h5>
						</div>
					</div>
				</div>

				<div class="row align-items-center">
					<h5 class="card-title product-price">
						<?php wc_get_template('loop/price.php'); ?>
					</h5>
				</div>
				<div class="product-description">
					<p class="descption">
						<?php echo $short_description;?>
					</p>
				</div>

			</div>
			<div class="view-cta">
				<div class="d-flex">
					<i class="fa-solid fa-eye"></i>
					<a href="<?php echo $product_link; ?>" class="view_product">View Product</a>
				</div>
			</div>
		</div>

		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		//do_action( 'woocommerce_before_shop_loop_item' );
		
		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		//do_action( 'woocommerce_before_shop_loop_item_title' );
		
		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		//do_action( 'woocommerce_shop_loop_item_title' );
		
		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		//do_action( 'woocommerce_after_shop_loop_item_title' );
		
		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		//do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</a>
</li>