const bannerSection = $('section.banner');
const bannerImgPaths = ["banner1.jpg", "banner2.jpg","banner3.jpg", "banner4.jpg", "banner5.jpg","banner6.jpg","banner.jpg"];
const cardPath = ["banner-uprising.png", "banner-pokemon.png","banner-yugioh.png", "banner-magic.png","banner-digimon.png", "banner-onepiece.png","banner-uprising.png"];
const diamondImg = ["diamond2.png","diamond3.png","diamond4.png","diamond1.png","diamond2.png","diamond3.png","diamond4.png"]
let currentImageIndex = 0;
let rotationDegree = 0;
function changeBackgroundImage() {
    bannerSection.fadeTo(1000, 1, function() { 
        rotationDegree -= 90;
        $('section.banner .image-container').toggleClass('rotate');
        $('section.banner .image-container img').attr('src', 'assets/img/homepage/' + cardPath[currentImageIndex]);
        $('.diamond img').attr('src', 'assets/img/homepage/' + diamondImg[currentImageIndex]);
        $('.diamond img').css('transform', `rotate(${rotationDegree}deg)`);
        bannerSection.css('background-image', 'url("assets/img/homepage/' + bannerImgPaths[currentImageIndex] + '")');
        currentImageIndex = (currentImageIndex + 1) % bannerImgPaths.length;
        bannerSection.fadeTo(1000, 1); 
    });
}
setInterval(changeBackgroundImage, 5000); 