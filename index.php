<?php get_header();
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
$homeUrl = get_home_url();
?>
<section class="banner">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="content">
                        <h1 class="text-uppercase text-white">Porem ipsum dolor sit amet consectetur Siti lora</h1>
                        <p class="text-white">Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">shop now</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="image-container">
                        <img src="<?php echo $imgPath; ?>banner-uprising.png" alt="" class="animate__fadeIn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured-card">
    <nav class="navbar navbar-expand-xxl bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-xxl-none" href="#">Acrtive button</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-uppercase text-center active" href="#">featured cards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">flesh and blood</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">PokÉmon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">Yu-gi-oh!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">magic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">digimon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">one piece</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-center" href="#">cardfight!! vanguard</a>
                </li>
                <div class="dropdown d-flex justify-content-center">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More
                    </button>
                    <ul class="dropdown-menu row">
                        <div class="col">
                        <li><a class="dropdown-item  text-uppercase" href="#">BAKUGAN TCG</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">WORLD OF WARCRAFT TCG</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">DISNEY LORCANA</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">DRagon ball super ccg</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">DRagon ball Z tcg</a></li>
                        </div>
                        <div class="col">
                        <li><a class="dropdown-item  text-uppercase" href="#">dice master</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">dragoborne</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">meta x TCG</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">bakugan tcg</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">duel master</a></li>
                        </div>
                        <div class="col">
                        <li><a class="dropdown-item  text-uppercase" href="#">final fantasy</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">zombie world order</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">metazoo</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">star wars: destiny</a></li>
                        <li><a class="dropdown-item  text-uppercase" href="#">future card buddyfight</a></li>
                        </div>
                    </ul>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center text-uppercase">featured cards</h2>
                </div>
                <div class="group-box p-0">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Codex of frailty - Out siders flesh and blood.png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Teklo foundry heart - Arcane rising flesh and blood.png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Pikachu VMAX (Secret) - SWSH04 Vivid Voltage (SWSH04).png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>blue-eyes white dragon -Duelist Saga (DUSA) YU-GI-oh.png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Summoned Skull - Legendary Collection 3 Yugi's World (LC03).png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Charizard V (Full Art) - SWSH09 Brilliant Stars (SWSH09).png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>Yuriko, the Tiger's Shadow - Commander 2018 (C18).png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>The One Ring - Universes Beyond.png" alt="" class="cards">
                                <img src="<?php echo $imgPath; ?>wishlist-blue.png" alt="" class="wishlist">
                                <p class="name"></p>
                                <p class="price"></p>
                                <div class="group-button">
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">View</a>
                                    <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-white">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn learn-more">Learn more</a>
            </div>
        </div>
    </div>
</section>

<section class="we-want-the-best overflow-hidden p-0">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7 ps-0">
                <div class="content">
                    <div class="content-container">
                        <h2 class="text-uppercase text-white">we want the best for you</h2>
                        <ul class="ps-0">
                            <li class="text-white"><img src="<?php echo $imgPath; ?>card.png" alt=""><p><b>Korem ipsum</b>: Dolor sit amet consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p></li>
                            <li class="text-white"><img src="<?php echo $imgPath; ?>like.png" alt=""><p><b>Korem ipsum</b>: Dolor sit amet consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p></li>
                            <li class="text-white"><img src="<?php echo $imgPath; ?>award.png" alt=""><p><b>Korem ipsum</b>: Dolor sit amet consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p></li>
                            <li class="text-white"><img src="<?php echo $imgPath; ?>person.png" alt=""><p><b>Korem ipsum</b>: Dolor sit amet consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="carousel">
                    <img src="<?php echo $imgPath; ?>fleshblood.png" class="carousel-diamon left active">
                    <img src="<?php echo $imgPath; ?>carletviolet.png" class="carousel-diamon right">
                    <img src="<?php echo $imgPath; ?>yo-hi-uh.png" class="carousel-diamon top">
                    <img src="<?php echo $imgPath; ?>magic.png" class="carousel-diamon bottom">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="image-container">
                    <img src="<?php echo $imgPath; ?>about.png" alt="">
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="content">
                    <div class="content-container">
                        <h2 class="text-uppercase text-white">about tcg.ph</h2>
                        <p class="text-white">Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="blue-btn text-uppercase">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="article">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center text-uppercase">articles</h2>
                </div>
                <div class="articles">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>article1.jpg" alt="" class="feature-img">
                                <p class="date">Sept 20,2023</p>
                                <h3>Corem ipsum dolor sit amet conserat adipiscing elit</h3>
                                <p class="description">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis...</p>
                                <a href="http://" target="_blank" rel="noopener noreferrer" class="read-more">read more <img src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="content">
                                <img src="<?php echo $imgPath; ?>article2.jpg" alt="" class="feature-img">
                                <p class="date">Sept 20,2023</p>
                                <h3>Corem ipsum dolor sit amet conserat adipiscing elit</h3>
                                <p class="description">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis...</p>
                                <a href="http://" target="_blank" rel="noopener noreferrer" class="read-more">read more <img src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="d-flex flex-column">
                                <div class="content d-flex">
                                    <div class="image-container">
                                        <img src="<?php echo $imgPath; ?>article3.jpg" alt="" class="feature-img">
                                    </div>
                                    <div class="content">
                                        <p class="date"></p>
                                        <h3>Corem ipsum dolor sitamet conserat adipiscing Dolor elit</h3>
                                        <p class="description">Morem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit... </p>
                                        <a href="http://" target="_blank" rel="noopener noreferrer" class="read-more">read more <img src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="content d-flex">
                                    <div class="image-container">
                                        <img src="<?php echo $imgPath; ?>article4.jpg" alt="" class="feature-img">
                                    </div>
                                    <div class="content">
                                        <p class="date"></p>
                                        <h3>Corem ipsum dolor sitamet conserat adipiscing Dolor elit</h3>
                                        <p class="description">Morem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit... </p>
                                        <a href="http://" target="_blank" rel="noopener noreferrer" class="read-more">read more <img src="<?php echo $imgPath; ?>read-more-left-arrow.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="have-question">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="content">
                        <div class="content-container">
                            <h2 class="text-uppercase text-white">Have A Question?</h2>
                            <p class="text-white">Korem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. </p>
                            <form action="">
                                <input type="text" name="" id="" placeholder="Full Name">
                                <input type="email" name="" id="" placeholder="email address">
                                <input type="tel" name="" id="" placeholder="contact number">
                                <textarea name="" id="" cols="10" rows="4" placeholder="Your Message..."></textarea>
                                <input type="submit" value="submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12">
                    <div class="contact-details">
                        <h4 class="text-white text-uppercase">contact details:</h4>
                        <a href="tel:63+ 092123456789"><img src="<?php echo $imgPath; ?>telephone.png" alt=""> 63+ 092123456789</a>
                        <a href="mailto:loremipsum@gmail.com"><img src="<?php echo $imgPath; ?>email.png" alt="">loremipsum@gmail.com</a>
                        <a href="#" target="_blank" rel="noopener noreferrer"><img src="<?php echo $imgPath; ?>fb.png" alt="">lorem ipsum</a>
                        <a href="http://" target="_blank" rel="noopener noreferrer"><img src="<?php echo $imgPath; ?>instagram.png" alt="">lorem ipsum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>