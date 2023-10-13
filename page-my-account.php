<?php get_header();
/*Template Name: My Account*/
if (is_user_logged_in()): ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/my-account.css">
  <section class="my-account">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-xl-1 col-xl-10">
          <div class="content">
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php else: ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/my-account.css">
  <div class="bd__custom">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/login-banner.jpg" alt="Login Image">
  </div>
  <section class="my_account_login">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-1 col-lg-5 col-md-12">
          <div class="login-form">
            <h2>Welcome</h2>
            <p>Log in your account</p>
            <?php echo do_shortcode('[custom_login_form]'); ?>
            <p class="text-center">Don’t have any account? <a href="<?php echo get_home_url(); ?>/register"
                target="_blank" rel="noopener noreferrer">Sign Up</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 pe-md-0">
          <div class="account_image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/login-banner.jpg" alt="Login Image">
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  // header('Location: ' . get_home_url() . '/register');
endif; ?>
<?php
get_footer();
?>