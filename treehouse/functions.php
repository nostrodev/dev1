<?php
//adding support function for the theme
add_theme_support ('menus');
add_theme_support ('post-thumbnails');


//excerpt sort function
function wpn_excerpt_length ($length){
	return 16;
}
add_filter ('excerpt_length', 'wpn_excerpt_length', 999);


//register menu function
function register_theme_menus () {
	register_nav_menus (
		array(
			'primary-menu' => 'Primary Menu',
			'second-menu' => 'Second Menu'
		)
	);
}
add_action ('init', 'register_theme_menus');


//widgets
function wpn_create_widget ($name, $id, $description) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
		));
}

wpn_create_widget ('Page Sidebar', 'page', 'display the widgets for the page');
wpn_create_widget ('Blog Sidebar', 'blog', 'display the widgets for the page');



//adding css in the function
function nostro_style_data() {
	wp_enqueue_style ( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
	//wp_enqueue_style ( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style ( 'google_font_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' );

	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action ( 'wp_enqueue_scripts', 'nostro_style_data' );


//adding js in the function
function nostro_js_data() {
	wp_enqueue_script ( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );
	wp_enqueue_script ( 'foundaton_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
	wp_enqueue_script ( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundaton_js'), '', true );
}
add_action ( 'wp_enqueue_scripts', 'nostro_js_data' );



?>