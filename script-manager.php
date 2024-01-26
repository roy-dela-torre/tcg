<?php $bootsrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/'; ?>
<?php $carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<script src="<?php echo $bootsrapPath; ?>bootstrap.bundle.min.js"> </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<script>
$(document).ready(function () {
    
    <?php if(is_front_page()):?>
        setTimeout(() => {
            $('li#menu-item-9').addClass('active') 
        }, 1000);

        const bannerSection = $('section.banner');
        const bannerImgPaths = ["banner2.jpg", "banner3.jpg", "banner4.jpg", "banner5.jpg", "banner6.jpg", "banner1.jpg"];
        const cardPath = ["banner_right_image2.png", "banner_right_image3.png", "banner_right_image4.png", "banner_right_image5.png", "banner_right_image6.png", "banner_right_image1.png"];
        const diamondImg = ["diamond2.png", "diamond3.png", "diamond4.png", "diamond1.png", "diamond2.png", "diamond3.png", "diamond4.png"];
        const bannerHeader = [
        '<h2 class="text-uppercase text-white">Catch \'Em All</h2>',
        '<h2 class="text-uppercase text-white">Master the Duel</h2>',
        '<h2 class="text-uppercase text-white">Command the Elements</h2>',
        '<h2 class="text-uppercase text-white">Digital Adventures Await</h2>',
        '<h2 class="text-uppercase text-white">Set Sail for One Piece Treasures</h2>',
        '<h2 class="text-uppercase text-white">Rathe Awaits</h2>',
        ];
        const bannerP = ['Embark on a Pokemon adventure like no other with our vast assortment of Pokemon cards. Whether you\'re a dedicated trainer or a collector, find the perfect cards to expand your collection and reignite your love for the game.',
        'Enter the world of epic duels and strategy with our extensive selection of Yu-Gi-Oh cards. Whether you\'re a seasoned duelist or just starting your journey, discover the cards that will make your deck unbeatable and your victories legendary.',
        
        
        
        'Immerse yourself in the enchanting world of Magic the Gathering with our diverse collection of cards. Whether you\'re a planeswalker or a collector, find the cards that will empower your decks and elevate your gameplay to new heights.',
        'Embark on a journey through the digital realm with our captivating assortment of Digimon cards. Whether you\'re a DigiDestined or a collector, explore and acquire the cards that will enhance your collection and lead you to digital victory.',
        'Join the grand adventure of the Straw Hat Pirates with our One Piece trading cards. Whether you\'re a devoted fan or a collector, find the cards that will bring the world of One Piece to your fingertips, and uncover the power hidden within.',
        'Step into the mystical realm of Rathe with our extraordinary selection of Flesh and Blood cards. Your journey begins here; find, trade, and acquire the cards that will make your collection legendary.']

        let currentImageIndex = 0;
        let rotationDegree = 0;

        function changeBackgroundImage() {
        bannerSection.fadeTo(1000, 1, function () {
            rotationDegree -= 90;
            $('section.banner .image-container').toggleClass('rotate');
            $('section.banner .image-container img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + cardPath[currentImageIndex]);
            $('section.we-want-the-best .diamond img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + diamondImg[currentImageIndex]);
            $('section.banner #header').html(bannerHeader[currentImageIndex])
            $('section.banner p').text(bannerP[currentImageIndex])
            $('section.we-want-the-best .diamond img').css('transform', `rotate(${rotationDegree}deg)`);
            bannerSection.css('background-image', 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + bannerImgPaths[currentImageIndex] + '")');
            currentImageIndex = (currentImageIndex + 1) % bannerImgPaths.length;
            if (currentImageIndex === 6) {
            rotationDegree = 0; // Reset the rotation degree when reaching the last image
            }
            bannerSection.fadeTo(1000, 1);
            
            // Schedule the next image change after 5 seconds (5000 milliseconds)
            setTimeout(changeBackgroundImage, 5000);
        });
        }

        // Start the initial image change
        setTimeout(changeBackgroundImage, 5000);

        function rotateImagesCounterClockwise() {
            $('section.we-want-the-best .carousel-item').removeClass('active');
            var topImageTransform = $('section.we-want-the-best .top').css('transform');
            var leftImageTransform = $('section.we-want-the-best .left').css('transform');
            var bottomImageTransform = $('section.we-want-the-best .bottom').css('transform');
            var rightImageTransform = $('section.we-want-the-best .right').css('transform');
            $('section.we-want-the-best .left').css('transform', bottomImageTransform).addClass('active');
            $('section.we-want-the-best .bottom').css('transform', rightImageTransform);
            $('section.we-want-the-best .right').css('transform', topImageTransform);
            $('section.we-want-the-best .top').css('transform',leftImageTransform);
            $('section.we-want-the-best .carousel img').each(function() {
            var computedStyle = window.getComputedStyle(this);
            var windowWidth = window.innerWidth;
            if (windowWidth > 1400) {
                if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -350)') {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            }
            else if (windowWidth < 1200) {
                if (windowWidth < 575) {
                    if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -160)') {
                        $(this).addClass('active');
                    } 
                    else {
                        $(this).removeClass('active');
                    }
                    console.log('mobile')
                }
                else if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -170)') {
                    $(this).addClass('active');
                } 
                else {
                    $(this).removeClass('active');
                }
                
            }
            else {
                if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -220)') {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            }
            });
        }
        setInterval(rotateImagesCounterClockwise, 5000);
        setInterval(function(){

        },100)

        // same height p.name
        setEqualHeightForSection('section.featured-card', 'p.name');
        setEqualHeightForSection('section.featured-card', 'p.price');

        // check screen width
        var slice = 0;
        function checkWindowWidth() {
            var windowWidth = $(window).width();
            if(windowWidth <= 767){
                slice = 1
            } 
            else if (windowWidth <= 991) {
                slice = 2
            }
            else if(windowWidth <= 1200){
                slice = 3
            }
            else{
                slice = 4
            }
        }
        $(window).resize(function() {
            checkWindowWidth();
        });
        // load more product
        $("section.featured-card button#view-more").click(function() {
            checkWindowWidth();
            var hiddenElements = $(".col-xl-3.col-lg-4.col-sm-6.col-12:hidden");
            if (hiddenElements.length > 0) {
                hiddenElements.slice(0, slice).slideDown();
            }
            if ($(".col-xl-3.col-lg-4.col-sm-6.col-12:hidden").length === 0) {
                $("section.featured-card button#view-more").hide();
            }
        });

        $('img.wishlist,img#wishlist').on('click', function() {
            var contentId = $(this).closest('.content').attr('id');
            var buttonSelector = 'section.featured-card .content#' + contentId + ' a.add_to_wishlist.single_add_to_wishlist.button.alt';
            $(buttonSelector).click(); 
        });
        $('section.featured-card button.navbar-toggler').click(function() {
            var currentImage = $('section.featured-card span.navbar-toggler-icon').css('background-image');
            var image1 = 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/filter.png")';
            var image2 = 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/close-btn.png")';
            if (currentImage === image1) {
                $('section.featured-card span.navbar-toggler-icon').css('background-image', image2);
            } else {
                $('section.featured-card span.navbar-toggler-icon').css('background-image', image1);
            }
        });
        $('input.wpcf7-form-control.wpcf7-submit.has-spinner').click(function(){
            setTimeout(() => {
                console.log('asdsad');
                var content = $('section.have-question .content');
                var isInvalid = $('div#wpcf7-f15-o1 form').hasClass('invalid');

                var backgroundImageUrl = isInvalid ? 'url(' + '<?php echo get_stylesheet_directory_uri(); ?>' + '/assets/img/homepage/have-quiestion-bg.png) no-repeat center center/100% 900px'
                                                    : 'url(' + '<?php echo get_stylesheet_directory_uri(); ?>' + '/assets/img/homepage/have-quiestion-bg.png) no-repeat center center/100% 771px';

                content.css('background', backgroundImageUrl);
                content.css('min-height', isInvalid ? '900px' : '771px');
            }, 2000);
        })
        $('section.featured-card li a').click(function() {
            var clickedText = $(this).text();
            $('a.navbar-brand.d-block.d-xxl-none, section.featured-card h2').text(clickedText);
        });

        $('nav.navbar ul.navbar-nav li.nav-item a').click(function() {
            $('nav.navbar ul.navbar-nav li.nav-item').removeClass('active');
            $(this).parent().addClass('active');
            $('section.featured-card #drop_down').removeClass('active')
        });

        $('ul.navbar-nav li').each(function() {
            $(this).find('a').attr('data-value',$(this).find('a').text())
        });
        $('ul.navbar-nav a').click(function() {
            cardsFilter();
        });
        function cardsFilter(){
            var selectedFilters = [];
            $('ul.navbar-nav a').each(function() {
                selectedFilters.push($(this).data("value"));
            });
            var filterbtn = selectedFilters.join(',');
            $.ajax({
                url: '<?php echo get_home_url(); ?>/cards-search/?cardsearch=' + filterbtn,
                type: 'GET',
                beforeSend: function(xhr) {
                    $("#overlay").show();
                },
                complete: function() {
                    $("#overlay").hide();
                },
                success: function(data) {
                    $('.group-box.p-0').html(data);
                    console.log(data);
                }
            });

            return false;
        }
        $('section.featured-card #drop_down').click(function(){
            $(this).toggleClass('active')
            $('section.featured-card li.nav-item').removeClass('active')
        })
        $('section.featured-card .row>div').each(function(){
            $(this).find('img.wishlist').click(function(){
                $('.wishlist_modal_btn').click();
                var contentContainer = $(this).closest('.content');
                var product_name = contentContainer.find('.content-container p.name').text();
                var product_price = contentContainer.find('.content-container p.price').text();
                var product_image = contentContainer.find('.product-image img.cards').attr('src');
                $('.product_added_to_wislist img').attr('src', product_image);
                $('.product_added_to_wislist p.product_name').text(product_name);
                $('.product_added_to_wislist p.price').text(product_price);
            });
        });

    <?php elseif (function_exists('is_product') && is_product()): ?>
        $('section.reviews section.related-product').remove();
        var reviews = $('.reviews-content').html()
        $('div#addreviewspopup .modal-body').html(reviews)
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