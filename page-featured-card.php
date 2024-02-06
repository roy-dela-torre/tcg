<?php get_header();
/*Template Name: Featured Card*/
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';

?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/featured-card.css">
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
                        <div class="categories">
                            <ul id="categories" class="active">
                                <h5>Categories <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured_card/drop_down.png" alt=""></h5>
                            <?php
                            $product_categories = get_terms(array(
                                'taxonomy'   => 'product_cat', // assuming 'product_cat' is the taxonomy for WooCommerce product categories
                                'hide_empty' => false, // set to true if you want to hide empty categories
                            ));
                            //$first = true;
                            if ($product_categories && !is_wp_error($product_categories)) {
                                foreach ($product_categories as $category) {
                                    if (esc_html($category->name) === "Uncategorized") {
                                        continue; // Skip the "UNCATEGORIZED" category and move to the next iteration
                                    }
                                    
                                    ?>
                                    <li>
                                    <input type="checkbox" name="" id="<?php echo str_replace(' ', '_', esc_html($category->name)); ?>" <?php //echo $first == true ? 'checked' : ''?>>
                                    <?php echo esc_html($category->name); ?>
                                        <!-- <a href="<?php //echo esc_url(get_term_link($category)); ?>"></a> -->
                                    </li>
                                    <?php
                                    //$first = false;
                                }
                            } else {
                                echo '<li>No product categories found</li>';
                            }
                            ?>

                            </ul>
                        </div>

                        <!-- <div class="sets">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="product_type">
                            <ul>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div> -->
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
                                'posts_per_page'   => -1,
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
                                    $in_wishlist = YITH_WCWL()->is_product_in_wishlist( $product_id );
                                    $categories = get_the_terms($product->get_id(), 'product_cat');
                                    $img_src = $in_wishlist ? 'wishlist-white.png' : 'wishlist-blue.png'; ?>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 <?php if ($categories && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            echo str_replace(' ', '_', esc_html($category->name)).' ';
                                        }
                                    }?>"
                                <?php //echo $counter>6 ? "style='display:none'" : "" ?> >
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
                        </div>
                    </div>
                    <div class="paging">
                        <nav class="pagination-container">
                            <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured_card/prev.png" alt="">
                            </button>

                            <div id="pagination-numbers">

                            </div>

                            <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/featured_card/next.png" alt="">
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        pagination()
        function pagination(){
            const paginationNumbers = $("#pagination-numbers");
            const paginatedList = $(".group-box .row");
            const listItems = paginatedList.find(".col-xl-4");
            const nextButton = $("#next-button");
            const prevButton = $("#prev-button");

            const paginationLimit = 6;
            const pageCount = Math.ceil(listItems.length / paginationLimit);
            let currentPage = 1;

            const disableButton = (button) => {
                button.addClass("disabled");
                button.attr("disabled", true);
            };

            const enableButton = (button) => {
                button.removeClass("disabled");
                button.removeAttr("disabled");
            };

            const handlePageButtonsStatus = () => {
                if (currentPage === 1) {
                    disableButton(prevButton);
                } else {
                    enableButton(prevButton);
                }

                if (pageCount === currentPage) {
                    disableButton(nextButton);
                } else {
                    enableButton(nextButton);
                }
            };

            const handleActivePageNumber = () => {
                $(".pagination-number").removeClass("active").each(function() {
                    const pageIndex = Number($(this).attr("page-index"));
                    if (pageIndex === currentPage) {
                        $(this).addClass("active");
                    }
                });
            };

            const appendPageNumber = (index) => {
                const pageNumber = $("<button></button>").addClass("pagination-number").html(index).attr("page-index", index).attr("aria-label", "Page " + index);
                paginationNumbers.append(pageNumber);
            };

            const getPaginationNumbers = () => {
                for (let i = 1; i <= pageCount; i++) {
                    appendPageNumber(i);
                }
            };

            const setCurrentPage = (pageNum) => {
                currentPage = pageNum;

                handleActivePageNumber();
                handlePageButtonsStatus();

                const prevRange = (pageNum - 1) * paginationLimit;
                const currRange = pageNum * paginationLimit;

                listItems.addClass("hidden").slice(prevRange, currRange).removeClass("hidden");
            };

            $(window).on("load", function() {
                getPaginationNumbers();
                setCurrentPage(1);

                prevButton.on("click", function() {
                    setCurrentPage(currentPage - 1);
                });

                nextButton.on("click", function() {
                    setCurrentPage(currentPage + 1);
                });

                $(document).on("click", ".pagination-number", function() {
                    setCurrentPage(parseInt($(this).attr("page-index")));
                });
            });
        }
        $('#categories li').click(function(){
            pagination()
        })
    });

</script>