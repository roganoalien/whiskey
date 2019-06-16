<?php
// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );
//////////////////////////////////
// Soporte de menú para el tema //
//////////////////////////////////
function register_my_menu(){
	register_nav_menu('main-menu-left',__( 'Main Menu Left' ));
	register_nav_menu('main-menu-right',__( 'Main Menu Right' ));
}
add_action( 'init', 'register_my_menu' );
//////////////////////////////////////////////
// Soporte para los thumbnails de los posts //
//////////////////////////////////////////////
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'image', 'gallery' ) );
//////////////////////////////////////////////////////////////////////
// Quitamos los tags de Párrafo <p> Al rededor de las imágenes </p> //
//////////////////////////////////////////////////////////////////////
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
////////////////////////////////////////////////////////////////////////////////
// Quitamos items del menú del administrador para que no puedan modificarlos  //
////////////////////////////////////////////////////////////////////////////////
function custom_menu_page_removing(){
	//Apariencia
	// remove_menu_page('themes.php');
	//Comentarios
	remove_menu_page('edit-comments.php');
	//Media
	// remove_menu_page('upload.php');
	//Plugins
	// remove_menu_page('plugins.php');
	//Herramientas
	// remove_menu_page('tools.php');
	//Usuarios
	// remove_menu_page('users.php');
}
add_action('admin_menu', 'custom_menu_page_removing');
//////////////////////////////////////
// Agregamos Post Types específicos //
//////////////////////////////////////
function create_postTypes(){
	// Video Slideshow
	$videoLabels = array(
		'name' => __('Videos'),
		'singular_name' => __('Video')
	);
	$videoArgs = array(
		'labels' => $videoLabels,
		'description' => __('Slider de Videos'),
		'public' => true,
		'show_ui' => true,
		// 'show_in_menu' => 'my_home_menu',
		'menu_position' => 2,
		'menu_icon' => 'dashicons-video-alt3',
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'rewrite' => array(
			'slug' => 'videos'
		),
		'supports' => array(
			'title', 'thumbnail', 'excerpt', 'custom-fields', 'editor'
		)
	);
	register_post_type('videos', $videoArgs);
	// Segurviajes del Home
	// $segurLabel = array(
	// 	'name' => __('SegurViaje'),
	// 	'singular_name' => __('Segurviaje')
	// );
	// $segurArgs = array(
	// 	'labels' => $segurLabel,
	// 	'description' => __('Sección de Segurviaje en el Home'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_menu' => 'my_home_menu',
	// 	// 'menu_position' => 1,
	// 	'menu_icon' => 'dashicons-admin-site',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'home-segurviaje'
	// 	),
	// 	'supports' => array(
	// 		'title', 'thumbnail', 'editor'
	// 	)
	// );
	// register_post_type('segurviaje', $segurArgs);
	// // Planes Segurviaje
	// $planesLabel = array(
	// 	'name' => __('Planes Segurviaje'),
	// 	'singular_name' => __('Plan Segurviaje')
	// );
	// $planesArgs = array(
	// 	'labels' => $planesLabel,
	// 	'description' => __('Planes de Segurviaje'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	// 'show_in_menu' => 'my_home_menu',
	// 	'menu_position' => 2,
	// 	'menu_icon' => 'dashicons-category',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'planes-segurviaje'
	// 	),
	// 	'supports' => array(
	// 		'title', 'thumbnail', 'excerpt', 'editor'
	// 	)
	// );
	// register_post_type('planes', $planesArgs);
	// // Números Home
	// $numbersLabel = array(
	// 	'name' => __('Números Segurviaje'),
	// 	'singular_name' => __('Número Segurviaje')
	// );
	// $numbersArgs = array(
	// 	'labels' => $numbersLabel,
	// 	'description' => __('Números de Segurviaje'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_menu' => 'my_home_menu',
	// 	// 'menu_position' => 4,
	// 	'menu_icon' => 'dashicons-chart-area',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'numeros-segurviaje'
	// 	),
	// 	'supports' => array(
	// 		'title', 'excerpt'
	// 	)
	// );
	// register_post_type('numeros', $numbersArgs);
	// // Videos Home
	// $videosLabel = array(
	// 	'name' => __('Videos'),
	// 	'singular_name' => __('Video')
	// );
	// $videosArgs = array(
	// 	'labels' => $videosLabel,
	// 	'description' => __('Videos del Home en Slider'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_menu' => 'my_home_menu',
	// 	// 'menu_position' => 4,
	// 	'menu_icon' => 'dashicons-format-video',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'videos-home'
	// 	),
	// 	'supports' => array(
	// 		'title', 'excerpt', 'custom-fields'
	// 	)
	// );
	// register_post_type('videos', $videosArgs);
	// // Pasos a Obtener
	// $pasosLabel = array(
	// 	'name' => __('Pasos Segurviaje'),
	// 	'singular_name' => __('Pasos Segurviaje')
	// );
	// $pasosArgs = array(
	// 	'labels' => $pasosLabel,
	// 	'description' => __('Pasos a seguir para obtener un Segurviaje'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_menu' => 'my_home_menu',
	// 	// 'menu_position' => 4,
	// 	'menu_icon' => 'dashicons-editor-ol',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'videos-home'
	// 	),
	// 	'supports' => array(
	// 		'title', 'thumbnail'
	// 	)
	// );
	// register_post_type('pasos', $pasosArgs);
	// // Reconocimientos Home
	// $recosLabel = array(
	// 	'name' => __('Reconocimientos'),
	// 	'singular_name' => __('Reconocimiento')
	// );
	// $recosArgs = array(
	// 	'labels' => $recosLabel,
	// 	'description' => __('Reconocimientos Segurviaje del Home'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	'show_in_menu' => 'my_home_menu',
	// 	// 'menu_position' => 4,
	// 	'menu_icon' => 'dashicons-awards',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'videos-home'
	// 	),
	// 	'supports' => array(
	// 		'title', 'thumbnail'
	// 	)
	// );
	// register_post_type('reconocimientos', $recosArgs);
	// // FAQs
	// $recosLabel = array(
	// 	'name' => __('FAQs'),
	// 	'singular_name' => __('FAQ')
	// );
	// $recosArgs = array(
	// 	'labels' => $recosLabel,
	// 	'description' => __('Preguntas frecuentes de Segurviaje'),
	// 	'public' => true,
	// 	'show_ui' => true,
	// 	// 'show_in_menu' => '',
	// 	'menu_position' => 3,
	// 	'menu_icon' => 'dashicons-megaphone',
	// 	'map_meta_cap' => true,
	// 	'capability_type' => 'post',
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'faqs'
	// 	),
	// 	'supports' => array(
	// 		'title', 'editor'
	// 	)
	// );
	// register_post_type('faqs', $recosArgs);
}
add_action('init', 'create_postTypes');

// Create menu position and submenu
// function create_home_menu(){
// 	add_menu_page(
// 		'Página de Inicio',
// 		'Inicio/Home',
// 		'manage_options',
// 		'my_home_menu',
// 		'mycustompage',
// 		'dashicons-admin-home',
// 		2
// 	);
// }
// add_action('admin_menu', 'create_home_menu');

// Add scripts
/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );

function my_deregister_styles()    { 
   wp_deregister_style( 'amethyst-dashicons-style' ); 
   wp_deregister_style( 'dashicons' ); 
}
function your_themes_scripts(){
   // Hack to stop wordpress from loading jQuery in the head of the page
   wp_deregister_script( 'jquery' );
   // Then load it in the footer.
   wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/vendors/vendors.min.js' );
   wp_enqueue_script( 'mapfre-scripts', get_template_directory_uri() . '/assets/js/main.min.js' );
}

add_action( 'wp_enqueue_scripts', 'your_themes_scripts' );

/* =Clean up the WordPress head
------------------------------------------------- */

    // remove header links
    add_action('init', 'tjnz_head_cleanup');
    function tjnz_head_cleanup() {
        remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
        remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
        remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
        remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
        remove_action( 'wp_head', 'index_rel_link' );                           // index link
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
        remove_action( 'wp_head', 'wp_generator' );                             // WP version
        if (!is_admin()) {
            wp_deregister_script('jquery');                                     // De-Register jQuery
            wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
        }
    }

	// remove WP version from RSS
	add_filter('the_generator', 'tjnz_rss_version');
	function tjnz_rss_version() { return ''; }

	add_filter( 'nav_menu_link_attributes', function($atts) {
		$atts['class'] = "nav-anchor";
		return $atts;
	}, 100, 1 );
?>