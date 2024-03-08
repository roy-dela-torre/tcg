<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_account_navigation' );

$imgPath = get_stylesheet_directory_uri().'/assets/img/my-account/';
$homeUrl = get_home_url();

?>

<nav class="woocommerce-MyAccount-navigation main-nav-container">

    <div class="user-avatar">
        <img src="<?php echo $imgPath; ?>/user-avatar-sample.png" alt="">
        <h5>Username here</h5>
    </div>

    <ul class="main-nav">
        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
            <?php
            // Customize the labels here
            switch ($label) {
                case 'Dashboard':
                    $label = 'My Account';
                    break;
                case 'Orders':
                    $label = 'My Orders';
                    break;
                case 'Downloads':
                    $label = 'Downloads';
                    break;
                case 'Addresses':
                    $label = 'Shipping Address';
                    break;
                case 'Account details':
                    $label = 'My Account Details';
                    break;
                case 'Logout':
                    $label = 'Logout';
                    break;
            }
            ?>

            <script>
                console.log("test: <?php echo wc_get_account_menu_item_classes( $endpoint ); ?> \n")
            </script>

            <?php if ($label == "Downloads"): continue; endif; ?>
            <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
