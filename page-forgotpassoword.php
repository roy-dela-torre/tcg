<?php
/*
 * Template Name: Forgot Password
 */

get_header();

// Check if the user is already logged in
if (is_user_logged_in()) {
    echo '<p>You are already logged in.</p>';
} else {
    ?>
    <section class="forgot_password">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <?php
                                    // Display the WooCommerce forgot password form
                                    wc_get_template('myaccount/form-lost-password.php');
                                    ?>
                                </div>
                            </article>

                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}

get_footer();
?>
