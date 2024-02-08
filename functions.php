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
    echo '<button type="button" class="minus">-</button>';
}

function custom_display_quantity_plus() {
    echo '<button type="button" class="plus">+</button>';
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

function register_sets_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Sets', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Set', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Sets', 'textdomain' ),
        'all_items'                  => __( 'All Sets', 'textdomain' ),
        'parent_item'                => __( 'Parent Set', 'textdomain' ),
        'edit_item'                  => __( 'Edit Set', 'textdomain' ),
        'update_item'                => __( 'Update Set', 'textdomain' ),
        'add_new_item'               => __( 'Add New Set', 'textdomain' ),
        'new_item_name'              => __( 'New Set Name', 'textdomain' ),
        'menu_name'                  => __( 'Sets', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'sets' ),
        'default_term'          => 'sets',
    );

    register_taxonomy( 'sets', 'product', $args );
}
add_action( 'init', 'register_sets_taxonomy' );


function register_card_type_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Product Types', 'textdomain' ),
        'all_items'                  => __( 'All Product Types', 'textdomain' ),
        'parent_item'                => __( 'Parent Product Type', 'textdomain' ),
        'edit_item'                  => __( 'Edit Product Type', 'textdomain' ),
        'update_item'                => __( 'Update Product Type', 'textdomain' ),
        'add_new_item'               => __( 'Add New Product Type', 'textdomain' ),
        'new_item_name'              => __( 'New Product Type Name', 'textdomain' ),
        'menu_name'                  => __( 'Card', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'card-type' ),
        'default_term'          => 'card-type',
    );

    register_taxonomy( 'card_type', 'product', $args );
}
add_action( 'init', 'register_card_type_taxonomy' );




function register_card_sub_type_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Product Types', 'textdomain' ),
        'all_items'                  => __( 'All Product Types', 'textdomain' ),
        'parent_item'                => __( 'Parent Product Type', 'textdomain' ),
        'edit_item'                  => __( 'Edit Product Type', 'textdomain' ),
        'update_item'                => __( 'Update Product Type', 'textdomain' ),
        'add_new_item'               => __( 'Add New Product Type', 'textdomain' ),
        'new_item_name'              => __( 'New Product Type Name', 'textdomain' ),
        'menu_name'                  => __( 'Card Sub Type', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'card-sub-type' ),
        'default_term'          => 'card-sub-type',
    );

    register_taxonomy( 'card_sub_type', 'product', $args );
}
add_action( 'init', 'register_card_sub_type_taxonomy' );


function register_Class_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Product Types', 'textdomain' ),
        'all_items'                  => __( 'All Product Types', 'textdomain' ),
        'parent_item'                => __( 'Parent Product Type', 'textdomain' ),
        'edit_item'                  => __( 'Edit Product Type', 'textdomain' ),
        'update_item'                => __( 'Update Product Type', 'textdomain' ),
        'add_new_item'               => __( 'Add New Product Type', 'textdomain' ),
        'new_item_name'              => __( 'New Product Type Name', 'textdomain' ),
        'menu_name'                  => __( 'Class', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'class' ),
        'default_term'          => 'class',
    );

    register_taxonomy( 'Class', 'product', $args );
}
add_action( 'init', 'register_Class_taxonomy' );



function register_Rarity_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Product Types', 'textdomain' ),
        'all_items'                  => __( 'All Product Types', 'textdomain' ),
        'parent_item'                => __( 'Parent Product Type', 'textdomain' ),
        'edit_item'                  => __( 'Edit Product Type', 'textdomain' ),
        'update_item'                => __( 'Update Product Type', 'textdomain' ),
        'add_new_item'               => __( 'Add New Product Type', 'textdomain' ),
        'new_item_name'              => __( 'New Product Type Name', 'textdomain' ),
        'menu_name'                  => __( 'Rarity', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'rarity' ),
        'default_term'          => 'rarity',
    );

    register_taxonomy( 'Rarity', 'product', $args );
}
add_action( 'init', 'register_Rarity_taxonomy' );


function register_foil_type_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Product Types', 'textdomain' ),
        'all_items'                  => __( 'All Product Types', 'textdomain' ),
        'parent_item'                => __( 'Parent Product Type', 'textdomain' ),
        'edit_item'                  => __( 'Edit Product Type', 'textdomain' ),
        'update_item'                => __( 'Update Product Type', 'textdomain' ),
        'add_new_item'               => __( 'Add New Product Type', 'textdomain' ),
        'new_item_name'              => __( 'New Product Type Name', 'textdomain' ),
        'menu_name'                  => __( 'Foil Type', 'textdomain' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'foil-type' ),
        'default_term'          => 'foil-type',
    );

    register_taxonomy( 'foil_type', 'product', $args );
}
add_action( 'init', 'register_foil_type_taxonomy' );



function enqueue_custom_admin_css() {
    wp_enqueue_style( 'custom-admin-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_custom_admin_css' );