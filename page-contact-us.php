<?php get_header(); 
/*Template Name: Contact Us*/
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
?>
<!-- start contact us section -->
<?php
$section = "contact_us";
$header = "Contact us";
$p_content1 = "Whether you have questions, need assistance, or want to share the latest triumphs in your card collection journey, we're here to listen and respond.";
$p_content2 = "Your connection with us is essential, and we look forward to hearing from you soon.";
$bg = get_stylesheet_directory_uri().'/assets/img/homepage/have-question-bg-new.jpg';
$form_short_code = '[contact-form-7 id="43654f5" title="Contact Us"]';
$data = array(
        'section' => $section,    
        'header' => $header, 
        'p_content' => $p_content, 
        'form_short_code' => $form_short_code,
        'bg' => $bg
    );
    // Load the template
    ob_start();
?>
<?php echo wc_get_template('section_template/section.left_form.php', $data);?>
<?php
    $content = ob_get_clean();
    // Output the content
    echo $content;
?>
<!-- end contact us section -->
<?php get_footer();?>