<?php $bootsrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/'; ?>
<?php $carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<script src="<?php echo $bootsrapPath; ?>bootstrap.bundle.min.js"> </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('img[loading="lazy"]').each(function() {
        var originalSrc = $(this).attr('src');
        var width = $(this).width(); // Get the width of the image
        var height = $(this).height(); // Get the height of the image
        $(this).attr({
            'data-src': originalSrc,
            'src': originalSrc, // Clear the src attribute
            'class': $(this).attr('class') + ' lazyloaded', // Add the lazyloaded class
            'decoding': 'async', // Add the decoding attribute
            'width': width,
            'height': height
        });
    });
    <?php if(is_front_page() || is_page('homepage')):?>
        setTimeout(() => $('li#menu-item-9').addClass('active'), 1000);

        const paths = {
            bannerImg: ["banner2.jpg", "banner3.jpg", "banner4.jpg", "banner5.jpg", "banner6.jpg", "banner1.jpg"],
            card: ["banner_right_image2.png", "banner_right_image3.png", "banner_right_image4.png", "banner_right_image5.png", "banner_right_image6.png", "banner_right_image1.png"],
            diamond: ["diamond2.png", "diamond3.png", "diamond4.png", "diamond1.png", "diamond2.png", "diamond3.png", "diamond4.png"]
        };

        const texts = {
            header: [
                'Catch \'Em All', 'Master the Duel', 'Command the Elements', 'Digital Adventures Await',
                'Set Sail for One Piece Treasures', 'Rathe Awaits'
            ],
            desc: [
                'Embark on a Pokemon adventure...', 'Enter the world of epic duels...', 'Immerse yourself in Magic...',
                'Embark on a journey through the digital realm...', 'Join the grand adventure...', 'Step into the mystical realm of Rathe...'
            ]
        };

        let currentImageIndex = 0, rotationDegree = 0;

        function changeBackgroundImage() {
            $('section.banner').fadeTo(1000, 1, function () {
                rotationDegree -= 90;
                $('.image-container').toggleClass('rotate').find('img').attr('src', `<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/${paths.card[currentImageIndex]}`);
                $('.diamond img').attr('src', `<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/${paths.diamond[currentImageIndex]}`).css('transform', `rotate(${rotationDegree}deg)`);
                $('#header').html(`<h2 class="text-uppercase text-white">${texts.header[currentImageIndex]}</h2>`);
                $('section.banner p').text(texts.desc[currentImageIndex]);
                $('section.banner').css('background-image', `url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/${paths.bannerImg[currentImageIndex]}")`);
                currentImageIndex = (currentImageIndex + 1) % paths.bannerImg.length;
                if (currentImageIndex === 6) rotationDegree = 0;
                $(this).fadeTo(1000, 1);
                setTimeout(changeBackgroundImage, 5000);
            });
        }

        setTimeout(changeBackgroundImage, 5000);

        function rotateImages() {
            const transforms = {
                top: $('.top').css('transform'),
                left: $('.left').css('transform'),
                bottom: $('.bottom').css('transform'),
                right: $('.right').css('transform')
            };

            $('.left').css('transform', transforms.bottom).addClass('active');
            $('.bottom').css('transform', transforms.right);
            $('.right').css('transform', transforms.top);
            $('.top').css('transform', transforms.left);

            $('.carousel img').each(function () {
                const computedStyle = window.getComputedStyle(this);
                const matrix = {
                    desktop: 'matrix(1, 0, 0, 1, 0, -350)',
                    tablet: 'matrix(1, 0, 0, 1, 0, -170)',
                    mobile: 'matrix(1, 0, 0, 1, 0, -160)',
                    default: 'matrix(1, 0, 0, 1, 0, -220)'
                };
                const windowWidth = window.innerWidth;
                const transform = computedStyle.transform;

                if (windowWidth > 1400) {
                    transform === matrix.desktop ? $(this).addClass('active') : $(this).removeClass('active');
                } else if (windowWidth < 1200) {
                    if (windowWidth < 575) {
                        transform === matrix.mobile ? $(this).addClass('active') : $(this).removeClass('active');
                    } else {
                        transform === matrix.tablet ? $(this).addClass('active') : $(this).removeClass('active');
                    }
                } else {
                    transform === matrix.default ? $(this).addClass('active') : $(this).removeClass('active');
                }
            });
        }

        setInterval(rotateImages, 5000);

        function setEqualHeightForSection(section, element) {
            const maxHeight = Math.max(...$(section).find(element).map(function () {
                return $(this).height();
            }).get());
            $(section).find(element).height(maxHeight);
        }

        setEqualHeightForSection('section.featured-card', 'p.name');
        setEqualHeightForSection('section.featured-card', 'p.price');

        let slice = 0;

        function checkWindowWidth() {
            const windowWidth = $(window).width();
            slice = windowWidth <= 767 ? 1 : windowWidth <= 991 ? 2 : windowWidth <= 1200 ? 3 : 4;
        }

        $(window).resize(checkWindowWidth);
        checkWindowWidth();

        $('img.wishlist,img#wishlist').click(function () {
            const contentId = $(this).closest('.content').attr('id');
            $(`section.featured-card .content#${contentId} a.add_to_wishlist`).click();
        });

        $('section.featured-card button.navbar-toggler').click(function () {
            const $icon = $('section.featured-card span.navbar-toggler-icon');
            const images = {
                open: 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/filter.png")',
                close: 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/close-btn.png")'
            };
            $icon.css('background-image', $icon.css('background-image') === images.open ? images.close : images.open);
        });

        $('input.wpcf7-form-control.wpcf7-submit.has-spinner').click(function () {
            setTimeout(() => {
                const content = $('section.have-question .content');
                const isInvalid = $('div#wpcf7-f15-o1 form').hasClass('invalid');
                const height = isInvalid ? '900px' : '771px';
                content.css({
                    'background': `url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/have-quiestion-bg.png') no-repeat center center/100% ${height}`,
                    'min-height': height
                });
            }, 2000);
        });

        $('section.featured-card li a').click(function () {
            const text = $(this).text();
            $('a.navbar-brand.d-block.d-xxl-none, section.featured-card h2').text(text);
        });

        $('ul.navbar-nav li.nav-item a').click(function () {
            $('ul.navbar-nav li.nav-item').removeClass('active');
            $(this).parent().addClass('active');
            $('section.featured-card #drop_down').removeClass('active');
            const selectedFilter = $(this).text();
            cardsFilter(selectedFilter);
        });

        function cardsFilter(selectedFilter) {
            $.ajax({
                url: `<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/card-search/?cardsearch=${selectedFilter}`,
                type: 'GET',
                beforeSend: () => $("#overlay").show(),
                complete: () => $("#overlay").hide(),
                success: data => $('.group-box.p-0').html(data)
            });
        }

        $('section.featured-card #drop_down').click(function () {
            $(this).toggleClass('active');
            $('section.featured-card li.nav-item').removeClass('active');
        });

        $('section.featured-card .row>div').each(function () {
            $(this).find('img.wishlist').click(function () {
                $('.wishlist_modal_btn').click();
                const content = $(this).closest('.content');
                const name = content.find('.content-container p.name').text();
                const price = content.find('.content-container p.price').text();
                const image = content.find('.product-image img.cards').attr('src');
                $('.product_added_to_wislist img').attr('src', image);
                $('.product_added_to_wislist p.product_name').text(name);
                $('.product_added_to_wislist p.price').text(price);
            });
        });

    <?php //elseif (function_exists('is_product') && is_product()): ?>
        // $('section.reviews section.related-product').remove();
        // var reviews = $('.reviews-content').html()
        // $('div#addreviewspopup .modal-body').html(reviews)
    <?php elseif (is_checkout()): ?>
        $('.product-list').append($('form.checkout_coupon.woocommerce-form-coupon').html())
        $('.order_summary button.button').click(function(){
            $('form.checkout_coupon.woocommerce-form-coupon input#coupon_code').val($('.order_summary input#coupon_code').val())
            setTimeout(() => {
                $('form.checkout_coupon.woocommerce-form-coupon button').click()
            }, 1500);
            
        })
    <?php elseif (is_cart()): ?>
         $('.cart_totals').each(function(){ 
            $(this).find('button.button[name="apply_coupon"]').click(function(){
                var coupon_value = $('.cart_totals #coupon_code ').val()
                console.log(coupon_value)
                $('form.woocommerce-cart-form input#coupon_code').val(coupon_value)
                $('form.woocommerce-cart-form button.button').prop('disabled', false);
                setTimeout(() => {
                    $('form.woocommerce-cart-form button.button').click()
                }, 2000);
    
            })
        })
    <?php elseif (is_page('feature-card')): ?>

        // side bar filter active function
        $('.categories ul').each(function(){
            $(this).find('h5').click(function(){
                $('.categories ul').toggleClass('active')
                $('.categories ul').removeClass('active')
            })
        })

      
        $('div#accordionExample .accordion-item div#categores').each(function(){
            $(this).find('input[type="checkbox"]').click(function(){
                $(this).closest('ul').find('input[type="checkbox"]').not(this).prop('checked', false);
            });
        });

    <?php elseif (is_archive()): ?>
        $(document).ready(function() {
            $('div#categories ul li a').click(function(event) {
                console.log('assda')
                event.preventDefault(); // Prevent the default action of the anchor tag
                var url = $(this).attr('url-value'); // Get the URL from the clicked link
                console.log(url); // Log the URL to the console
                var currentUrl = window.location.href;
                // Check if the URL contains pagination
                if (currentUrl.includes('/page/') || currentUrl.includes('/product-category/')) {
                    console.log('Pagination URL:', url);
                    window.location.href = url;
                    return; 
                }

                // Perform AJAX request for non-pagination URLs
                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function(xhr) {
                        $("#overlay").show(); // Show loading overlay before sending the request
                    },
                    complete: function() {
                        $("#overlay").hide(); // Hide loading overlay when the request is complete
                    },
                    success: function(data) {
                        // Extract the HTML content of the .product_list div from the response
                        var productListHtml = $(data).find('.product_list').html();
                        $('body').html(data);
                        $('body').html(data);
                        // Now you can use the productListHtml variable as needed
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('ul li a').click(function() {
                
                // Remove the 'checked' attribute from all checkboxes
                $('input[type="checkbox"]').prop('checked', false);
                
                // Add the 'checked' attribute to the corresponding checkbox
                $(this).closest('li').find('input[type="checkbox"]').prop('checked', true);
            });
            
             // Get the text content of the paragraph element
            var next = $('<img>', {
                src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/featured_card/next.png', // Replace with the actual image URL
                alt: 'Next Image' // Add an alt attribute for accessibility
            });
            $('a.next.page-numbers').html(next);
            var prev = $('<img>', {
                src: '<?php echo get_stylesheet_directory_uri();?>/assets/img/featured_card/prev.png', // Replace with the actual image URL
                alt: 'Next Image' // Add an alt attribute for accessibility
            });
            $('a.prev.page-numbers').html(prev);
        

        });

    <?php endif; ?>


    function setEqualHeightForSection(sectionSelector, secondSelector) {
        var elementsToResize = $(sectionSelector).find(secondSelector);
        var tallestHeight = 0;
        elementsToResize.each(function () {
            var height = $(this).height();
            if (height > tallestHeight) {
                tallestHeight = height;
            }
        });
        elementsToResize.css('height', tallestHeight);
    }

    $('li#menu-item-9').removeClass('active')
     // first section margin top
    var navHeight = $(".narbar.fixed-top").height()
    $('section:first').css('margin-top', navHeight);
});
</script>

