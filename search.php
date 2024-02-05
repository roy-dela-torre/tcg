<?php
get_header();
global $wp_query;
$s = sanitize_text_field($_GET['s']); // Sanitize the search term

?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/css/desktop/search.css">

<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center text-white">Search Results for: "<?php echo esc_html($s); ?>"</h1>
        </div>
    </div>
</section>

<section class="searchResults">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    's' => $s,
                    'paged' => $paged,
                    'posts_per_page' => 8
                    );
                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        $searchID = get_the_ID();
                        $image_id = get_post_thumbnail_id($searchID);

                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <a href="<?php echo esc_url(get_permalink()); ?>" target="_blank" rel="noopener noreferrer">
                                <div class="content">
                                    <div class="img-container">
                                        <?php
                                        if ($image_id) {
                                            $image_url = get_the_post_thumbnail_url($searchID);
                                            ?>
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(the_title_attribute('echo=0')); ?>" class="img-fluid">
                                            <?php
                                        } else {
                                            // Display a placeholder image or default image if no featured image is available
                                            ?>
                                            <img src="http://localhost/tcg/wp-content/uploads/woocommerce-placeholder.png" alt="Placeholder Image" class="img-fluid">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="content-container">
                                        <p class="post-type"></p>
                                        <h3><?php echo esc_html(get_the_title()); ?></h3>
                                        <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
                                        <button class="view-product">
                                            view product
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <div class="pagination-link d-none">
                        <?php echo paginate_links(array('total' => $query->max_num_pages, 'prev_next' => false)); ?>
                    </div>
                    <?php wp_reset_query();
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
