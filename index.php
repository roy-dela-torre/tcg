<?php get_header();
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
$homeUrl = get_home_url();
?>
<style>
    /* ajax loading spinner */

.featured-card #overlay {
    position: fixed;
    top: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    display: none;
    background: rgba(0, 0, 0, 0.6);
    left: 0;
}

.featured-card .cv-spinner {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.featured-card .spinner {
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

.featured-card .is-hide {
    display: none;
}

</style>
<section class="banner">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12 px-md-0">
                    <div class="content">
                        <div class="text-uppercase text-white" id="header"><h1>Rathe Awaits</h1></div>
                        <p class="text-white">Step into the mystical realm of Rathe with our extraordinary selection of Flesh and Blood cards. Your journey begins here; find, trade, and acquire the cards that will make your collection legendary.</p>
                        <a href="/shop/" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">shop now</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="image-container">
                        <img src="<?php echo $imgPath; ?>banner_right_image1.png" alt="" class="animate__fadeIn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured-card">
    <nav class="navbar navbar-expand-xxl bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-xxl-none">featured cards</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="categories d-flex d-block d-sm-none">
                    <span>Categories:</span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="background-image: url(&quot;http://localhost/tcg/wp-content/themes/tcg/assets/img/homepage/close-btn.png&quot;);"></span>
                    </button>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase text-center active" data-value="">featured cards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">flesh-and-blood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">PokÉmon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">Yu-gi-oh!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">magic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">digimon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">one piece</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-center" data-value="">cardfight!! vanguard</a>
                    </li>
                    <div class="dropdown d-flex justify-content-center" id="drop_down">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More
                        </button>
                        <ul class="dropdown-menu row">
                            <div class="col-md col-sm-6">
                                <li><a class="dropdown-item  text-uppercase" data-value="">BAKUGAN TCG</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">WORLD OF WARCRAFT TCG</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">DISNEY LORCANA</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">DRagon ball super ccg</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">DRagon ball Z tcg</a></li>
                            </div>
                            <div class="col-md col-sm-6">
                                <li><a class="dropdown-item  text-uppercase" data-value="">dice master</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">dragoborne</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">meta x TCG</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">bakugan tcg</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">duel master</a></li>
                            </div>
                            <div class="col-md col-sm-6">
                                <li><a class="dropdown-item  text-uppercase" data-value="">final fantasy</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">zombie world order</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">metazoo</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">star wars: destiny</a></li>
                                <li><a class="dropdown-item  text-uppercase" data-value="">future card buddyfight</a></li>
                            </div>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center text-uppercase">featured cards</h2>
                </div>
                <div class="group-box p-0">
                    <div id="overlay">
                        <div class="cv-spinner">
                            <span class="spinner"></span>
                        </div>
                    </div>
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
                                            'product' => $product,
                                            'product_id' => $product_id
                                        );
                                        // Load the template
                                        ob_start();
                                    ?>
                                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-6">
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
                </div>
                <button class="blue-btn learn-more position-relative" id="view-more">
                    <a href="<?php echo $homeUrl; ?>/shop/" target="_blank" rel="noopener noreferrer" class="stretched-link">View More</a>
                </button>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('section_template/section','carousel')?>

<section class="about-us px-sm-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="image-container">
                    <img loading="lazy" src="<?php echo $imgPath; ?>about.png" alt="">
                </div>
            </div>
            <div class="col-lg-9 col-md-12 px-sm-0">
                <div class="content">
                    <div class="content-container">
                        <h2 class="text-uppercase text-white">about <a href="<?php echo get_home_url(); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-block;font-size:unset">TCG.PH</a></h2>
                        <p class="text-white">TCG.PH, founded by a passionate card collector, is your go-to platform for enthusiasts, created by one of your own. Discover a community-driven hub dedicated to your trading card game passions, where collectors come together to explore, trade, and celebrate the world of TCGs</p>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('section_template/section','article')?>

<!-- <section class="have-question">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white">Have a Question?</h2>
                            <p class="text-white">Whether you're seeking information on our card selection or need assistance with your collection, feel free to reach out. Our dedicated support team is centered on providing you with the answers and guidance you need.</p>
                            <?php echo do_shortcode('[contact-form-7 id="40b3e57" title="Contact Form Homepage"]')?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12">
                    <div class="contact-details">
                        <h4 class="text-white text-uppercase">contact details:</h4>
                        <a href="tel:63+ 092123456789"><img loading="lazy" src="<?php echo $imgPath; ?>telephone.png" alt=""> 63+ 092123456789</a>
                        <a href="mailto:loremipsum@gmail.com"><img loading="lazy" src="<?php echo $imgPath; ?>email.png" alt="">loremipsum@gmail.com</a>
                        <a target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php echo $imgPath; ?>fb.png" alt="">lorem ipsum</a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php echo $imgPath; ?>instagram.png" alt="">lorem ipsum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->





<!-- start contact us section -->
<?php
$section = "have-question";
$header = "HAVE A QUESTION?";
$p_content = "Whether you're seeking information on our card selection or need assistance with your collection, feel free to reach out. Our dedicated support team is centered on providing you with the answers and guidance you need.";
$form_short_code = '[contact-form-7 id="40b3e57" title="Contact Form Homepage"]';
$bg = get_stylesheet_directory_uri().'/assets/img/homepage/have-question-bg-new.jpg';
$data = array(
        'section' => $section,    
        'header' => $header, 
        'p_content' => $p_content, 
        'form_short_code' => $form_short_code,
        'bg' => $bg
    );
    // Load the template
    ob_start();
?>
<?php echo wc_get_template('section_template/section.left_form.php', $data);?>
<?php
    $content = ob_get_clean();
    // Output the content
    echo $content;
?>
<!-- end contact us section -->


<!-- Wishlist modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary wishlist_modal_btn d-none" data-bs-toggle="modal" data-bs-target="#exampleModal" style="visibility: hidden;"></button>

<!-- Modal -->
<div class="product_added_to_wislist">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <h5 class="text-uppercase">Added to wish list:</h5>
        <div class="product">
            <img src="" alt="">
            <div class="product_info">
                <p class="product_name"></p>
                <p class="price"></p>
            </div>
        </div>
        <div class="group_button">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Browse product</button>
            <a href="/wishlist/" class="view_wishlist">View wish List</a>
        </div>
        </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>