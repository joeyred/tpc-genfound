<?php

// Navigation Markup 
require( get_stylesheet_directory() . '/foundation/php/includes/navigation.php' );

// Grid Markup 
require( get_stylesheet_directory() . '/foundation/php/includes/grid.php' );

// Block Grid Markup 
require( get_stylesheet_directory() . '/foundation/php/includes/block-grid.php' );

// Comments Markup
require( get_stylesheet_directory() . '/foundation/php/includes/forms.php' );

// Enqueue Foundation Scripts
add_action('wp_enqueue_scripts', 'genfound_foundation_scripts');
function genfound_foundation_scripts() {
	
	//wp_enqueue_script( 'modernizr_js', get_stylesheet_directory_uri() . '/js/vendor/modernizr.js', '', '', false );
	//wp_enqueue_script('fastclick_js', get_stylesheet_directory_uri() . '/js/vendor/fastclick.js', array('jquery'), '', true );
	//wp_enqueue_script('placeholder_js', get_stylesheet_directory_uri() . '/js/vendor/placeholder.js', array('jquery'), '', true );
}

/**
 * Start Foundation
 */
add_action( 'wp_footer', 'genfound_foundation_start', 20 );
function genfound_foundation_start() {
	?>
	<script>
		(function($) {
			$(document).foundation()
		})(jQuery);
	</script>
	<?php
}