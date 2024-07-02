<?php
if ( ! function_exists( 'tcg' ) ) :
    function tcg() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'tcgNavMenu' )
        ) );
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' ); 
        add_theme_support( 'wc-product-gallery-lightbox' ); 
        add_theme_support( 'wc-product-gallery-slider' );
    }
    endif; 
    add_action( 'after_setup_theme', 'tcg' );
    function get_excerpt($limit, $source = null){
        $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
        $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $limit);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        return $excerpt;
    }

    function registration_form() {
        ob_start();
        ?>
        <form method="post" class="woocommerce-form woocommerce-form-register register">
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" required placeholder="Full Name" />
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" placeholder="Email Address" autocomplete="email" value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>" required />
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="Password" required /><span class="show-password-input"></span></span>
            </p>
            <!-- <div class="woocommerce-privacy-policy-text">
                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
            </div> -->
            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">create an account</button>
            </p>
        </form>
        <?php
        return ob_get_clean();
    }
    
    add_shortcode('registration_form', 'registration_form');


    //Log in Form
function custom_login_form_shortcode() {
   if (is_user_logged_in()) {
       // If the user is already logged in, display a message or redirect as needed
       return 'You are already logged in.';
   } else {
       // If the user is not logged in, display the custom login form with placeholders and "Remember Me" checkbox
       ob_start();
       ?>
       <form method="post" class="custom-login-form" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>">
           <p>
               <label for="user_login">Username:</label>
               <input type="text" name="log" id="user_login" placeholder="Email" required />
           </p>
           <p>
               <label for="user_pass">Password:</label>
               <input type="password" name="pwd" id="user_pass" placeholder="Password" required />
           </p>
           <p class="login-remember">
               <label>
                   <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me
               </label>
           </p>
           <p>
               <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
           </p>
       </form>
       <?php
       return ob_get_clean();
   }
}
add_shortcode('custom_login_form', 'custom_login_form_shortcode');


add_filter( 'yith_wcwl_is_wishlist_responsive', '__return_false' );



/* Add Plus and Minus Button for Quantity Input */
add_action('woocommerce_before_quantity_input_field', 'custom_display_quantity_minus');
add_action('woocommerce_after_quantity_input_field', 'custom_display_quantity_plus');

function custom_display_quantity_minus() {
    echo '<button type="button" class="minus">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
            <path d="M15.5 10.4997C15.5 10.7581 15.4305 11.0059 15.3067 11.1886C15.1829 11.3713 15.015 11.474 14.84 11.474H5.16C4.98496 11.474 4.81708 11.3713 4.69331 11.1886C4.56954 11.0059 4.5 10.7581 4.5 10.4997C4.5 10.2413 4.56954 9.99348 4.69331 9.81076C4.81708 9.62804 4.98496 9.52539 5.16 9.52539H14.84C15.015 9.52539 15.1829 9.62804 15.3067 9.81076C15.4305 9.99348 15.5 10.2413 15.5 10.4997Z" fill="white"/>
        </svg>
    </button>';
}

function custom_display_quantity_plus() {
    echo '<button type="button" class="plus">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
            <path d="M14.9993 11.3307H10.8327V15.4974C10.8327 15.7184 10.7449 15.9304 10.5886 16.0866C10.4323 16.2429 10.2204 16.3307 9.99935 16.3307C9.77834 16.3307 9.56637 16.2429 9.41009 16.0866C9.25381 15.9304 9.16602 15.7184 9.16602 15.4974V11.3307H4.99935C4.77834 11.3307 4.56637 11.2429 4.41009 11.0867C4.25381 10.9304 4.16602 10.7184 4.16602 10.4974C4.16602 10.2764 4.25381 10.0644 4.41009 9.90814C4.56637 9.75186 4.77834 9.66406 4.99935 9.66406H9.16602V5.4974C9.16602 5.27638 9.25381 5.06442 9.41009 4.90814C9.56637 4.75186 9.77834 4.66406 9.99935 4.66406C10.2204 4.66406 10.4323 4.75186 10.5886 4.90814C10.7449 5.06442 10.8327 5.27638 10.8327 5.4974V9.66406H14.9993C15.2204 9.66406 15.4323 9.75186 15.5886 9.90814C15.7449 10.0644 15.8327 10.2764 15.8327 10.4974C15.8327 10.7184 15.7449 10.9304 15.5886 11.0867C15.4323 11.2429 15.2204 11.3307 14.9993 11.3307Z" fill="white"/>
        </svg>
    </button>';
}

/* Trigger update quantity script */
add_action('wp_footer', 'custom_add_cart_quantity_plus_minus');

function custom_add_cart_quantity_plus_minus() {
    if (!is_product() && !is_cart()) return;

    wc_enqueue_js("
      jQuery(document).on('click', 'button.plus, button.minus', function() {

         var qty = jQuery(this).parent('.quantity').find('.qty');
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr('max'));
         var min = parseFloat(qty.attr('min'));
         var step = parseFloat(qty.attr('step'));

         if (jQuery(this).is('.plus')) {
            if (max && (max <= val)) {
               qty.val(max).change();
            } else {
               qty.val(val + step).change();
            }
         } else {
            if (min && (min >= val)) {
               qty.val(min).change();
            } else if (val > 1) {
               qty.val(val - step).change();
            }
         }

      });
    ");
}

/* Trigger cart update when quantity changes */
add_action('wp_footer', 'cart_refresh_update_qty');

function cart_refresh_update_qty()
{
    if (is_cart()) {
        ?>
        <script type="text/javascript">
            let timeout;
            jQuery('div.woocommerce').on('change', 'input.qty', function(){
                if (timeout !== undefined) {
                    clearTimeout(timeout);
                }
                timeout = setTimeout(function() {
                    jQuery("[name='update_cart']").trigger("click"); // trigger cart update
                }, 1000 ); // 1 second
            });

            jQuery('div.woocommerce').on('click', 'button.minus, button.plus', function(){
                jQuery("[name='update_cart']").trigger("click");
            });
        </script>
        <?php
    }
}




remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action('woocommerce_checkout_payment_hook', 'woocommerce_checkout_payment', 10 );

// Product Menu 




function enqueue_custom_admin_css() {
    wp_enqueue_style( 'custom-admin-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_custom_admin_css' );


add_filter('loop_shop_per_page', 'custom_shop_per_page', 20);

function custom_shop_per_page($cols) {
    return 6; // Change 8 to the desired number of products per page
}



    