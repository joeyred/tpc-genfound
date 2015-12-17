<?php

/** 
 * Off-Canvas Navigation 
 *
 * Using Foundations Off-Canvas component for small screens only
 *
 * URL for Documentation for component:
 * @see http://foundation.zurb.com/docs/components/offcanvas.html
 * 
 */

// Create Walker Class
class Offcanvas_Walker extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-submenu' : '';
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		if ( in_array( 'label', $classes ) ) {
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}
		$output .= $item_html;
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"left-submenu\">\n<li class=\"back\"><a href=\"#\">". __( 'Back', 'jointstheme' ) ."</a></li>\n";
	}
}

function genfound_off_canvas() {
	    wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'off-canvas-list',              // Adding custom nav class
	        'theme_location' => 'primary',        // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => false,                         // Fallback function (see below)
	        'walker' => new Offcanvas_Walker(),
	    ));
	}
	
	//insert opening markup for wrappers
	function genfound_off_canvas_open() {
		
		//echo '<div class="off-canvas-wrap">';
		//echo '<div class="inner-wrap">';
		//echo '<a class="exit-off-canvas"></a>';

	}
	//add_action( 'genesis_before', 'genfound_off_canvas_open' );		
	//insert closing markup for wrappers
	function genfound_off_canvas_close() {

		echo '</div>'; // Closes div.off-canvas-wrap
		echo '</div>';	// Closes div.site-container
	}
	//add_action( 'genesis_after', 'genfound_off_canvas_close' );	

function genfound_off_canvas_markup() {
	?>
	<div class="off-canvas-wrap" data-offcanvas>

		<div class="fixed off-canvas-fixed show-for-small-only">

			<nav class="tab-bar">

				<section class="left-small">
					<a href="#" class="left-off-canvas-toggle menu-icon" ><span></span></a>
				</section>

				<section class="middle tab-bar-section">
					<?php genfound_menu_logo(); ?>
				</section>
				
			</nav>
							
			<aside class="left-off-canvas-menu">
				<ul class="off-canvas-list">
					<li><label>Navigation</label></li>
					<?php genfound_off_canvas(); ?>    
				</ul>
			</aside>

		</div>	
		
		<div class="inner-wrap">
			<a class="exit-off-canvas"></a>

	<?php	
}



