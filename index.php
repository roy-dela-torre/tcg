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
                        <div class="text-uppercase text-white" id="header"><h1>Command the Elements</h1></div>
                        <p class="text-white">Immerse yourself in the enchanting world of Magic the Gathering with our diverse collection of cards. Whether you're a planeswalker or a collector, find the cards that will empower your decks and elevate your gameplay to new heights.</p>
                        <a href="/shop/" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">shop now</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="image-container">
                        <img loading="lazy" src="<?php echo $imgPath; ?>banner-magic.png" alt="" class="animate__fadeIn">
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
                        <a class="nav-link text-uppercase text-center" data-value="">flesh and blood</a>
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
                    <div class="dropdown d-flex justify-content-center">
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
                            'posts_per_page'   => -1,
                            'post_status'      => 'publish',
                            'order'            => 'DESC',
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
                                $img_src = $in_wishlist ? 'wishlist-white.png' : 'wishlist-blue.png'; ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12" <?php echo $counter>8 ? "style='display:none'" : "" ?>>
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
                <button class="blue-btn learn-more" id="view-more">View More</button>
            </div>
        </div>
    </div>
</section>

<section class="we-want-the-best overflow-hidden p-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class=" col-xl-7 col-lg-8 col-md-12 ps-0">
                <div class="content">
                    <div class="content-container">
                        <h2 class="text-uppercase text-white">We're Committed to Your Satisfaction</h2>
                        <ul class="ps-0">
                            <li class="text-white"><img loading="lazy" src="<?php echo $imgPath; ?>card.png" alt=""><p>Expand your card collection with confidence, knowing you'll find the most sought-after cards from your favorite games right here.</li>
                            <li class="text-white"><img loading="lazy" src="<?php echo $imgPath; ?>like.png" alt=""><p>Our customers love us for a reason! Join the ranks of satisfied collectors who've given us the thumbs up for our quality and service</li>
                            <li class="text-white"><img loading="lazy" src="<?php echo $imgPath; ?>award.png" alt=""><p>Rest easy knowing that all our cards are guaranteed authentic, assuring the legitimacy of your cherished collectibles. </p></li>
                            <li class="text-white"><img loading="lazy" src="<?php echo $imgPath; ?>person.png" alt=""><p>Our dedicated customer service team is here to assist you every step of the way, ensuring your experience with us is nothing short of exceptional.</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 col-md-12">
               <div class="carouseel-container">
                <div class="carousel">
                        <img loading="lazy" src="<?php echo $imgPath; ?>fleshblood.png" class="carousel-diamon left active">
                        <img loading="lazy" src="<?php echo $imgPath; ?>carletviolet.png" class="carousel-diamon right">
                        <img loading="lazy" src="<?php echo $imgPath; ?>yo-hi-uh.png" class="carousel-diamon top">
                        <img loading="lazy" src="<?php echo $imgPath; ?>magic.png" class="carousel-diamon bottom">
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>

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
                        <h2 class="text-uppercase text-white">about <a href="<?php echo get_home_url(); ?>" target="_blank" rel="noopener noreferrer">TCG.PH</a></h2>
                        <p class="text-white">TCG.PH, founded by a passionate card collector, is your go-to platform for enthusiasts, created by one of your own. Discover a community-driven hub dedicated to your trading card game passions, where collectors come together to explore, trade, and celebrate the world of TCGs</p>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="article">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center text-uppercase">articles</h2>
                </div>
                <div class="articles">
                    <div class="row">
                        <?php $firstBlog = array('post_type' => 'post','posts_per_page' => 2,'post_status' => 'publish','order' => 'DESC');
                        $results = new WP_Query($firstBlog);
                        $excluded_posts = array();
                        if ($results->have_posts()) :
                            while ($results->have_posts()) : $results->the_post();
                                $blog_id = get_the_ID();
                                $excluded_posts[] = $blog_id; ?>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                    <a href="<?php echo the_permalink();?>" target="_blank" rel="noopener noreferrer">
                                        <div class="content">
                                            <div class="article-image">
                                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="<?php echo get_the_title(); ?>" class="feature-img">
                                            </div>
                                            <p class="date"><?php echo get_the_date(); ?></p>
                                            <h5><?php echo get_the_title(); ?></h5>
                                            <p class="description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                            <button class="read-more">read more <img loading="lazy" src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></button>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                        endif; ?>
                        <div class="col-xl-6">
                            <div class="d-flex flex-column">
                            <?php $remainingBlogs = array('post_type' => 'post','posts_per_page' => 2,'post_status' => 'publish','order' => 'DESC','post__not_in' => $excluded_posts);
                            $results = new WP_Query($remainingBlogs);
                            if ($results->have_posts()) :
                                while ($results->have_posts()) : $results->the_post();
                                    $blog_id = get_the_ID(); ?>
                                        <a href="<?php echo the_permalink();?>" target="_blank" rel="noopener noreferrer">
                                            <div class="content d-flex">
                                                <div class="image-container">
                                                    <div class="article-image">
                                                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="<?php echo get_the_title(); ?>" class="feature-img">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p class="date"><?php echo get_the_date(); ?></p>
                                                    <h5><?php echo get_the_title(); ?></h5>
                                                    <p class="description"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                                    <button class="read-more">read more <img loading="lazy" src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></button>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="have-question">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white">Have a Question?</h2>
                            <p class="text-white">Whether you're seeking information on our card selection or need assistance with your collection, feel free to reach out. Our dedicated support team is centered on providing you with the answers and guidance you need.</p>
                            <?php echo do_shortcode('[contact-form-7 id="40b3e57" title="Contact form 1"]')?>
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
</section>
<?php get_footer(); ?>