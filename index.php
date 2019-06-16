<?php get_template_part('include/header') ?>

<header class="videos-container video-swiper-container">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/text-logo-full.svg" alt="The Whiskey Gospel" class="logo">
	<div class="bg-texture"></div>
	<span class="mouse-icon-holder">
		<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><title>mouse</title><g><g id="48x48/ELECTRONICS/mouse" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="mouse"><g id="Bounding_Boxes"><path id="Shape" d="M0 0h48v48H0z"></path></g><rect id="c2/mouse" fill="#D0D0D0" x="22" y="12" width="4" height="12" rx="2"></rect><path d="M22 4h4c6.627 0 12 5.373 12 12v16c0 6.627-5.373 12-12 12h-4c-6.627 0-12-5.373-12-12V16c0-6.627 5.373-12 12-12zm0 4a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h4a8 8 0 0 0 8-8V16a8 8 0 0 0-8-8h-4z" id="c1/mouse" fill="#D0D0D0"></path></g></g></g></svg>
		<span class="line"></span>
	</span>
	<div class="roga-slider">
		<?php
			$args_videos = array('post_type' => 'videos');
			$loop = new WP_Query($args_videos);
			$counter = 0;
		?>
		<?php while($loop->have_posts()) : $loop->the_post(); ?>
			<?php $counter++; ?>
			<div class="slide">
				<h2 class="title-bold"><?php echo get_field('title_bold'); ?></h2>
				<h2 class="title-light"><?php echo get_field('title_light'); ?></h2>
				<a href="<?php echo get_field('youtube'); ?>" data-lity class="btn btn-video trigger-youtube">ver video</a>
				<div class="video-bg actual-<?php echo ($counter - 1); ?>" data-video="<?php echo get_field('video'); ?>" data-img="<?php echo get_field('image'); ?>" style="background: url(<?php echo get_field('image'); ?>) no-repeat center center;"></div>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="social-networks">
		<a href="https://www.facebook.com/whiskeygospel/" target="_blank">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>facebook</title><g><path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z"></path></g></svg>
		</a>
		<a href="https://www.youtube.com/channel/UCnvpiFtrKH8sVTlab5xIvMg" target="_blank">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>youtube</title><g><path d="M31.681 9.6s-.313-2.206-1.275-3.175C29.187 5.15 27.825 5.144 27.2 5.069c-4.475-.325-11.194-.325-11.194-.325h-.012s-6.719 0-11.194.325c-.625.075-1.987.081-3.206 1.356C.631 7.394.325 9.6.325 9.6s-.319 2.588-.319 5.181v2.425c0 2.587.319 5.181.319 5.181s.313 2.206 1.269 3.175c1.219 1.275 2.819 1.231 3.531 1.369 2.563.244 10.881.319 10.881.319s6.725-.012 11.2-.331c.625-.075 1.988-.081 3.206-1.356.962-.969 1.275-3.175 1.275-3.175s.319-2.587.319-5.181v-2.425c-.006-2.588-.325-5.181-.325-5.181zM12.694 20.15v-8.994l8.644 4.513-8.644 4.481z"></path></g></svg>
		</a>
		<a href="https://www.instagram.com/thewhiskeygospel/" target="_blank">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><title>instagram</title><g><path d="M16 2.881c4.275 0 4.781.019 6.462.094 1.563.069 2.406.331 2.969.55a4.952 4.952 0 0 1 1.837 1.194 5.015 5.015 0 0 1 1.2 1.838c.219.563.481 1.412.55 2.969.075 1.688.094 2.194.094 6.463s-.019 4.781-.094 6.463c-.069 1.563-.331 2.406-.55 2.969a4.94 4.94 0 0 1-1.194 1.837 5.02 5.02 0 0 1-1.837 1.2c-.563.219-1.413.481-2.969.55-1.688.075-2.194.094-6.463.094s-4.781-.019-6.463-.094c-1.563-.069-2.406-.331-2.969-.55a4.952 4.952 0 0 1-1.838-1.194 5.02 5.02 0 0 1-1.2-1.837c-.219-.563-.481-1.413-.55-2.969-.075-1.688-.094-2.194-.094-6.463s.019-4.781.094-6.463c.069-1.563.331-2.406.55-2.969a4.964 4.964 0 0 1 1.194-1.838 5.015 5.015 0 0 1 1.838-1.2c.563-.219 1.412-.481 2.969-.55 1.681-.075 2.188-.094 6.463-.094zM16 0c-4.344 0-4.887.019-6.594.094-1.7.075-2.869.35-3.881.744-1.056.412-1.95.956-2.837 1.85a7.833 7.833 0 0 0-1.85 2.831C.444 6.538.169 7.7.094 9.4.019 11.113 0 11.656 0 16s.019 4.887.094 6.594c.075 1.7.35 2.869.744 3.881.413 1.056.956 1.95 1.85 2.837a7.82 7.82 0 0 0 2.831 1.844c1.019.394 2.181.669 3.881.744 1.706.075 2.25.094 6.594.094s4.888-.019 6.594-.094c1.7-.075 2.869-.35 3.881-.744 1.05-.406 1.944-.956 2.831-1.844s1.438-1.781 1.844-2.831c.394-1.019.669-2.181.744-3.881.075-1.706.094-2.25.094-6.594s-.019-4.887-.094-6.594c-.075-1.7-.35-2.869-.744-3.881a7.506 7.506 0 0 0-1.831-2.844A7.82 7.82 0 0 0 26.482.843C25.463.449 24.301.174 22.601.099c-1.712-.081-2.256-.1-6.6-.1z"></path><path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219A8.221 8.221 0 0 0 16 7.781zm0 13.55a5.331 5.331 0 1 1 0-10.663 5.331 5.331 0 0 1 0 10.663z"></path><path d="M26.462 7.456a1.919 1.919 0 1 1-3.838 0 1.919 1.919 0 0 1 3.838 0z"></path></g></svg>
		</a>
	</div>
	<div class="slider-pagination">
		<div class="pagination-lines">
			<span class="left"></span>
			<span class="right"></span>
		</div>
		<div class="pagination" id="the-pag">
			<?php
				for($i = 0; $i < $counter; $i++){
					$temp = $i + 1;
					echo '<div class="index" data-index="' . $i . '">' . $temp . '</div>';
				}
			?>
		</div>
	</div>
</header>
<section class="about-content">
	<article class="container-fluid">
		<div class="row">
			<?php
				$args_about = array('p' => 27, 'page_id' => 27, 'post_type' => 'page');
				$loop2 = new WP_Query($args_about);
			?>
			<?php while($loop2->have_posts()) : $loop2->the_post(); ?>
				<div class="col-12 col-md-2"></div>
				<div class="col-12 col-md-4">
					<h3><?php echo get_field('sub_light'); ?></h3>
					<h2><?php the_title(); ?></h2>
				</div>
			<?php endwhile; ?>
		</div>
	</article>
</section>

<script>
	// var myVideo = document.getElementById('video-bg').getAttribute('data-video');
	// var myImage = document.getElementById('video-bg').getAttribute('data-img');
	// var videobg1 = new vidbg('#video-bg', {
	// 	mp4: myVideo,
	// 	poster: myImage,
	// 	overlay: false
	// });
</script>

<?php get_template_part('include/footer') ?>