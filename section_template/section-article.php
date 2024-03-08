<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/inc/section_tempalte/article.css">
<?php
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
?>
<section class="article">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center text-uppercase">articles</h2>
                </div>
                <div class="articles">
                    <div class="row">
                        <?php $firstBlog = array('post_type' => 'post','posts_per_page' => 2,'post_status' => 'publish','order' => 'DESC');
                        $results = new WP_Query($firstBlog);
                        $excluded_posts = array();
                        if ($results->have_posts()) :
                            while ($results->have_posts()) : $results->the_post();
                                $blog_id = get_the_ID();
                                $excluded_posts[] = $blog_id; ?>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                                    <a href="<?php echo the_permalink();?>" target="_blank" rel="noopener noreferrer">
                                        <div class="content">
                                            <div class="article-image">
                                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="<?php echo get_the_title(); ?>" class="feature-img">
                                            </div>
                                            <p class="date"><?php echo get_the_date(); ?></p>
                                            <h5><?php echo get_the_title(); ?></h5>
                                            <p class="description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                            <button class="read-more">read more <img loading="lazy" src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></button>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                        endif; ?>
                        <div class="col-xl-6">
                            <div class="d-flex flex-column">
                            <?php $remainingBlogs = array('post_type' => 'post','posts_per_page' => 2,'post_status' => 'publish','order' => 'DESC','post__not_in' => $excluded_posts);
                            $results = new WP_Query($remainingBlogs);
                            if ($results->have_posts()) :
                                while ($results->have_posts()) : $results->the_post();
                                    $blog_id = get_the_ID(); ?>
                                        <a href="<?php echo the_permalink();?>" target="_blank" rel="noopener noreferrer">
                                            <div class="content d-flex">
                                                <div class="image-container">
                                                    <div class="article-image">
                                                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="<?php echo get_the_title(); ?>" class="feature-img">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p class="date"><?php echo get_the_date(); ?></p>
                                                    <h5><?php echo get_the_title(); ?></h5>
                                                    <p class="description"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                                    <button class="read-more">read more <img loading="lazy" src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></button>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>