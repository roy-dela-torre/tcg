<?php
if (!defined('YITH_WCWL')) {
    exit;
} // Exit if accessed directly
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/wishlist.css">
<!-- WISHLIST GRID -->
<div class="row">
    <?php
    if ($wishlist && $wishlist->has_items()) :
        foreach ($wishlist_items as $item) :
            global $product;

            $product = $item->get_product();

            if ($product && $product->exists()) :
                // Extract necessary data
                $url = ''; // Initialize variables
                $title = $product->get_title();
                $price = $item->get_formatted_product_price();
                $product_url = esc_url(get_permalink(apply_filters('woocommerce_in_cart_product', $item->get_product_id())));
                $product_id = $item->get_product_id();
                $add_to_cart = '<a href="?add-to-cart=1348&amp;remove_from_wishlist_after_add_to_cart=1348&amp;wishlist_id=1&amp;wishlist_token=NAEUSDB5ZQ3U" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart add_to_cart alt" data-product_id="1348" data-product_sku="" aria-label="Add “Teklo Foundry Heart” to your cart" aria-describedby="" rel="nofollow">Add to cart</a>';
                // Get image URL
                $image_id = $product->get_image_id();
                if ($image_id) {
                    $img = wp_get_attachment_image_src($image_id, 'full')[0];
                }

                // Set up data to pass to the template
                $data = array(
                    'img' => $img,     // Image URL
                    'title' => $title, // Product title
                    'price' => $price, // Product price
                    'url' => $url,
                    'add_to_cart' => $add_to_cart,
                    'product' => $product,
                    'product_id' => $product_id,
                    'show_remove_product' => $show_remove_product,
                    'item' => $item
                );

                // Load the template
                ob_start();
                ?>
                <div class="col-xxl-3 col-xl-4 col-md-6 col-12 product_column">
                    <?php echo wc_get_template('single_product_content/content.php', $data); ?>
                </div>
                <?php
                $content = ob_get_clean();
                echo $content; // Output the content
            endif;
        endforeach;

        else :
            ?>
            <div class="col-md-12">
                <div class="wishlist-empty"><?php echo esc_html(apply_filters('yith_wcwl_no_product_to_remove_message', __('No products added to the wishlist', 'yith-woocommerce-wishlist'), $wishlist)); ?></div>
            </div>
        <?php
        endif;

        if (!empty($page_links)) :
            ?>
            <div class="col-md-12 wishlist-pagination">
                <?php echo wp_kses_post($page_links); ?>
            </div>
        <?php endif ?>

        <div class="paging">
            <nav class="pagination-container">
                <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/global/prev.png" alt="">
                </button>

                <div id="pagination-numbers">
                    
                </div>

                <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/global/next.png" alt="">
                </button>
            </nav>
        </div>
</div>
