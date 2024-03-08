<?php
/* Template name: Careers */
get_header();
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/career.css">
<style>
    section.careers .card button {
        position: relative;
    }

    section.careers .arrow {
        position: absolute;
        top: 15%;
        right: 0;
        transition: transform 0.3s ease;
    }

    .modal .contact-form input {
        min-height: 50px !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
    }

    .modal .contact-form p {
        margin-bottom: 20px !important;
    }

    section.careers form label {
        color: #282828;
        text-align: center;
        font-family: 'Avenir Std light';
        font-size: 18px !important;
        margin-bottom: 10px;
        font-weight: 700;
    }
</style>
<section class="banner">
    <div class="container">
        <div class="banner__content ">
            <div class="banner__text d-flex flex-column">
                <h1 class="mb-0">Careers</h1>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur. Id eget orci vestibulum feugiat. Enim semper sed
                    ultricies vivamus nisl aliquam.</p>
            </div>
        </div>
    </div>
</section>

<section class="careers">
    <div class="container">
        <div class="careers__content d-flex flex-column">

            <?php
            // Array of locations with their names and IDs
            $locations = array(
                'all' => 'All',
                'balintawak' => 'Balintawak, Quezon City',
                'meycuayan' => 'Meycauayan, Bulacan',
                'cebu' => 'Cebu City',
                'davao' => 'Davao City'
            );
            ?>

            <ul class="nav">
                <?php foreach ($locations as $id => $name): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($id === 'all') ? 'active' : ''; ?>" data-toggle="tab"
                            href="#<?php echo $id; ?>">
                            <?php echo $name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-content">
                <?php foreach ($locations as $id => $name): ?>
                    <div class="tab-pane fade<?php echo ($id === 'all') ? ' active show' : ''; ?>" id="<?php echo $id; ?>">
                        <div class="accordion" id="accordionExample">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $blogPosts = array(
                                'paged' => $paged,
                                'post_type' => 'career',
                                'post_status' => 'draft',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'desc',
                            );

                            // Set category_name for specific locations
                            if ($id !== 'all') {
                                // Fix category_name for Meycauayan
                                $category_name = ($id === 'meycuayan') ? 'Meycauayan' : $id;
                                $blogPosts['category_name'] = $category_name;
                            }

                            $blogs = new WP_Query($blogPosts);
                            if ($blogs->have_posts()):
                                while ($blogs->have_posts()):
                                    $blogs->the_post();
                                    ?>

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <button class="accordion-button btn btn-link d-flex flex-column" type="button"
                                            data-toggle="collapse"
                                                data-target="#collapseOne-<?php echo $id; ?>" aria-expanded="true"
                                                aria-controls="collapseOne-<?php echo $id; ?>">
                                                <h3 class="mb-0">
                                                    <?php echo the_title(); ?>
                                                </h3>
                                                <div class="d-flex gap-15 align-items-center">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                            viewBox="0 0 24 25" fill="none">
                                                            <path
                                                                d="M12 12.4399C11.337 12.4399 10.7011 12.1765 10.2322 11.7077C9.76339 11.2389 9.5 10.603 9.5 9.93994C9.5 9.2769 9.76339 8.64102 10.2322 8.17217C10.7011 7.70333 11.337 7.43994 12 7.43994C12.663 7.43994 13.2989 7.70333 13.7678 8.17217C14.2366 8.64102 14.5 9.2769 14.5 9.93994C14.5 10.2682 14.4353 10.5933 14.3097 10.8967C14.1841 11.2 13.9999 11.4756 13.7678 11.7077C13.5356 11.9399 13.26 12.124 12.9567 12.2496C12.6534 12.3753 12.3283 12.4399 12 12.4399ZM12 2.93994C10.1435 2.93994 8.36301 3.67744 7.05025 4.99019C5.7375 6.30295 5 8.08343 5 9.93994C5 15.1899 12 22.9399 12 22.9399C12 22.9399 19 15.1899 19 9.93994C19 8.08343 18.2625 6.30295 16.9497 4.99019C15.637 3.67744 13.8565 2.93994 12 2.93994Z"
                                                                fill="#282828" />
                                                        </svg>
                                                    </div>
                                                    <p class="mb-0">
                                                        <?php
                                                        $categories = get_the_category();

                                                        if (!empty($categories)) {
                                                            echo esc_html($categories[0]->name);
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            </button>
                                        </div>
                                        <div id="collapseOne-<?php echo $id; ?>" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php echo the_content(); ?>
                                                <button type="button" class="btn" data-toggle="modal" data-target="#careerModal"
                                                    onclick="setJobTitle('<?php echo the_title(); ?>')">Apply now</button>
                                            </div>
                                        </div>

                                    </div>


                                    <?php
                                endwhile;
                            else:
                                ?>
                                <p>
                                    <?php esc_html_e('Sorry, no posts matched your criteria.'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="careerModal" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="d-flex flex-column flex-lg-row gap-30">
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/careers/modal-image.jpg"
                                        alt="">
                                </div>
                                <div class="contact-form">
                                    <!-- <div class="mr-auto"> -->
                                    <button type="button" data-dismiss="modal" class="btn border-0 d-flex ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z"
                                                fill="black" />
                                        </svg>
                                    </button>
                                    <!-- </div> -->
                                    <h1>Lorem Ipsum Dolor</h1>
                                    <?php echo do_shortcode('[contact-form-7 id="fc64174" title="Career"]') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<?php get_footer(); ?>