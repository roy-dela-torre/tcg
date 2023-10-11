<?php get_header(); ?>
<section class="my-account">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <dv class="content">
                    <?php echo do_shortcode('[woocommerce_my_account]')?>
                </dv>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>