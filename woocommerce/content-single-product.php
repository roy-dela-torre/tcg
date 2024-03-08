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
 * @see     https://woo.com/document/template-structure/
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
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/single_product.css">
<section class="single_product mt-0">
	<div class="container-xl">
		<div class="row">
			<div class="bread_crumbs">
				<?php woocommerce_breadcrumb(); ?>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="product_gallery">
					<?php
					$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
					$post_thumbnail_id = $product->get_image_id();
					$wrapper_classes   = apply_filters(
						'woocommerce_single_product_image_gallery_classes',
						array(
							'woocommerce-product-gallery',
							'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
							'woocommerce-product-gallery--columns-' . absint( $columns ),
							'images',
						)
					);
					?>
					<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
						<div class="woocommerce-product-gallery__wrapper">
							<?php
							if ( $post_thumbnail_id ) {
								$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
							} else {
								$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
								$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
								$html .= '</div>';
							}

							echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

							do_action( 'woocommerce_product_thumbnails' );
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="product_summary">
					<div class="summary entry-summary">
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
						<?php
							$product = wc_get_product(get_the_ID());
							if ($product->is_type('variable')) {
								$variations = $product->get_available_variations();
								$stock = 0;
								foreach ($variations as $variation) {
									$stock += $variation['max_qty'];
								}
							} else {
								$stock = $product->get_stock_quantity();
							}
							?>
							<div class="other_info">
								<span class="stock"><b>Stock: </b>In stock (<?php echo $stock; ?> units)</span>
								<span class="card_game"><b>card game: </b>Flesh and Blood - Outsiders</span>
								s
							</div>
							<div class="product_info">
								<?php
									// Replace 'group_65e14aad0781e' with your actual ACF field group ID
									$group_id = 'group_65e14aad0781e';

									// Get all fields for the given ACF group
									$fields = acf_get_fields($group_id);

									// Assuming you have already retrieved the post ID of your featured product
									$featured_product_id = get_the_ID();

									// Loop through each field and display its label and value
									foreach ($fields as $field) {
										if ($field['type'] === 'tab') {
											continue;
										}
										// Get the field value for the featured product
										$field_value = get_field($field['name'], $featured_product_id);

										// Display the field label
										echo '<div class="acf-field">';
										echo '<h4>' . esc_html($field['label']) . ':</h4>';
										
										// Check if the field has a value
										if ($field_value) {
											// If the field is a checkbox, extract the value
											if ($field['type'] === 'checkbox') {
												$checkbox_value = '';
												foreach ($field_value as $option) {
													// Concatenate checkbox values
													$checkbox_value .= $option . ', ';
												}
												// Remove trailing comma and space
												$checkbox_value = rtrim($checkbox_value, ', ');
												echo '<p>' . esc_html($checkbox_value) . '</p>';
											} else {
												// Display other field values as is
												echo '<p>' . esc_html($field_value) . '</p>';
											}
										} else {
											// Display a message if the field is empty
											echo '<p>No value</p>';
										}
										
										echo '</div>';
									}
								?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="review d-none">
	<div class="container-xl">
		<div class="row">
			<div class="review_tabs">
				<?php
				$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

				if ( ! empty( $product_tabs ) ) : ?>

					<div class="woocommerce-tabs wc-tabs-wrapper">
						<ul class="tabs wc-tabs" role="tablist">
							<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
								<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
									<a href="#tab-<?php echo esc_attr( $key ); ?>">
										<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
							<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
								<?php
								if ( isset( $product_tab['callback'] ) ) {
									call_user_func( $product_tab['callback'], $key, $product_tab );
								}
								?>
							</div>
						<?php endforeach; ?>

						<?php do_action( 'woocommerce_product_after_tabs' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>


<!-- Relate Product Section -->
<?php
	if ( function_exists( 'woocommerce_output_related_products' ) ) {
		woocommerce_output_related_products();
	}
?>
<?php do_action( 'woocommerce_after_single_product' ); ?>
