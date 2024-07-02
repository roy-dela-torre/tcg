<?php
/* Template Name: Cards Search */
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
$homeUrl = get_home_url();
$fetchedBlogs = isset($_GET['cardsearch']) ? $_GET['cardsearch'] : '';
$searchQuery = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC'
);

$product_categories = get_terms( array(
    'taxonomy' => 'product_cat', // Assuming product categories taxonomy
    'hide_empty' => false, // Include categories with no posts
) );

$products_by_category = array();

// Iterate through each category
foreach ($product_categories as $category) {
    $category_slug = $category->slug;

    // Set up query for products in this category
    $category_query = $searchQuery;
    $category_query['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $category_slug,
        ),
    );
    $products_in_category = new WP_Query($category_query);
    $products_by_category[$category_slug] = $products_in_category;
}
?>
<div class="group-box p-0">
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <div class="row">
        <?php
        global $product;
        $counter = 1;
        if (array_key_exists($fetchedBlogs, $products_by_category)) {
            $productLoop = $products_by_category[$fetchedBlogs];
            if ($productLoop->have_posts()):
                while ($productLoop->have_posts()) : $productLoop->the_post();
                $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $product = wc_get_product(get_the_ID());
                $short_description = $product->get_short_description();
                $product_id = get_the_ID();
                if ($product) {
                    if ($product->is_type('variable')) {
                        $min_variation_price = number_format($product->get_variation_price('min'),2);
                        $max_variation_price = number_format($product->get_variation_price('max'),2);
                        $price_range = '₱'.$min_variation_price . ' - ' . '₱'.$max_variation_price;
                        $price = $price_range;
                    } 
                    else {
                        $price = $product->get_price_html();
                    }
                } 
                $in_wishlist = YITH_WCWL()->is_product_in_wishlist( $product_id );
                $img_src = $in_wishlist ? 'wishlist-white.png' : 'wishlist-blue.png'; ?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12" <?php echo $counter > 8 ? 'style="display:none;"' : ''; ?>>
                        <div class="content <?php echo $product->get_stock_status() === 'outofstock' ? "outofstock" : "" ?>" id="product<?php echo $product_id?>id">
                            <div class="product-image">
                                <img loading="lazy" src="<?php echo $featured_image_url; ?>" alt="<?php echo get_the_title(); ?>" class="cards">
                                <?php 
                                if ($product->get_stock_status() === 'outofstock') { ?>
                                    <p class="outOfStock text-uppercase">Out of stock</p>
                                <?php } ?>
                            </div>
                            <img src='<?php echo $imgPath; ?>wishlist-blue.png' onmouseover="this.src='<?php echo $imgPath; ?>wishlist-white.png';" onmouseout="this.src='<?php echo $imgPath; ?>wishlist-blue.png';" class="wishlist d-none d-md-block"/>
                            <div class="add-to-wishlist w-100">
                                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]')?>
                            </div>
                            <div class="content-container">
                                <p class="name"><?php echo get_the_title(); ?></p>
                                <p class="price <?php echo $product->is_on_sale() ? "sale" : "" ?>"><?php echo $product->is_on_sale() ? $price." (ON SALE)" : $price; ?></p>
                                <div class="group-button">
                                    <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="<?php echo $product->get_stock_status() === 'outofstock' ? 'javascript:void(0);' : esc_url(wc_get_cart_url() . '?add-to-cart=' . esc_attr($product_id)); ?>" class="blue-btn text-white" id="add-to-cart" <?php echo $product->get_stock_status() === 'outofstock' ? 'disabled' : ''; ?>>Add to Cart</a>
                                </div>
                                <div class="group-button-mobile d-block d-md-none">
                                    <img loading="lazy" src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" id="wishlist">
                                    <a href="<?php echo the_permalink();?>" target="_blank" rel="noopener noreferrer">
                                        <img loading="lazy" src="<?php echo $imgPath; ?>view.png" alt="" class="view">
                                    </a>
                                    <a href="<?php echo $product->get_stock_status() === 'outofstock' ? 'javascript:void(0);' : esc_url(wc_get_cart_url() . '?add-to-cart=' . esc_attr($product_id)); ?>"> 
                                        <img loading="lazy" src="<?php echo $imgPath; ?><?php echo $product->get_stock_status() === 'outofstock' ? 'cart-disable.png' : 'cart-blue.png'; ?>" alt="">
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                $counter +=1; endwhile;
            endif;
            wp_reset_postdata();
        }
        else{
            echo "No product in this categories";
        }
        ?>
    </div>
</div>
