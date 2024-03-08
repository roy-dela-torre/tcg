<?php get_header(); 
/*Template Name: Contact Us For Seller*/
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
?>
<section class="contact-us-for-seller">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h1 class="text-uppercase text-white">Sell your cards</h1>
                            <p class="text-white">Unlock the power of your card collection by choosing to sell with TCG.Ph.</p>
                            <p class="text-white">We understand that every card has a story, and we're here to provide a platform for you to share, trade, and turn your cards into treasure.</p>
                            <?php echo do_shortcode('[contact-form-7 id="7f009b7" title="Contact Us for seller"]')?>
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