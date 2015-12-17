<?php 

/** 
 * Navigation 
 *
 * URL for Documentation for component:
 * @see http://foundation.zurb.com/docs/components/topbar.html
 * 
 */

// Remove Genesis Menus
remove_theme_support( 'genesis-menus' );

// Register Theme location for Primary Menu
function genfound_register_foundation_menus() {
	register_nav_menus( 
		array(
			'primary' => __( 'Primary Navigation' )
		)
	);
}
add_action( 'init', 'genfound_register_foundation_menus' );

// Fix .sticky Class Conflict Between WordPress and Foundation
function remove_sticky_class($classes) {
  $classes = array_diff($classes, array("sticky"));
  $classes[] = 'wordpress-sticky';
  return $classes;
}
add_filter('post_class','remove_sticky_class');

// Create Logo Markup
function genfound_menu_logo() {
	?>
	<div class="nav-logo-container">
		<?php echo file_get_contents(dirname(__FILE__) . '/../../../images/tpc-header-optimized.svg' ) ?>
	</div>
	<?php
}

// Include Top Bar
include_once( get_stylesheet_directory() . '/foundation/php/includes/top-bar-menu.php' );

// Include Off-Canvas
include_once( get_stylesheet_directory() . '/foundation/php/includes/off-canvas-menu.php' );

// Hook Off-Canvas Wrapper
//add_action( 'genesis_before', 'genfound_off_canvas_open' );
add_action( 'genesis_after', 'genfound_off_canvas_close' );

// Hook Off-Canvas Nav Markup
add_action( 'genesis_before', 'genfound_off_canvas_markup' );

// Hook Top Bar Navigation
add_action( 'genesis_after_header', 'genfound_top_bar_markup');

/* 
New Menu Markup */
function genfound_navigation() {

	// Off-Canvas
	genfound_off_canvas_markup();
	// Top Bar
	genfound_top_bar_markup();

}