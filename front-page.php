<?php
/**
 * Template for the Static Home Page.
 *
 * @author Joey Hayes
 * @package Tax Preparer Connections
 * @subpackage Customizations
 */

add_action( 'genesis_meta', 'genfound_front_page_genesis_meta' );

function genfound_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-row-1' ) || 
		 is_active_sidebar( 'front-page-row-2' ) || 
		 is_active_sidebar( 'front-page-row-3' ) || 
		 is_active_sidebar( 'front-page-row-4' ) || 
		 is_active_sidebar( 'front-page-row-5' ) || 
		 is_active_sidebar( 'front-page-row-6' ) ) {

		// Force full width content layout
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		// Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		// Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets
		add_action( 'genesis_loop', 'genfound_front_page_rows' );

	}
}

// Add markup for front page widgets
function genfound_front_page_rows() {

	// Landing Container Open
	echo '<div id="landing" class="landing-section-container">';


	genesis_widget_area( 'front-page-landing-section-1', array(
		'before'	=> '<div class="front-page-landing-section-1 image-bg">'
					 . '<div class="full-height-section dark-bg overlay-bg wrap">'
					 . '<div class="row">',

		'after'		=> '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-landing-section-2', array(
		'before'	=> '<div id="landing-cta" class="front-page-landing-section-2-wrap">'
					 . '<div class="front-page-landing-section-2 row">',

		'after'		=> '</div></div>',
	) );

	// Landing Container Close
	echo '</div>';

	genesis_widget_area( 'front-page-row-2', array(
		'before'	=> '<div id="info-boxes" class="front-page-row-2-wrap wrap">'
					 . '<div class="front-page-row-2 row alt">',

		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'front-page-row-3', array(
		'before'	=> '<div id="newsletter" class="front-page-row-3-wrap wrap color-bg">'
					 . '<div class="front-page-row-3 row">',

		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'front-page-row-4', array(
		'before'	=> '<div id="vendors" class="front-page-row-4-wrap wrap">'
					 . '<div class="front-page-row-4 row alt">',

		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'front-page-row-5', array(
		'before'	=> '<div id="whitepapers" class="front-page-row-5-wrap wrap color-bg">'
					 . '<div class="front-page-row-5 row">',

		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'front-page-row-6', array(
		'before'	=> '<div id="sign-up-now" class="front-page-row-6-wrap wrap">'
					 . '<div class="front-page-row-6 row alt">',

		'after'		=> '</div></div>',
	) );
}

genesis();
