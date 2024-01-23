<?php
get_header();
global $wp_query;
$s = $_GET['s'];
?>
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <h1 class="textt-center text-white">Search Results for: "<?php echo $s;?>"</h1>
        </div>
    </div>
</section>
<section class="searchResults" id="four-o-four">
    <div class="container">
        <hr>
        <div class="row">
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
                's' => $s,
                'paged' => $paged,
                'posts_per_page' => 3,
                'post_type' => 'post', 
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $searchID = get_the_ID();
                    $image_id = get_post_thumbnail_id($searchID);
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                            <div class="content">
                                <div class="img-container">
                                    <img src="<?php echo get_the_post_thumbnail_url($searchID); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                                </div>
                                <div class="content-container">
                                    <p class="post-type"></p>
                                    <h3><?php echo the_title(); ?></h3>
                                    <?php echo wp_trim_words(get_the_content(), 10); ?>
                                    <button class="view-product">
                                        view product
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <div class="pagination-link">
                    <?php echo paginate_links(array('total' => $query->max_num_pages, 'prev_next' => false)); ?>
                </div>
                <?php wp_reset_query();
            endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
