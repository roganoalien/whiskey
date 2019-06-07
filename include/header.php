<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="robots" content="index, follow">
	<meta name="author" content="Rodrigo García">
	<title><?php echo get_bloginfo('name') ?></title>
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
	<nav class="main-navigation navbar main-navbar fixed-top" id="mi-navegacion">
		<div class="nav-container container">
			<?php
				$args_left = array(
					'theme_location' => 'main-menu-left',
					'menu' => 'main-menu-left',
					'container' => 'ul',
					'container_class' => 'left-side',
					'container_id' => 'left-nav',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'items_wrap' => '<ul class="left-side">%3$s</ul>',
					'depth' => 0,
					'walker' => ''
				);
				wp_nav_menu( $args_left );
			?>
			<div class="center-side navbar-brand">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/circle-logo.svg" alt="" class="circle">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/text-logo.svg" alt="" class="text">
			</div>
			<?php
				$args_right = array(
					'theme_location' => 'main-menu-right',
					'menu' => 'main-menu-right',
					'container' => 'ul',
					'container_class' => 'right-side',
					'container_id' => 'right-nav',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'items_wrap' => '<ul class="right-side">%3$s</ul>',
					'depth' => 0,
					'walker' => ''
				);
				wp_nav_menu( $args_right );
			?>
		</div>
	</nav>