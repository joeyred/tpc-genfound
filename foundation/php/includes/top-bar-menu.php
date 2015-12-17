<?php

/** 
 * Navigation 
 *
 * Using Foundations Top Bar component
 *
 * URL for Documentation for component:
 * @see http://foundation.zurb.com/docs/components/topbar.html
 * 
 */

// Create Walker Class 
class Top_Bar_Walker extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$element->has_children = ! empty( $children_elements[ $element->ID ] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );
		$output .= ( 0 == $depth ) ? '<li class="divider"></li>' : '';
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		if ( in_array( 'label', $classes ) ) {
			$output .= '<li class="divider"></li>';
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}
	if ( in_array( 'divider', $classes ) ) {
		$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
	}
		$output .= $item_html;
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}
}

function genfound_top_bar() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'container_class' => '',                        // Class of container
        'menu' => '',                  // Menu name
        'menu_class' => 'top-bar-menu right',           // Adding custom nav class
        'theme_location' => 'primary',                  // Where it's located in the theme
        'before' => '',                                 // Before each link <a>
        'after' => '',                                  // After each link </a>
        'link_before' => '',                            // Before each link text
        'link_after' => '',                             // After each link text
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Top_Bar_Walker(),
    ));
}
//Top Bar Menu Markup
function genfound_top_bar_markup() {
?>
<div class="fixed show-for-medium-up">
	<nav class="top-bar" data-topbar>
			<a href="<?php bloginfo( 'url' ); ?>" alt="Home">
				<ul class="title-area">
					<!-- Title Area -->
					<li class="name">
						
						<?php genfound_menu_logo(); ?>

					</li>
					<li class="site-title">
						<h1>
						<?php bloginfo( 'name' ); ?>
						</h1>
					</li>
				</ul>	
			</a>

			<section class="top-bar-section right">

				<?php genfound_top_bar(); ?>

			</section>

	</nav>
</div>
<?php
}

