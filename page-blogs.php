<?php get_header();
/*Template Name: Blogs main*/
?>

<style>
section.article h2:before{
    content: "Latest ";
}
</style>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/inc/css/desktop/blogs.css">

<?php get_template_part('section_template/section','article')?>

<section class="latest-media">
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <h2 class="text-center text-white">Other Articles</h2>
                <p class="text-white">Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                <img src="/assets/img/blogs/h1underline.png" alt="">
            </div>
            <div class="offset-xl-1 col-xl-10">
                <div class="post">
                    <?php 
                    global $paged;
                    $curpage = $paged ? $paged : 1;
                    $custom_args = array(
                    'post_type'        => 'post',
                    'posts_per_page'   => 3,
                    'post_status' 	   => 'publish',
                    'order' => 'DESC',
                    'offset'         => 4,
                    'paged'            => $paged,
                    );
                    $results = new WP_QUERY($custom_args);
                    $excluded_posts = array(); 
                    $first = true;
                    ?>
                    <?php if ($results->have_posts()) : ?>
                        <div class="row">
                            <?php while ($results->have_posts()) : $results->the_post();
                                $blog_id = get_the_ID();
                                $excluded_posts[] = $blog_id; // Store the post ID in the array
                                ?>
                            <?php if($first == true){ ?>
                                <div class="col-lg-4 col-md-6 col-sm-12" onClick="window.open('<?php echo get_permalink();?>');">
                                    <div class="feature-img">
                                        <img src="<?php echo get_the_post_thumbnail_url($blog_id); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                                    </div>
                                    <div class="content text-white">
                                        <p class="date text-white"><?php echo get_the_date(); ?></p>
                                        <h5 class="text-white"><?php echo get_the_title(); ?></h5>
                                        <p class="desc text-white"><?php echo wp_trim_words(get_the_excerpt(), 20); ?>.</p>
                                        <button class="read-more">Read More <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/icons/other-articles-read-more-arrow.png" alt=""></button>
                                    </div>
                                </div>
                            <?php $first = true; } 
                            else{ ?>
                                
                                    <div class="col-lg-4 col-md-6 col-sm-12" onClick="window.open('<?php echo get_permalink();?>');">
                                        <div class="feature-img">
                                            <img src="<?php echo get_the_post_thumbnail_url($blog_id); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                                        </div>
                                        <p class="date text-white"><?php echo get_the_date(); ?></p>
                                        <h5 class="text-white"><?php echo get_the_title(); ?></h5>
                                        <p class="desc text-white"><?php echo wp_trim_words(get_the_excerpt(), 20); ?>.</p>
                                        <button class="read-more">Read More <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/icons/other-articles-read-more-arrow.png" alt=""></button>
                                    </div>
                                
                            <?php }?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
             
                    <div class="col-12">
                        <div class="paging">
                            <?php
                            $totalPages = $results->max_num_pages;
                            echo paginate_links(array(
                                'total' => $totalPages,
                                'mid_size' => 2
                            ));
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>
<script>
    var next = $('<img>', {
        src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/icons/right.png', // Replace with the actual image URL
        alt: 'Next Image' // Add an alt attribute for accessibility
    });
    $('a.next.page-numbers').html(next);
    var prev = $('<img>', {
        src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/icons/left.png', // Replace with the actual image URL
        alt: 'Next Image' // Add an alt attribute for accessibility
    });
    $('a.prev.page-numbers').html(prev);
</script>