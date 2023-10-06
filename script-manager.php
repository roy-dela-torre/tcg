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
            bannerSection.fadeTo(1000, 1, function() { 
                rotationDegree -= 90;
                $('section.banner .image-container').toggleClass('rotate');
                $('section.banner .image-container img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + cardPath[currentImageIndex]);
                $('section.we-want-the-best .diamond img').attr('src', '<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + diamondImg[currentImageIndex]);
                $('section.we-want-the-best .diamond img').css('transform', `rotate(${rotationDegree}deg)`);
                bannerSection.css('background-image', 'url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/' + bannerImgPaths[currentImageIndex] + '")');
                currentImageIndex = (currentImageIndex + 1) % bannerImgPaths.length;
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
            // Get the computed style for the image
            var computedStyle = window.getComputedStyle(this);
            
            // Check if the image has the desired CSS transformation
            if (computedStyle.transform === 'matrix(1, 0, 0, 1, 0, -350)') {
                // If it has the transformation, add the 'active' class
                $(this).addClass('active');
            } else {
                // If it doesn't have the transformation, remove the 'active' class
                $(this).removeClass('active');
            }
            });
        }
        setInterval(rotateImagesCounterClockwise, 5000);
        setInterval(function(){

        },100)
    <?php endif; ?>
});
</script>