<?php
/**
 * Add to wishlist button template - Added to list
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Wishlist\Templates\AddToWishlist
 * @version 3.0.12
 */

/**
 * Template variables:
 *
 * @var $wishlist_url              string Url to wishlist page
 * @var $exists                    bool Whether current product is already in wishlist
 * @var $show_exists               bool Whether to show already in wishlist link on multi wishlist
 * @var $product_id                int Current product id
 * @var $parent_product_id         int Parent for current product
 * @var $product_type              string Current product type
 * @var $label                     string Button label
 * @var $browse_wishlist_text      string Browse wishlist text
 * @var $already_in_wishslist_text string Already in wishlist text
 * @var $product_added_text        string Product added text
 * @var $icon                      string Icon for Add to Wishlist button
 * @var $link_classes              string Classed for Add to Wishlist button
 * @var $available_multi_wishlist  bool Whether add to wishlist is available or not
 * @var $disable_wishlist          bool Whether wishlist is disabled or not
 * @var $template_part             string Template part
 * @var $loop_position             string Loop position
 * @var $is_single                 bool Whether we're on single template
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly

global $product;
?>

<!-- ADDED TO WISHLIST MESSAGE -->
<div class="yith-wcwl-wishlistaddedbrowse" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-original-product-id="<?php echo esc_attr( $parent_product_id ); ?>">
	<a href="<?php echo esc_url( $wishlist_url ); ?>" rel="nofollow" data-title="<?php echo esc_attr( $browse_wishlist_text ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
            <g clip-path="url(#clip0_3681_1002)">
                <path d="M9.49999 17.6004C9.40893 17.6004 9.31792 17.5759 9.23635 17.5269C9.14776 17.4737 7.04293 16.202 4.9079 14.2857C3.64249 13.1501 2.63238 12.0236 1.9057 10.9378C0.965347 9.53275 0.492462 8.18125 0.500091 6.92081C0.509021 5.45415 1.01383 4.07485 1.92163 3.03695C2.84476 1.98157 4.0767 1.40039 5.39059 1.40039C7.07446 1.40039 8.61398 2.38195 9.50002 3.93685C10.3861 2.38198 11.9256 1.40039 13.6095 1.40039C14.8508 1.40039 16.0351 1.92479 16.9443 2.87701C17.9422 3.92196 18.5092 5.39843 18.4999 6.92776C18.4922 8.18601 18.0105 9.53546 17.068 10.9386C16.3391 12.0238 15.3304 13.1498 14.07 14.2851C11.9427 16.2012 9.85303 17.4729 9.7651 17.5261C9.68315 17.5756 9.59154 17.6004 9.49999 17.6004Z" fill="white"/>
            </g>
            <defs>
                <clipPath id="clip0_3681_1002">
                <rect width="18" height="18" fill="white" transform="translate(0.5 0.5)"/>
                </clipPath>
            </defs>
        </svg>
		<?php
		/**
		 * APPLY_FILTERS: yith_wcwl_browse_wishlist_label
		 *
		 * Filter the label to browse the wishlist.
		 *
		 * @param string $text       Browse wishlist text
		 * @param int    $product_id Product ID
		 * @param string $icon       Icon
		 *
		 * @return string
		 */
		echo wp_kses_post( apply_filters( 'yith_wcwl_browse_wishlist_label', `<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
			<g clip-path="url(#clip0_3681_1002)">
				<path d="M9.49999 17.6004C9.40893 17.6004 9.31792 17.5759 9.23635 17.5269C9.14776 17.4737 7.04293 16.202 4.9079 14.2857C3.64249 13.1501 2.63238 12.0236 1.9057 10.9378C0.965347 9.53275 0.492462 8.18125 0.500091 6.92081C0.509021 5.45415 1.01383 4.07485 1.92163 3.03695C2.84476 1.98157 4.0767 1.40039 5.39059 1.40039C7.07446 1.40039 8.61398 2.38195 9.50002 3.93685C10.3861 2.38198 11.9256 1.40039 13.6095 1.40039C14.8508 1.40039 16.0351 1.92479 16.9443 2.87701C17.9422 3.92196 18.5092 5.39843 18.4999 6.92776C18.4922 8.18601 18.0105 9.53546 17.068 10.9386C16.3391 12.0238 15.3304 13.1498 14.07 14.2851C11.9427 16.2012 9.85303 17.4729 9.7651 17.5261C9.68315 17.5756 9.59154 17.6004 9.49999 17.6004Z" fill="white"/>
			</g>
			<defs>
				<clipPath id="clip0_3681_1002">
				<rect width="18" height="18" fill="white" transform="translate(0.5 0.5)"/>
				</clipPath>
			</defs>
		</svg>`, $product_id, $icon ) );
		?>
	</a>
</div>
