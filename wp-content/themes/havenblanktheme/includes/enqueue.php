<?php
/**
 * Enqueue scripts and styles.
 */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function haven_blank_theme_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'haven_blank_theme_deregister_scripts' );

function haven_blank_theme_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'haven_blank_theme_remove_wp_block_library_css', 100 );

function google_preconnect(){
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">
		  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'google_preconnect', 0);

function haven_blank_theme_scripts() {

	wp_enqueue_style( 'inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800;900&display=swap', array(), _S_VERSION, 'all');

	wp_enqueue_style( 'haven-blank-theme-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'haven-blank-theme-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION, 'all');

	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'haven-blank-theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'haven_blank_theme_scripts' );