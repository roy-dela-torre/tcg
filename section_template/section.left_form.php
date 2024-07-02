<section class="<?php echo $section; ?>" style="background:url('<?php echo $bg;?>')no-repeat center center/cover">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xxl-8 col-xl-9 col-lg-12 px-sm-0">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white"><?php echo $header; ?></h2>
                            <p class="text-white"><?php echo $p_content1?></p>
                            <?php if(is_page('contact-us')):?>
                            <p class="text-white"><?php echo $p_content2?></p>
                            <?php endif;?>
                            <?php echo do_shortcode($form_short_code); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-12">
                    <div class="contact-details">
                        <h4 class="text-white text-uppercase">contact details:</h4>
                        <a href="tel:63+ 092123456789"><img loading="lazy" src="http://innovnational.com/tcg/wp-content/themes/tcg/assets/img/homepage/telephone.png" alt=""> 63+ 092123456789</a>
                        <a href="mailto:loremipsum@gmail.com"><img loading="lazy" src="http://innovnational.com/tcg/wp-content/themes/tcg/assets/img/homepage/email.png" alt="">loremipsum@gmail.com</a>
                        <a target="_blank" rel="noopener noreferrer"><img loading="lazy" src="http://innovnational.com/tcg/wp-content/themes/tcg/assets/img/homepage/fb.png" alt="">lorem ipsum</a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="http://innovnational.com/tcg/wp-content/themes/tcg/assets/img/homepage/instagram.png" alt="">lorem ipsum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
section.<?php echo $section; ?> .content {
    background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/have-quiestion-bg.png')no-repeat center center/100% 771px;
    max-width: 866px;
    min-height: 771px;
    display: flex;
    align-items: center;
    justify-content: center;
}

section.<?php echo $section; ?> form p {
    display: flex;
    flex-direction: column;
    gap: 20px 0;
    margin-bottom: 0;
}

section.<?php echo $section; ?> form.wpcf7-form.invalid .wpcf7-response-output {
    margin-top: 0;
}

section.<?php echo $section; ?> input:not([type="submit"]),
section.<?php echo $section; ?> textarea {
    border-radius: 5px;
    background: #FFF;
    padding: 15px 20px;
    width: 100%;
    border: none;
}

section.<?php echo $section; ?> input:not([type="submit"])::placeholder,
section.<?php echo $section; ?> textarea::placeholder {
    color: #A5A5A5;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    text-transform: capitalize;
    border: none;
}

section.<?php echo $section; ?> textarea {
    max-height: 83px;
}

section.<?php echo $section; ?> input[type="submit"] {
    border-radius: 10px;
    background: #00CBFF;
    color: #FFF;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    text-transform: uppercase;
    text-align: center;
    padding: 20px 30px;
    width: 100%;
    border: none;
}

section.<?php echo $section; ?> .content-container {
    max-width: 613px;
    margin: auto auto auto 100px;
    display: flex;
    flex-direction: column;
}

section.<?php echo $section; ?> .contact-details {
    display: flex;
    flex-direction: column;
    justify-content: end;
    height: 100%;
    padding-bottom: 30px;
    gap: 15px 0;
}

section.<?php echo $section; ?> .contact-details a {
    display: flex;
    color: #FFF;
    font-size: 18px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    text-transform: uppercase;
    gap: 0 15px;
}

section.<?php echo $section; ?> .contact-details a img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

section.<?php echo $section; ?> .screen-reader-response>ul {
    display: none;
}

section.<?php echo $section; ?> span.wpcf7-form-control-wrap {
    display: flex;
    flex-direction: column;
    gap: 10px 0;
}

section.<?php echo $section; ?> span.wpcf7-not-valid-tip,
section.<?php echo $section; ?> .wpcf7-response-output {
    color: #FFF;
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-style: normal;
    font-weight: 300;
    line-height: normal;
    margin-bottom: 10px;
}
</style>