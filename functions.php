<?php
/**
 * Main functions theme file
 *
 * @package TPC GenFound
 */

// Start the engine
include_once( get_template_directory() . '/lib/init.php' );

// Foundation Integration Into Genesis
include_once( get_stylesheet_directory() . '/foundation/php/main.php' );

// Child theme
define( 'CHILD_THEME_NAME', 'Tax Preparer Connections' );
define( 'CHILD_THEME_URL', '' );
define( 'CHILD_THEME_VERSION', '0.1.0' );
define( 'CHILD_DOMAIN', 'taxpreparerconnections' );
define( 'COMPANY_NAME', 'Tax Preparer Connections' ); // Use this for changing the company name used in things like footer credits.

// Blog Markup
include_once( get_stylesheet_directory() . '/inc/blog.php' );

// Author Box
include_once( get_stylesheet_directory() . '/inc/author-box.php' );

// Widget Areas
include_once( get_stylesheet_directory() . '/inc/widget-areas.php' );

// Footer
include_once( get_stylesheet_directory() . '/inc/footer.php' );

// Add HTML5 markup structure
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption'
	) );

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom background
add_theme_support( 'custom-background' );

// Remove Genesis Footer Widget Area
remove_theme_support( 'genesis-footer-widgets', 3 );

/*
 * Remove Genesis Header
 */
 	remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

	// Remove the header right widget area
	unregister_sidebar( 'header-right' );

/**
 * Check if File is Minified
 *
 * @param  string $dir_path  relative path to directory file is located in
 * @param  string $file_name name of the file without its extention
 * @param  string $extension files extension
 *
 * @return string            file path to correct minified or non-minified file
 */
function genfound_is_minified( $dir_path, $file_name, $extension ) {

	if ( file_exists( __DIR__ . '/' . $dir_path . '/' . $file_name . '.min.' . $extension ) ) {
		$min = '.min.';
	} else {
		$min = '.';
	}

	return '/' . $dir_path . '/' . $file_name . $min . $extension;
}

/**
 * Detects normal or minified file and correctly enqueues it
 *
 * REQUIRED FOR SCRIPTS AND STYLES
 * @param  string  $type      Tell the function what is being enqued. accepted values are 'script' and 'style'.
 * @param  string  $name      Name used as a handle for the script or style.
 * @param  string  $dir_path  Relative path to directory file is located in.
 * @param  string  $file_name Name of the file without its extension.
 *
 * REQUIRED ONLY FOR STYLE
 * @param  array   $deps      Array of the handles of all the registered scripts that this script depends on, that is the scripts that must be loaded before this script.
 * @param  string  $ver       String specifying the script version number, if it has one, which is concatenated to the end of the path as a query string.
 * @param  boolean $in_footer If 'true' then the script is placed before the closing </body> tag.
 *
 * @return void
 */
function genfound_enqueue( $type, $name, $dir_path, $file_name, $deps = array(), $ver = false, $in_footer = true ) {

	if ( $type === 'script' ) {

		$extension = 'js';

		wp_enqueue_script( $name, get_stylesheet_directory_uri() . genfound_is_minified( $dir_path, $file_name, $extension ), $deps, $ver, $in_footer );

	}

	if ( $type === 'style' ) {

		$extension = 'css';

		wp_enqueue_style( $name, get_stylesheet_directory_uri() . genfound_is_minified( $dir_path, $file_name, $extension ) );
	}
}

// Enqueue Styles and Scripts
add_action('wp_enqueue_scripts', 'genfound_styles_scripts');
function genfound_styles_scripts() {
	// Styles
	wp_enqueue_style( 'tpc_fonts', 'https://fonts.googleapis.com/css?family=Oxygen:300,700|Crimson+Text:400,400italic,700' );
	wp_enqueue_style( 'tpc_font_icons', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css');
	genfound_enqueue( 'style', 'main-stylesheet', 'css', 'main' );
	wp_enqueue_style( 'dashicons' );

	// Scripts
	genfound_enqueue( 'script', 'head_js', 'js', 'head', array('jquery'), '', false );
	genfound_enqueue( 'script', 'main_js', 'js', 'main', array('jquery'), '', true );
}
