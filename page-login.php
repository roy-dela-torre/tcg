<?php get_header(); ?>
<?php if (is_user_logged_in()) { ?>
    <script>
        window.location.href = '<?php echo get_home_url(); ?>/my-account/';
    </script>
<?php } else { ?>
    <section class="login">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row">
                    <?php echo do_shortcode('[custom_login_form]'); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>

