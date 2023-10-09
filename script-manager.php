<?php $bootsrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/'; ?>
<?php $carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<script src="<?php echo $bootsrapPath; ?>bootstrap.bundle.min.js"> </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<script>
$(document).ready(function () {
    
    <?php if(is_front_page()):?>
        const bannerSection = $('section.banner');
        const bannerImgPaths = ["banner1.jpg", "banner2.jpg","banner3.jpg", "banner4.jpg", "banner5.jpg","banner6.jpg"];
        const cardPath = ["banner-pokemon.png","banner-yugioh.png", "banner-magic.png","banner-digimon.png", "banner-onepiece.png","banner-uprising.png"];
        const diamondImg = ["diamond2.png","diamond3.png","diamond4.png","diamond1.png","diamond2.png","diamond3.png","diamond4.png"]
        let currentImageIndex = 0;
        let rotationDegree = 0;
        function changeBackgroundImage() {
            bannerSection.fadeTo(1000, 1, function () {
                rotationDegree -= 90;
                $('section.banner .image-container').toggleClass('rotate');
                $('section.banner .image-container img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + cardPath[currentImageIndex]);
                $('section.we-want-the-best .diamond img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + diamondImg[currentImageIndex]);
                $('section.we-want-the-best .diamond img').css('transform', `rotate(${rotationDegree}deg)`);
                bannerSection.css('background-image', 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + bannerImgPaths[currentImageIndex] + '")');
                currentImageIndex = (currentImageIndex + 1) % bannerImgPaths.length;
                if (currentImageIndex === 0) {
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
            if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -350)') {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
            });
        }
        setInterval(rotateImagesCounterClockwise, 5000);
        setInterval(function(){

        },100)

        // same height p.name
        setEqualHeightForSection('section.featured-card', 'p.name');

        // check screen width
        var slice = 0;
        function checkWindowWidth() {
            var windowWidth = $(window).width();
            if(windowWidth <= 767){
                slice = 1
                console.log(slice)
            } 
            else if (windowWidth <= 991) {
                slice = 2
                console.log(slice)
            }
            else if(windowWidth <= 1200){
                slice = 3
                console.log(slice)
            }
            else{
                slice = 4
                console.log(slice)
            }
        }
        $(window).resize(function() {
            checkWindowWidth();
        });
        // load more product
        $("section.featured-card button#view-more").click(function() {
            checkWindowWidth();
            var hiddenElements = $(".col-xl-3.col-lg-4.col-md-6.col-sm-12:hidden");
            if (hiddenElements.length > 0) {
                hiddenElements.slice(0, slice).slideDown();
            }
            if ($(".col-xl-3.col-lg-4.col-md-6.col-sm-12:hidden").length === 0) {
                $("section.featured-card button#view-more").hide();
            }
        });
        // first section margin top
        var navHeight = $(".narbar.fixed-top").height()
	    $('section:first').css('margin-top', navHeight);

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