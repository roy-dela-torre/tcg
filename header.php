<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_title(); ?></title>
    <?php include 'stylesheet-manager.php';?>
    <?php wp_head()?>
    <!-- <link rel="icon" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/logo-icon.png" sizes="32x32" /> -->
</head>
<body <?php body_class(); ?>>
<div class="narbar fixed-top">
  <nav class="navbar navbar-expand-xxl bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand pt-0 pb-0" href="<?php echo get_home_url(); ?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/tcg-logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php wp_nav_menu(array('Primary Menu' => 'Primary','menu_class' => 'navMenu navbar-nav me-auto mb-2 mb-lg-0','container' => false,));?>
          <div class="group d-none d-sm-flex">
            <form class="d-flex m-0" role="search">
                <div class="input-group d-flex">
                    <form role="search" method="get" class="d-flex searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <div class="form-outline">
                        <input class="form-control me-2 mb-0 p-0" type="search" placeholder="Search..." aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
                      </div>
                      <button type="submit" class="btn btn-primary p-0">
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                    </form>
                </div>
            </form>
            <div class="group-button">
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/cart.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-cart.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/cart.png';" onClick="window.open('<?php echo get_home_url(); ?>/cart/');"/>
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/wishlist.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-wishlist.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/wishlist.png';" onClick="window.open('<?php echo get_home_url(); ?>/wishlist/');"/>
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/user.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-person.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/user.png';" onClick="window.open('<?php echo get_home_url(); ?>/my-account/');">
            </div>
          </div>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="sale-with-us">sell with us</a>
      </div>
      <div class="group d-flex d-sm-none">
            <form class="d-flex m-0" role="search">
                <div class="input-group d-flex">
                    <form role="search" method="get" class="d-flex searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <div class="form-outline">
                        <input class="form-control me-2 mb-0 p-0" type="search" placeholder="Search..." aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
                      </div>
                      <button type="submit" class="btn btn-primary p-0">
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                    </form>
                </div>
            </form>
            <div class="group-button">
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/cart.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-cart.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/cart.png';" onClick="window.open('<?php echo get_home_url(); ?>/cart/');"/>
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/wishlist.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-wishlist.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/wishlist.png';" onClick="window.open('<?php echo get_home_url(); ?>/wishlist/');"/>
              <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/user.png' onmouseover="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/blue-person.png';" onmouseout="this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/user.png';" onClick="window.open('<?php echo get_home_url(); ?>/my-account/');">
            </div>
        </div>
    </div>
  </nav>
</div>