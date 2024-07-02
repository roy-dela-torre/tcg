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

// $product_short_description = $product->get_short_description();
$product_link = get_permalink($product->get_id());
$img = wp_get_attachment_url($product->get_image_id());
$title = get_the_title($product->get_id());
$price = wc_get_template_html('loop/price.php');
$url = get_permalink($product->get_id());
$add_to_cart = '<a href="' . ($product->get_stock_status() === 'outofstock' ? 'javascript:void(0);' : esc_url(wc_get_cart_url() . '?add-to-cart=' . $product->get_id())) . '" target="_blank"><svg class="d-flex d-md-none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
	<g clip-path="url(#clip0_3697_8102)">
	<path d="M8.82812 18.7891C9.79894 18.7891 10.5859 18.0021 10.5859 17.0312C10.5859 16.0604 9.79894 15.2734 8.82812 15.2734C7.85731 15.2734 7.07031 16.0604 7.07031 17.0312C7.07031 18.0021 7.85731 18.7891 8.82812 18.7891Z" fill="white"/>
	<path d="M14.7264 18.7891C15.6973 18.7891 16.4843 18.0021 16.4843 17.0312C16.4843 16.0604 15.6973 15.2734 14.7264 15.2734C13.7556 15.2734 12.9686 16.0604 12.9686 17.0312C12.9686 18.0021 13.7556 18.7891 14.7264 18.7891Z" fill="white"/>
	<path d="M0.585934 2.38291H3.0294L5.85821 12.2857L5.63633 12.7294C5.05212 13.8966 5.9002 15.2735 7.20875 15.2735H17.0702C17.3941 15.2735 17.6561 15.0114 17.6561 14.6875C17.6561 14.3637 17.3941 14.1016 17.0702 14.1016H7.20875C6.77363 14.1016 6.48926 13.6434 6.68461 13.2536L6.84656 12.9297H17.0702C17.3317 12.9297 17.5617 12.7564 17.6338 12.5046L19.9776 4.30149C20.0279 4.12469 19.9925 3.93469 19.882 3.78766C19.771 3.64118 19.5977 3.55477 19.414 3.55477H4.5829L4.03474 1.63615C3.96263 1.3844 3.73263 1.211 3.47111 1.211H0.585934C0.262069 1.211 0 1.47307 0 1.79693C0 2.1208 0.262069 2.38291 0.585934 2.38291Z" fill="white"/>
	</g>
	<defs>
	<clipPath id="clip0_3697_8102">
		<rect width="20" height="20" fill="white"/>
	</clipPath>
	</defs>
</svg><span>Add to cart</span></a>';
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
if (is_archive()) {
    $classes = 'col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12'; // Apply these classes on archive pages
} else {
    $classes = 'col-xl-3 col-lg-4 col-md-6 col-sm-12'; // Apply these classes on other pages
}
?>

<?php
$data = array(
	'img' => $img,     // Image URL
	'title' => $title, // Product title
	'price' => $price, // Product price
	'url' => $url,
	'add_to_cart' => $add_to_cart,
	'product' => $product
);
ob_start();
?>
<div <?php wc_product_class($classes, $product); ?>>
	<?php echo wc_get_template('single_product_content/content.php', $data);?>
</div>
<?php
$content = ob_get_clean();
echo $content;
?>