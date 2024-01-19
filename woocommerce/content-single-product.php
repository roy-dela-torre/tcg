<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
/* === SINGLE PRODUCT PAGES VARIABLES === */
$pr_id = $product->get_id(); // PRODUCT ID
$pr_name = $product->get_name(); // PRODUCT NAME

// Check if the product price is numeric before formatting it
$pr_price = is_numeric($product->get_price()) ? number_format($product->get_price(), 2) : '';

// Check if the regular price is numeric before formatting it
$pr_regprice = is_numeric($product->get_regular_price()) ? number_format($product->get_regular_price(), 2) : '';

// Check if the sale price is numeric before formatting it
$pr_saleprice = is_numeric($product->get_sale_price()) ? number_format($product->get_sale_price(), 2) : '';

$pr_description = $product->get_description(); // PRODUCT DESCRIPTION
$pr_shortdesc = $product->get_short_description();


// Product desctiption
$ingredients = get_field( "ingredients", $pr_id );
$benefit = get_field( "benefit", $pr_id );
$supplement = get_field( "supplement", $pr_id );
$direction = get_field( "direction", $pr_id );

/* FOR SINGLE PRODUCT IMAGES */
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($product->get_image_id() ? 'with-images' : 'without-images'),
		'images',
	)
);

?>

<section class="single-propduct"> 
	<div class="container-fluid">
		<div class="wrapper">
			<div class="row">
				<div class="product-container">
					<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> >
						<?php
						/**
						 * Hook: woocommerce_before_single_product_summary.
						 *
						 * @hooked woocommerce_show_product_sale_flash - 10
						 * @hooked woocommerce_show_product_images - 20
						 */
						do_action( 'woocommerce_before_single_product_summary' );
						?>
						<div class="summary entry-summary row flex-column p-0">
							<?php
							/**
							 * Hook: woocommerce_single_product_summary.
							 *
							 * @hooked woocommerce_template_single_title - 5
							 * @hooked woocommerce_template_single_rating - 10
							 * @hooked woocommerce_template_single_price - 10
							 * @hooked woocommerce_template_single_excerpt - 20
							 * @hooked woocommerce_template_single_add_to_cart - 30
							 * @hooked woocommerce_template_single_meta - 40
							 * @hooked woocommerce_template_single_sharing - 50
							 * @hooked WC_Structured_Data::generate_product_data() - 60
							 */
							do_action( 'woocommerce_single_product_summary' );
							?>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</section>
<section class="reviews">
	<div class="container-fluid">
		<div class="wrapper">
			<div class="row">
				<div class="content">
					<!-- Review -->
					<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addreviewspopup">Add reviews</button>
					<div class="modal fade" id="addreviewspopup" tabindex="-1" aria-labelledby="addreviewspopupLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="addreviewspopupLabel">Modal title</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								...
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




<?php
	if ( function_exists( 'woocommerce_output_related_products' ) ) {
		woocommerce_output_related_products();
		//File path -> woocommerce->single-product->related.php
	}
?>
			