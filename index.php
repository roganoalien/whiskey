<?php get_template_part('include/header') ?>

<header class="videos-container video-swiper-container">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/text-logo-full.svg" alt="The Whiskey Gospel" class="logo">
	<div class="bg-texture"></div>
	<span class="mouse-icon-holder">
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>mouse</title><g><g id="48x48/ELECTRONICS/mouse" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="mouse"><g id="Bounding_Boxes"><path id="Shape" d="M0 0h48v48H0z"></path></g><rect id="c2/mouse" fill="#D0D0D0" x="22" y="12" width="4" height="12" rx="2"></rect><path d="M22 4h4c6.627 0 12 5.373 12 12v16c0 6.627-5.373 12-12 12h-4c-6.627 0-12-5.373-12-12V16c0-6.627 5.373-12 12-12zm0 4a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h4a8 8 0 0 0 8-8V16a8 8 0 0 0-8-8h-4z" id="c1/mouse" fill="#D0D0D0"></path></g></g></g></svg>
		<span class="line"></span>
	</span>
	<div class="swiper-wrapper">
		<?php
			$args_videos = array('post_type' => 'videos');
			$loop = new WP_Query($args_videos);
		?>
		<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<div class="swiper-slide">
				<h2 class="title-bold"><?php echo get_field('title_bold'); ?></h2>
				<h2 class="title-light"><?php echo get_field('title_light'); ?></h2>
				<button class="btn btn-video trigger-youtube">ver video</button>
				<div id="video-bg" data-video="<?php echo get_field('video'); ?>" data-img="<?php echo get_field('image'); ?>"></div>
			</div>
		<?php endwhile; ?>
	</div>
</header>

<script>
	var myVideo = document.getElementById('video-bg').getAttribute('data-video');
	var myImage = document.getElementById('video-bg').getAttribute('data-img');
	var mySwiper = new Swiper('.video-swiper-container', {
		allowTouchMove: false,
		effect: 'fade',
		simulateTouch: false,
		slidesPerView: 1,
	});
	// var videobg1 = new vidbg('#video-bg', {
	// 	mp4: myVideo,
	// 	poster: myImage,
	// 	overlay: false
	// });
</script>

<?php get_template_part('include/footer') ?>