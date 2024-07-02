<?php
// Template Name: Homepage

get_header(); ?>
<style>
	@media (max-width: 1024px) {
		.second-banner-footer {
			margin-bottom: -180px !important;
		}
	}

	@media (max-width: 425px) {
		.second-banner-content {
			background: url(https://phmc.com.ph/wp-content/uploads/2020/05/2nd-banner-mobile-2.jpg);
			background-size: cover;
			background-position: bottom;
			background-repeat: no-repeat;
		}
	}

	._screening h2 {
		font-family: var(--font-Ibm);
		font-weight: 600;
		color: #000;
		margin-bottom: 10px;
		font-size: 25px;
	}

	._screening-btn {
		background: #1562a4;
		padding: 15px 15px;
		color: #fff;
		top: 15px;
		position: relative;
		display: flex;
	}

	._screening-btn:hover {
		color: #fff;
	}

	._screening figure {
		margin: 0px;
		margin-top: 5px;
		margin-left: 10px;
	}

	/* 12-17 adhoc */
	._latest-news .second {
		text-align: right;
		display: block;
		margin: 0 0 50px;
	}

	._latest-news .second img {
		width: 100%;
		max-width: 500px;
	}

	@media (min-width: 320px) {
		._screening-btn {
			float: left;
			top: 15px;
		}
	}

	@media (min-width: 768px) {
		._screening-btn {
			float: right;
			top: 35px;
		}
	}

	@media (min-width: 992px) {
		._screening-btn {
			float: right;
			top: 15px;
		}
	}

	.n2-ss-layer.n2-ow.rt-pcrbanner-fb img {
		width: 100%;
		max-width: 35px;
	}

	.rt-pcrbanner p,
	.rt-pcrbanner a,
	.rt-pcrbanner-fb p {
		font-family: 'Bebas Neue', cursive !important;
		font-weight: normal !important;
	}

	.rt-pcrbanner p b {
		font-family: 'Bebas Neue', cursive;
	}

	.rt-pcrbanner a {
		color: #fff !important;
		font-style: italic !important;
	}

	p.n2-font-bb053e732eae3fffa00358c9dd6c2d60-paragraph.n2-ow {
		margin: 0px 0px !important;
	}

	p.n2-font-bb053e732eae3fffa00358c9dd6c2d60-paragraph.n2-ow {
		margin: -30px 0px -70px !important;
	}

	.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
		position: absolute;
		bottom: 20px;
		width: 500px;
	}

	@media only screen and (max-width: 1240px) {
		p.n2-font-bb053e732eae3fffa00358c9dd6c2d60-paragraph.n2-ow {
			margin: -30px 0px !important;
		}

	}

	@media only screen and (max-width: 1050px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: 0px 0px 30px !important;
		}
	}

	@media only screen and (max-width: 1024px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: 0px 0px 250px !important;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			left: -15px;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin-right: 30px !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			margin-right: 30px !important;
		}
	}

	@media only screen and (max-width: 900px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: 0px 0px 265px 30px !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			margin-right: 30px !important;
		}

		._latest-news .second {
			margin: 0 0 50px;
		}

		._latest-news .second img {
			max-width: 100%;
		}
	}

	@media only screen and (max-width: 768px) {
		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			position: absolute !important;
			width: 500px !important;
			bottom: 0 !important;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin-right: 30px !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			margin-right: 30px !important;
		}
	}

	@media only screen and (max-width: 767px) {

		div#n2-ss-3 .n-uc-xLGKiZx5Fs8T-inner,
		div#n2-ss-3 .n-uc-jK7sDCZgc9qR-inner,
		div#n2-ss-3 .n-uc-Vq8VHqke1Qif-inner {
			justify-content: space-between;
			margin: 100px 0 0;
		}

		div#n2-ss-3 .n-uc-BeDIHtZtHUaB-inner {
			justify-content: space-between;
			margin: 30px 0 0;
		}
	}



	@media only screen and (max-width: 700px) {

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow,
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: 0 !important;
			position: relative !important;
			top: -710px !important;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			position: relative !important;
			bottom: -260px !important;
		}
	}

	@media only screen and (max-width: 620px) {
		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			bottom: -195px !important;
		}
	}

	@media only screen and (max-width: 585px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			font-size: 80px !important;
		}
	}

	@media only screen and (max-width: 485px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			font-size: 50px !important;
			width: 90%;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			width: 90%;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			position: relative;
			top: -420px;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			position: relative;
			top: -422px;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			position: relative;
			bottom: -200px;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			margin-left: -50px;
		}
	}

	@media only screen and (max-width: 426px) {
		/* .n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			bottom: -150px !important;
		} */

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			bottom: 25px !important;
		}

		div#n2-ss-2 .n2-font-60185f92580c94c7a656004085f1e4f6-paragraph {
			font-size: 50px;
		}

		div#n2-ss-2 .n-uc-72q1wMdCz9bV {
			margin-bottom: 0;
		}
	}

	@media only screen and (max-width: 420px) {
		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			width: 400px
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow,
		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			width: 80%;
		}
	}

	@media only screen and (max-width: 375px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			font-size: 50px !important;
			width: 85% !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			width: 85% !important;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			margin: 0px 20px -20px -50px !important;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: -830px 0px 20px 0px !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			margin: -857px 0px !important;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			width: 435px !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			top: -720px !important;
			margin: 0 !important;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			margin: 0 !important;
			top: -720px !important;
		}

		/* .n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			bottom: -100px !important;
		} */
		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			margin-left: -50px;
		}

	}

	@media only screen and (max-width: 350px) {
		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow {
			font-size: 45px !important;
			width: 80% !important;
		}

		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			width: 80% !important;
		}

		.n2-ss-layer-col.n2-ss-layer-content.n-uc-17dd09990616e-inner {
			margin-left: -50px !important;
		}

		p.n2-font-dca5d45b8dab5b7c1d89f794432e917a-paragraph.n2-ow {
			width: 68% !important;
		}

		p.n2-font-60185f92580c94c7a656004085f1e4f6-paragraph.n2-ow,
		p.n2-font-a78fb53c1d4e9cb39eaa806377437cdc-paragraph.n2-ow {
			right: 50px !important;
		}
	}

	section._service {
		padding: 100px 0;
	}

	section._service .row {
		justify-content: space-between;
		gap: 15px 0;
	}

	section._service .text-header {
		text-align: center;
		margin-bottom: 50px;
	}

	section._service .text-header h1 {
		font-family: var(--font-Ibm);
		font-size: 25px;
		font-weight: 900;
		color: #000;
		margin-bottom: 20px;
	}

	section._service .text-header p {
		color: #000;
		font-family: var(--font-Ibm);
		font-size: 20px;
		font-style: normal;
		font-weight: 700;
		line-height: 30px;
	}

	section._service .service__cards {
		flex: 0 0 19%;
		max-width: 19%;
		background-size: 100% !important;
	}

	section._service .service__cards:hover {
		background-size: 140% !important;
		transition: .8s;
	}

	section._service .card-content {
		height: 238px;
		display: flex;
		justify-content: flex-end;
		flex-wrap: wrap;
		flex-direction: column;
		padding: 20px 12px;
		cursor: pointer;
	}


	section._service .card-content h4 {
		font-size: 18px;
		color: #fff;
		font-weight: 600;
	}

	section._service .card-content p {
		margin: 0;
	}

	section._service .card-content p a {
		font-weight: 600;
		color: #fff;
		font-size: 13px;
	}


	@media only screen and (max-width: 1199px) {

		section._service,
		._promos.__new {
			padding: 70px 0px;
		}

		section._service .text-header {
			margin-bottom: 30px;
		}

		section._service .row {
			justify-content: left;
			gap: 15px 12px;
		}

		section._service .service__cards {
			flex: 0 0 24%;
			max-width: 24%;
		}

		._latest-news.__news .first {
			height: 450px !important;
		}
	}

	@media only screen and (max-width: 991px) {
		section._service .row {
			justify-content: left;
			gap: 14px;
		}

		section._service .service__cards {
			flex: 0 0 32%;
			max-width: 32%;
		}

		._promos.__new .row {
			gap: 30px;
			justify-content: center;
		}

		._latest-news.__news .row {
			gap: 40px;
		}

		._latest-news.__news .first {
			background-size: cover !important;
		}
	}

	@media only screen and (max-width: 767px) {

		section._service,
		._promos.__new,
		._latest-news.__news {
			padding: 50px 0px !important;
		}

		section._service .row {
			justify-content: center;
			gap: 15px;
		}

		section._service .service__cards {
			flex: 0 0 48%;
			max-width: 48%;
		}

		section._service .card-content {
			height: 280px;
		}

		._latest-news.__news .first {
			height: 270px !important;
		}
	}

	@media only screen and (max-width:575px) {
		section._service .card-content {
			height: 250px;
		}
	}

	@media only screen and (max-width:510px) {
		section._service .card-content {
			height: 230px;
		}
	}

	@media only screen and (max-width:470px) {
		section._service .service__cards:hover {
			background-size: 120% !important;
		}

		section._service .card-content {
			height: 320px;
		}

		section._service .service__cards {
			flex: 100%;
			max-width: 290px;
		}
	}

	._promos.__new {}

	._promos .promos-post {
		margin: 0px;
	}

	._promos.__new .__image img {
		width: 100%;
		margin-bottom: 20px;
	}

	._promos.__new .content h4 {
		font-family: var(--font-Ibm);
		color: #333;
		font-size: 20px;
		font-weight: 700;
		line-height: 24px;
		margin-bottom: 15px;
	}

	._promos.__new .content {
		font-family: var(--font-Ibm);
		color: #333;
		font-size: 16px;
		font-weight: 400;
		line-height: 24px;
		margin-bottom: 15px;
	}

	._promos.__new .content a {
		color: #33976A !important;
		padding: 10px 25px;
		border: solid 1px #33976A;
		display: flex;
		text-decoration: none !important;
		align-items: center;
		gap: 23px;
		max-width: 180px;
	}

	._promos.__new .content a:hover {
		color: #fff !important;
		background: #33976A !important;
	}

	._promos.__new .title {
		margin-bottom: 30px;
	}

	._latest-news.__news {
		padding: 0 0 100px;
		margin: 0 !important;
	}

	._latest-news.__news .first {
		padding: 50px 0px;
		height: 540px;
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		background-size: cover !important;
		background: url('https://phmc.com.ph/wp-content/themes/perpetual-help-medical-center/assets/img/Frame 36.jpg');
	}

	._latest-news.__news .first a {
		border: solid 1px #fff;
		color: #fff;
		font-weight: 700;
	}

	._latest-news.__news .first a:hover {
		color: #008550;
		background-color: white;
	}

	._latest-news.__news .first h4 {
		font-family: var(--font-Ibm);
		font-weight: 700;
		margin-bottom: 10px;
		color: #fff;
	}

	._latest-news.__news .first p {
		margin-bottom: 20px !important;
		max-width: 285px;
		text-align: center;
		margin: 0 auto;
		color: white;
	}

	._latest-news.__news .second img {
		width: 100%;
		max-width: 100%;
	}
</style>


<section class="_smart-slider">
	<?php echo do_shortcode('[smartslider3 slider=3]') ?>
</section>
<section class="_banner fadeInDown animated delay-1s d-none">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xs-12">
				<div class="banner-content" data-aos="fade-down">
					<h2>Focus on Your Health</h2>
					<p>Perpetual Help Medicine Center - Las Piñas is the destination for all of your medical needs.</p>
					<a href="https://phmc.com.ph/about-us/" class="theme-button bt-hov">Learn More <i
							class="fas fa-arrow-right"></i></a>
					<a href="https://phmc.com.ph/corporate-social-responsibility/" class="theme-button bt-hov">Give a
						Gift <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-xs-12"></div>
		</div>
	</div>
</section>
<section class="_service">
	<div class="container">
		<div class="text-header">
			<h1>Perpetual Help Medical Center Las Pinas</h1>
			<p>Services Offered</p>
		</div>
		<div class="row">
			<?php
			$ser_img = array(
				'post_type' => 'services_post',
				'posts_per_page' => 10, // Change the number of cards to 10
			);

			$loop = new WP_Query($ser_img);

			if ($loop->have_posts()):
				$co = 0;
				while ($loop->have_posts()):
					$loop->the_post();
					$co++;
					?>

					<div class="service__cards"
						style="background:url('<?php the_post_thumbnail_url('medium'); ?>')no-repeat center center;">
						<div class="card-content">
							<h4>
								<?php the_title(); ?>
							</h4>
							<p><a href="<?php the_permalink(); ?>">Read More</a></p>
						</div>
					</div>

					<?php
				endwhile;
				wp_reset_query();
			endif;
			?>

		</div>
	</div>
</section>

<section class="_dedication position-relative" data-aos="fade-down">
	<div class="gradient">
	</div>
	<div class="container text-center content">
		<h2>Dedicated to Life</h2>
		<p>We are equipped with the latest and most advanced technology for any procedure that you may need.</p>
	</div>
</section>
<section class="_promos __new" data-aos="fade-down">
	<div class="container">
		<div class="title text-center">
			<p class="text-uppercase">Latest</p>
			<h2>Promos and Packages</h2>
		</div>
		<div class="promos-post">
			<div class="row">
				<?php
				$promos_loop = array(
					'post_type' => 'promos_post',
					'posts_per_page' => 3,
				);

				$var = new WP_Query($promos_loop);

				if ($var->have_posts()):
					while ($var->have_posts()):
						$var->the_post();
						?>
						<div class="col-lg-4 col-md-12 col-12">
							<div class="content">
								<div class="__image">
									<img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
								</div>
								<h4>
									<?php the_title(); ?>
								</h4>
								<p>
									<?php echo substr(get_the_excerpt(), 0, 160); ?>...
								</p>
								<a href="<?php the_permalink(); ?>">
									Learn More <i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>

						<?php
					endwhile;
					wp_reset_query();
				endif;
				?>

			</div>
		</div>
	</div>
</section>

<section class="_latest-news __news">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-xl-6">
				<div class="first">
					<h4>Latest News</h4>
					<p>Read our blog for the most up-to-date information on the medical field.</p>
					<a href="https://phmc.com.ph/news/" class="__first">Read More</a>
				</div>
			</div>
			<!-- <div class="col-lg-12 col-xl-8">
				<div class="second">
					<?php
					$news = array(
						'paged' => $paged,
						'post_type' => 'news_post',
						'posts_per_page' => 2,
					);

					$news_loop = new WP_Query($news);

					if ($news_loop->have_posts()):
						while ($news_loop->have_posts()):
							$news_loop->the_post();
							?>
					<div class="card-news">
						<img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="">
						<div class="content">
							<h5><?php the_title(); ?></h5>
							<p><?php echo substr(get_the_excerpt(), 0, 150); ?></p>
							<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
						</div>
					</div>
					<?php
						endwhile;
						wp_reset_query();
					endif;
					?>
				</div>
			</div> -->
		</div>
	</div>
</section>


<script>
	async jQuery(document).ready(function () {
		jQuery(".navigation-bullet label .nav-item").click(function () {
			var a = jQuery(this).attr('data-item');
			var total = jQuery(".nav-item").length;


			// remove class first
			jQuery(".card-slider .phmc-card .content").removeClass("before");
			jQuery(".card-slider .phmc-card .content").removeClass("active");
			jQuery(".card-slider .phmc-card .content").removeClass("after");

			// add class active
			jQuery(".phmc-card").find('[data-image="' + a + '"]').addClass('active');


			jQuery(".phmc-card").find('[data-image="' + a + '"]').prev().addClass('before');
			jQuery(".phmc-card").find('[data-image="' + a + '"]').next().addClass('after');
			// jQuery(".phmc-card").find(".content .active").next().addClass("after");

			if (a == 1) {
			}
			if (a == total) {
			}

		});
		jQuery(".phmc-card .content").click(function () {
			var img = jQuery(this).attr('data-image');
			var total = jQuery(".nav-item").length;


			//remove class first
			jQuery(".card-slider .phmc-card .content").removeClass("before");
			jQuery(".card-slider .phmc-card .content").removeClass("active");
			jQuery(".card-slider .phmc-card .content").removeClass("after");

			// add class active
			jQuery(".navigation-bullet").find('[data-item="' + img + '"]').prop("checked", true);

			//var num = jQuery(".navigation-bullet").find('checked').attr('data-image');

			jQuery(".phmc-card").find('[data-image="' + img + '"]').addClass('active');


			jQuery(".phmc-card").find('[data-image="' + img + '"]').prev().addClass('before');
			jQuery(".phmc-card").find('[data-image="' + img + '"]').next().addClass('after');
			// jQuery(".phmc-card").find(".content .active").next().addClass("after");
			// jQuery(".navigation-bullet label .nav-item").change(function(){
			// 	var img2 = jQuery(this).attr('data-item');

			// 	// remove class first
			// 	// add class active
			// 	jQuery(".phmc-card").find('[data-image="'+ img2 +'"]').addClass('active');


			// 	jQuery(".phmc-card").find('[data-image="'+ img2 +'"]').prev().addClass('before');
			// 	jQuery(".phmc-card").find('[data-image="'+ img2 +'"]').next().addClass('after');
			// 	// jQuery(".phmc-card").find(".content .active").next().addClass("after");

			// });
		});
	});
	// buttons
	jQuery(document).ready(function () {
		var length = jQuery(".nav-item").length;
		console.log(length);

		jQuery(".buttons #left").click(function () {
			var prev = parseInt(jQuery(".phmc-card").find('.active').attr('data-image'));
			var min = prev - 1;
			console.log(min);

			if (min <= length - 1) {
				jQuery(".buttons #right").css({ 'opacity': '1', 'visibility': 'visible' });
			}
			jQuery(".card-slider .phmc-card .content").removeClass("before");
			jQuery(".card-slider .phmc-card .content").removeClass("active");
			jQuery(".card-slider .phmc-card .content").removeClass("after");
			// add class active
			jQuery(".phmc-card").find('[data-image="' + min + '"]').addClass('active');
			jQuery(".phmc-card").find('[data-image="' + min + '"]').prev().addClass('before');
			jQuery(".phmc-card").find('[data-image="' + min + '"]').next().addClass('after');

			if (prev == 2) {
				jQuery(".buttons #left").css({ 'opacity': '0', 'visibility': 'hidden' });
				console.log('start');
			}
		});
		jQuery(".buttons #right").click(function () {
			var next = parseInt(jQuery(".phmc-card").find('.active').attr('data-image'));
			var add = next + 1;
			if (add == 2) {
				jQuery(".buttons #left").css({ 'opacity': '1', 'visibility': 'visible' });
			}
			jQuery(".card-slider .phmc-card .content").removeClass("before");
			jQuery(".card-slider .phmc-card .content").removeClass("active");
			jQuery(".card-slider .phmc-card .content").removeClass("after");
			jQuery(".phmc-card").find('[data-image="' + add + '"]').addClass('active');
			jQuery(".phmc-card").find('[data-image="' + add + '"]').prev().addClass('before');
			jQuery(".phmc-card").find('[data-image="' + add + '"]').next().addClass('after');

			if (next == length - 1) {
				jQuery(".buttons #right").css({ 'opacity': '0', 'visibility': 'hidden' });
				console.log('end');
			}
		});
	});
</script>

<script>
	jQuery(window).on('load', function () {

		setTimeout(function () {
			jQuery('#myModal').modal('show');
		}, 3000);
	});
</script>
<?php get_footer(); ?>