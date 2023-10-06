<?php $homeUrl = get_home_url(); ?>
</body>
<footer>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl col-xl-12">
                    <div class="logo d-flex justify-content-center">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/homepage/footer-logo.png" alt="">
                    </div>
                </div>
                <div class="col-xxl col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h5>Quick links</h5>
                    <div class="row">
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">home</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">About</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">Articles</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">Contact us</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">faqs</a></div>
                    </div>
                </div>
                <div class="col-xxl col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h5>trading Cards</h5>
                    <div class="row">
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">flesh and blood</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">pokémon</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">Yu-Gi-Oh!</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">Magic</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">Digimon</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">One peace</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">Cardfight!! Vanguard</a></div>
                        <div class="col-4"><a href="http://" target="_blank" rel="noopener noreferrer">more cards</a></div>
                    </div>
                </div>
                <div class="col-xxl col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <h5>Policies</h5>
                    <div class="row">
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">Terms and Condition</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">Shipping Policy</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">Refund Policy</a></div>
                        <div class="col-6"><a href="http://" target="_blank" rel="noopener noreferrer">privacy policy</a></div>
                    </div>
                </div>
                <div class="col-xxl col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="content d-flex flex-column">
                        <h4>Interested in selling your cards?</h4>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="sale-with-us">sell with us</a>
                    </div>
                </div>
                <div class="bottom">
                    <hr>
                    <p class="copyr-right text-uppercase"><b>Copyright © 2022 - <?php echo date('Y')?> TCG.ph | <a href="https://seo-hacker.com/seo-philippines/" target="_blank" rel="noopener noreferrer">SEO</a> <a href="https://seo-hacker.com/" target="_blank" rel="noopener noreferrer"> by SEO-Hacker</a>. Optimized and maintained by <a href="https://sean.si/" target="_blank" rel="noopener noreferrer">Sean Si</a></b></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php include('script-manager.php')?>
<?php is_front_page() ? "" : wp_footer()?>
</html>