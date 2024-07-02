<?php get_header();
/*Template Name: Featured Card*/
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';

?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/featured-card.css">
<style>
    /* ajax loading spinner */

.feature_card #overlay {
    position: fixed;
    top: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    display: none;
    background: rgba(0, 0, 0, 0.6);
    left: 0;
}

.feature_card .cv-spinner {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.feature_card .spinner {
    width: 40px;
    height: 40px;
    border: 4px #ddd solid;
    border-top: 4px #2e93e6 solid;
    border-radius: 50%;
    animation: sp-anime 0.8s infinite linear;
}

@keyframes sp-anime {
    100% {
        transform: rotate(360deg);
    }
}

.feature_card .is-hide {
    display: none;
}

</style>
<section class="feature_card">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h1 class="text-center text-uppercase">featured cards</h1>
                </div>
                <div class="bread_crumbs">
                    <?php woocommerce_breadcrumb(); ?>
                </div>
                <div class="col-lg-3 col-md-12 mb-5">
                    <div class="filter">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#categores" aria-expanded="true" aria-controls="categores">
                                    Categories
                                </button>
                                </h5>
                                <div id="categores" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-0">
                                        <ul class="ps-0 mb-0">
                                            <?php $product_categories = get_terms(array(
                                                'taxonomy'   => 'product_cat', // assuming 'product_cat' is the taxonomy for WooCommerce product categories
                                                'hide_empty' => false, // set to true if you want to hide empty categories
                                            ));
                                            if ($product_categories && !is_wp_error($product_categories)) {
                                                foreach ($product_categories as $category) {
                                                    if (esc_html($category->name) === "Uncategorized") {
                                                        continue; // Skip the "UNCATEGORIZED" category and move to the next iteration
                                                    } ?>
                                                    <li>
                                                        <input type="checkbox" name="" id="<?php echo str_replace(' ', '-', strtolower(esc_html($category->name))); ?>">
                                                            <span class="name"> <?php echo esc_html($category->name); ?></span>
                                                        </li>
                                                    <?php
                                                }
                                            } else {
                                                echo '<li>No product categories found</li>';
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $group_id = 'group_65e14aad0781e';
                            $fields = acf_get_fields($group_id);
                            $featured_product_id = get_the_ID();
                            foreach ($fields as $field) {
                                if ($field['type'] === 'tab') {
                                    continue;
                                }
                                $field_value = get_field($field['name'], $featured_product_id);
                                ?>
                                <div class="accordion-item">
                                    <h5 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo str_replace(' ', '_', esc_html($field['label'])); ?>" aria-expanded="true" aria-controls="<?php echo str_replace(' ', '_', esc_html($field['label'])); ?>">
                                        <?php echo esc_html($field['label']); ?>
                                    </button>
                                    </h5>
                                    <div id="<?php echo str_replace(' ', '_', esc_html($field['label'])); ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                            <ul class="ps-0 mb-0">
                                                <?php
                                                    if ($field_value !== false) {
                                                        if ($field['type'] === 'checkbox') {
                                                            $choices = $field['choices'];
                                                            foreach ($choices as $choice) {
                                                                ?>
                                                                    <li>
                                                                        <input type="checkbox" name="" id="<?php echo  str_replace(' ','_', esc_html($choice)); ?>">
                                                                        <span class="name"><?php echo  esc_html($choice); ?></span>
                                                                    </li>
                                                                <?php 
                                                            }
                                                        } elseif ($field['type'] === 'select' || $field['type'] === 'radio') {
                                                            $choices = $field['choices'];
                                                            foreach ($choices as $choice) {
                                                                echo '<p>' . esc_html($choice) . '</p>';
                                                            }
                                                        } else {
                                                            echo '<p>' . esc_html($field_value) . '</p>';
                                                        }
                                                    } else {
                                                        echo '<p>No value</p>';
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="group-box">
                        <div id="overlay">
                            <div class="cv-spinner">
                                <span class="spinner"></span>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            global $paged;
                            $curpage = $paged ? $paged : 1;
                            $args = array(
                                'post_type'        => 'product',
                                'posts_per_page'   => 6,
                                'post_status'      => 'publish',
                                'order'            => 'DESC',
                                'paged'            => $paged,
                            );
                            global $product;
                            $counter = 1;
                            $productLoop = new WP_Query($args);
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
                                    $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);
                                    $img_src = $in_wishlist ? 'wishlist-white.png' : 'wishlist-blue.png';
                                    $product_categories = get_the_terms($product_id, 'product_cat');
                                    $categories = array();
                                    if ($product_categories) {
                                        foreach ($product_categories as $category) {
                                            $categories[] = str_replace(' ', '_', strtolower($category->name));
                                        }
                                    }
                                    $url_array[] = get_permalink();
                                    ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 <?php echo implode(', ', $categories); ?> ">
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
                                <?php $counter +=1; endwhile;
                            endif; wp_reset_postdata(); ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>
$(document).ready(function() {
    <?php foreach ($url_array as $url): ?>
        fetchData('<?php echo $url; ?>');
    <?php endforeach; ?>
    function fetchData(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var productInfo = $(response).find('.product_info');
                var data = '';
                productInfo.find('.acf-field').each(function() {
                    var title = $(this).find('h4').text().trim();
                    var value = $(this).find('p').text().trim(); // Corrected declaration
                    $('section.feature_card .group-box .row>div').each(function(){
                        $(this).addClass(value.replace(/\s+/g, '_'));
                    });
                    data += title + '\n' + value + '\n'; // Added a line break after each value
                });
                $('#result').html(data);
            }
        });
    }

    $('div#accordionExample input[type="checkbox"]').click(function() {
        cardsFilter();
    });

    function cardsFilter() {
        var selectedFilters = [];
        $('div#accordionExample input[type="checkbox"]:checked').each(function() {
            selectedFilters.push($(this).attr('id')); // Change to get checkbox ID
        });
        var filterbtn = selectedFilters.join(',');
        console.log('Selected filters: ' + filterbtn); // Check selected filters in console
        // Make AJAX request with selected filters
        $.ajax({
            url: '<?php home_url( $_SERVER['REQUEST_URI'] ); ?>/tcg/featured-card-search/?featuredCardsearch=' + filterbtn,
            type: 'GET',
            beforeSend: function(xhr) {
                $("#overlay").show();
            },
            complete: function() {
                $("#overlay").hide();
            },
            success: function(data) {
                $('.group-box').html(data);
            }
        });
    }

});
</script>