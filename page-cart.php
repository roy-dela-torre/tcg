<?php get_header(); ?>
<section class="cart">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <h1>Your Cart</h1>
            </div>
            <div class="offset-md-1 col-md-10">
                <div class="cart-container">
                    <?php echo do_shortcode('[woocommerce_cart]')?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <?php //echo get_template_part('page-section/product-section', 'product-section'); ?> -->
<?php get_footer(); ?>
