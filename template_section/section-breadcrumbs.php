<?php
$home = get_home_url();
global $post;

if ($post) {
    $page_slug = $post->post_name;
    echo 'Page Slug: ' . $page_slug;

    // Check if the page has a parent
    $has_parent = $post->post_parent !== 0;

    // Output the breadcrumb link
    ?>
    <section class="bread_crumbs">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row">
                    <div class="d-flex-align-items-center">
                        <a href="<?php echo esc_url($home); ?>" target="_blank" rel="noopener noreferrer">Home</a> <span>></span>
                        <?php
                        if ($has_parent) {
                            $parent_permalink = get_permalink($post->post_parent);
                            $parent_title = get_the_title($post->post_parent);
                            ?>
                            <span class="separator">/</span>
                            <a href="<?php echo esc_url($parent_permalink); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($parent_title); ?></a> <span>></span>
                            <?php
                        }
                        ?>
                        <a href="<?php echo $page_slug; ?>" target="_blank" rel="noopener noreferrer"><?php echo get_the_title(); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
