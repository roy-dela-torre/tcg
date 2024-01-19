<?php get_header(); 
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
?>
<section class="contact-us">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white">Contact us</h2>
                            <p class="text-white">Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. </p>
                            <?php echo do_shortcode('[contact-form-7 id="9b04170" title="Contact us"]')?>
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
<?php get_footer();?>