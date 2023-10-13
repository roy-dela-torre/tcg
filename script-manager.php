<?php $bootsrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/'; ?>
<?php $carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<script src="<?php echo $bootsrapPath; ?>bootstrap.bundle.min.js"> </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<script>
$(document).ready(function () {
    
    <?php if(is_front_page()):?>
        const bannerSection = $('section.banner');
        const bannerImgPaths = ["banner4digimon.jpg","banner5onepiece.jpg","banner6uprising.jpg","banner1pokemon.jpg","banner2yugioh.jpg",  "banner3magic.jpg"];
        const cardPath = ["banner-digimon.png","banner-onepiece.png","banner-uprising.png","banner-pokemon.png","banner-yugioh.png", "banner-magic.png"];
        const diamondImg = ["diamond2.png","diamond3.png","diamond4.png","diamond1.png","diamond2.png","diamond3.png","diamond4.png"]
        const bannerHeader = [`
        <h2 class="text-uppercase text-white">Porem ipsasdasum dolor sit amet consectetur Siti lora</h2>`,
        `<h2 class="text-uppercase text-white">Porem ipsum doasdlor sit amet consectetur Siti lora</h2>`,
        `<h2 class="text-uppercase text-white">Porem ipsum dolor sasdasdit amet consectetur Siti lora</h2>`,
        `<h2 class="text-uppercase text-white">Porem ipsum dolor sit amasdet consectetur Siti lora</h2>`,
        `<h2 class="text-uppercase text-white">Porem ipsum doloasdr sit asdamet consectetur Siti lora</h2>`,
        `<h2 class="text-uppercase text-white">Porem ipsum dolor sit amet consectetur Siti lora</h2>`]
        let currentImageIndex = 0;
        let rotationDegree = 0;
        function changeBackgroundImage() {
            bannerSection.fadeTo(1000, 1, function () {
                rotationDegree -= 90;   
                $('section.banner .image-container').toggleClass('rotate');
                $('section.banner .image-container img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + cardPath[currentImageIndex]);
                $('section.we-want-the-best .diamond img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + diamondImg[currentImageIndex]);
                $('section.banner #header').html(bannerHeader[currentImageIndex])
                $('section.we-want-the-best .diamond img').css('transform', `rotate(${rotationDegree}deg)`);
                bannerSection.css('background-image', 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + bannerImgPaths[currentImageIndex] + '")');
                currentImageIndex = (currentImageIndex + 1) % bannerImgPaths.length;
                if (currentImageIndex === 6) {
                    rotationDegree = 0; // Reset the rotation degree when reaching the last image
                }
                bannerSection.fadeTo(1000, 1);
            });
        }

        
        setInterval(changeBackgroundImage, 5000); 
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
            var hiddenElements = $(".col-xl-3.col-lg-4.col-md-6.col-6:hidden");
            if (hiddenElements.length > 0) {
                hiddenElements.slice(0, slice).slideDown();
            }
            if ($(".col-xl-3.col-lg-4.col-md-6.col-6:hidden").length === 0) {
                $("section.featured-card button#view-more").hide();
            }
        });

        // first section margin top
        var navHeight = $(".narbar.fixed-top").height()
	    $('section:first').css('margin-top', navHeight);

        $('img.wishlist,img#wishlist').on('click', function() {
            var contentId = $(this).closest('.content').attr('id');
            var buttonSelector = 'section.featured-card .content#' + contentId + ' a.add_to_wishlist.single_add_to_wishlist.button.alt';
            $(buttonSelector).click(); 
        });
        $('section.featured-card button.navbar-toggler').click(function() {
            // Get the current background image URL
            var currentImage = $('section.featured-card span.navbar-toggler-icon').css('background-image');
            
            // Define the URLs for the two background images
            var image1 = 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/filter.png")';
            var image2 = 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/close-btn.png")';

            // Toggle between the two images
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
});
</script>