<?php
$bootstrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/';
$globalPath = get_stylesheet_directory_uri().'/inc/css/';
$carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<link rel="stylesheet" href="<?php echo $bootstrapPath;?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo$globalPath;?>desktop/global.css">
<link rel="stylesheet" media="screen and (max-width: 991px)" href="<?php echo$globalPath;?>mobile-tablet/global-mobile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php if(is_front_page()){ ?>
    <link rel="stylesheet" href="<?php echo $carouselPath;?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $carouselPath;?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/index.css">
    <link rel="stylesheet" media="screen and (max-width: 991px)" href="<?php echo $globalPath; ?>mobile-tablet/index-mobile.css">
<?php }else if(is_page('contact-us')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/contact-us.css">
<?php }else if(is_page('contact-us-for-seller')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/contact-us-for-seller.css">    
<?php }else if(is_page('my-account')){ ?>
    <!-- Note that the forgot pass is under my-account login css -->
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/login.css">    
<?php }else if(is_page('signup')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/signup.css">    
<?php }else if(is_page('thank-you')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/thank-you.css">    
<?php }else if(is_page('blog-single')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/blog-single.css">  
<?php }else if(is_page('faq')){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/faq.css">  
<?php }else if(is_404()){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/404.css">  
<?php }else if(is_checkout()){ ?>
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/checkout.css">    
<?php }?>