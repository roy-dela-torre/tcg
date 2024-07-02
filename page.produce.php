<?php get_header();
/*Template Name: sample*/
?>
<section class="other-media">
    <div class="container-xxl">
        <div class="row">
            <?php
                $args = array(
                    'post_type'        => 'product',
                    'posts_per_page'   => 8,
                    'post_status'      => 'publish',
                    'order'            => 'ASC',
                );
                $productLoop = new WP_Query($args);
                if ($productLoop->have_posts()):
                    while ($productLoop->have_posts()) : $productLoop->the_post();
                        $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $product = wc_get_product(get_the_ID()); // Define $product properly
                        $short_description = $product->get_short_description();
                        $product_id = get_the_ID();
                        $title = get_the_title();
                        $url = get_the_permalink();
                        $add_to_cart = '<a href="' . ($product->get_stock_status() === 'outofstock' ? 'javascript:void(0);' : esc_url(wc_get_cart_url() . '?add-to-cart=' . esc_attr($product_id))) . '" target="_blank"><svg class="d-flex d-md-none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
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

                        if ($product) {
                            if ($product->is_type('variable')) {
                                $min_variation_price = number_format($product->get_variation_price('min'), 2);
                                $max_variation_price = number_format($product->get_variation_price('max'), 2);
                                $price_range = '₱' . $min_variation_price . ' - ' . '₱' . $max_variation_price;
                                $price = $price_range;
                            } else {
                                $price = $product->get_price_html();
                            }
                        }
                        $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);
                        $img_src = $in_wishlist ? 'wishlist-white.png' : 'wishlist-blue.png'; ?>
                        <?php
                            // Set up data to pass to the template
                            $data = array(
                                'img' => $img,     // Image URL
                                'title' => $title, // Product title
                                'price' => $price, // Product price
                                'url' => $url,
                                'add_to_cart' => $add_to_cart,
                                'product' => $product
                            );
                            // Load the template
                            ob_start();
                        ?>
                        <div class="col-xl-4 col-6">
                            <?php echo wc_get_template('single_product_content/content.php', $data);?>
                        </div>
                        <?php
                            $content = ob_get_clean();
                            // Output the content
                            echo $content;
                        ?>
                    <?php endwhile;
                    wp_reset_postdata(); // Reset the query loop
                endif;
            ?>
        </div>
        <div class="col-md-12">
            <div class="morepage text-center">
                <div class="paging">
                    <?php
                    $totalPages = $productLoop->max_num_pages;
                    echo paginate_links(array(
                        'total' => $totalPages,
                        'mid_size' => 2
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
