<?php get_header();
/*Template Name: My Account*/
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
//if (!is_user_logged_in()): ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/my-account.css">
  <section class="my_account">
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

<?php //else: ?>
  <!-- <section class="login">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white">Welcome</h2>
                            <p class="text-white">Log in your account</p>
                            <?php //echo do_shortcode('[custom_login_form]'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12">
                    <div class="contact-details">
                        <h4 class="text-white text-uppercase">contact details:</h4>
                        <a href="tel:63+ 092123456789"><img loading="lazy" src="<?php //echo $imgPath; ?>telephone.png" alt=""> 63+ 092123456789</a>
                        <a href="mailto:loremipsum@gmail.com"><img loading="lazy" src="<?php //echo $imgPath; ?>email.png" alt="">loremipsum@gmail.com</a>
                        <a target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php //echo $imgPath; ?>fb.png" alt="">lorem ipsum</a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php //echo $imgPath; ?>instagram.png" alt="">lorem ipsum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
  <?php
  // header('Location: ' . get_home_url() . '/register');
//endif; ?>
<?php
get_footer();
?>