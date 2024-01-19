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
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" required placeholder="Name" />
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" placeholder="Email" autocomplete="email" value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>" required />
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="Password" required /><span class="show-password-input"></span></span>
            </p>
            <div class="woocommerce-privacy-policy-text">
                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="<?php echo esc_url(get_privacy_policy_url()); ?>" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
            </div>
            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>
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