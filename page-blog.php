<?php get_header();
/*Template Name: Blogs main*/
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/inc/css/blogs.css">
<section class="latest-media">
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <h1 class="text-center">Latest Media Articles</h1>
                <img src="/assets/img/blogs/h1underline.png" alt="">
            </div>
            <div class="offset-xl-1 col-xl-10">
                <div class="post">
                    <?php $custom_args = array(
                    'post_type'        => 'post',
                    'posts_per_page'   => 1,
                    'post_status' 	   => 'publish',
                    'order' => 'DESC',
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
                            <?php //if($first == true){ ?>
                                <div class="col-lg-4 col-md-6 col-sm-12" onClick="window.open('<?php echo get_permalink();?>');">
                                    <div class="feature-img">
                                        <img src="<?php echo get_the_post_thumbnail_url($blog_id); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                                    </div>
                                    <div class="content">
                                        <h3><?php echo get_the_title(); ?></h3>
                                        <p class="date"><?php echo get_the_date(); ?></p>
                                        <p class="desc"><?php echo wp_trim_words(get_the_excerpt(), 20); ?>.</p>
                                        <button class="read-more">Read More <img src="/assets/img/blogs/read-more.png" alt=""></button>
                                    </div>
                                </div>
                            <?php //$first = false; } 
                            //else{ ?>
                                <!-- <div class="small-content" onClick="window.open('<?php //echo get_permalink();?>');">
                                    <h3><?php //echo get_the_title(); ?></h3>
                                    <p class="date"><?php //echo get_the_date(); ?></p>
                                    <p class="desc"><?php //echo wp_trim_words(get_the_excerpt(), 20); ?>.</p>
                                    <button class="read-more">Read More <img src="/assets/img/blogs/read-more.png" alt=""></button>
                                </div> -->
                            <?php //}?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
​
<section class="other-media">
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <h2>Other Media Articles</h2>
            </div>
            <div class="offset-xl-1 col-xl-10">
                <div class="media">
                    <?php
                    global $paged;
                    $curpage = $paged ? $paged : 1;
                    $args = array(
                        'post_type'        => 'post',
                        'post__not_in'     => $excluded_posts, // Exclude the posts from the first query
                        'posts_per_page'   => 2,
                        'post_status' 	   => 'publish',
                        'order' => 'ASC',
                        'paged' => $paged,
                    );
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()):
                        while ($loop->have_posts()) : $loop->the_post();
                            $blog_id2 = get_the_ID();
                            $image_id = get_post_thumbnail_id($blog_id2);
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    ?>
                        <div class="content">
                            <div class="feature-img">
                                <img src="<?php echo get_the_post_thumbnail_url($blog_id2); ?>" alt="<?php echo get_the_title(); ?>>" class="img-fluid">
                            </div>
                            <a href="<?php echo get_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                <div class="content">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p class="date"><?php echo get_the_date(); ?></p>
                                    <p class="desc"><?php echo wp_trim_words(get_the_excerpt(), 20); ?>.</p>
                                    <button class="read-more">Read More <img src="/assets/img/blogs/read-more.png" alt=""></button>
                                </div>
                            </a>
                        </div>  
                        <?php endwhile; ?>
                    <?php endif; ?>              
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="morepage text-center">
                <div class="paging">
                    <?php
                    $totalPages = $loop->max_num_pages;
                    echo paginate_links(array(
                        'total' => $totalPages,
                        'mid_size' => 2
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
<script>
    var next = $('<img>', {
        src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/right.png', // Replace with the actual image URL
        alt: 'Next Image' // Add an alt attribute for accessibility
    });
    $('a.next.page-numbers').html(next);
    var prev = $('<img>', {
        src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/blogs/left.png', // Replace with the actual image URL
        alt: 'Next Image' // Add an alt attribute for accessibility
    });
    $('a.prev.page-numbers').html(prev);
</script>