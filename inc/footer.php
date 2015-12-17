<?php

// Footer Credits Filter Hook
add_filter('genesis_footer_creds_text', 'genfound_footer_creds_filter');
/**
 * Change Footer Credits
 *
 * @since  1.0
 * @param  string $creds original markup
 * 
 * @return string        ammended markup
 */
function genfound_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] &middot; <a href="http://' 
		   . CHILD_DOMAIN
		   . '.com" title="'
		   . COMPANY_NAME
		   . '">'
		   . COMPANY_NAME
		   . '</a>'
		//   . ' &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>'
		   ;
	return $creds;
}

/*
 * Display Footer Widgets
 */
add_action( 'genesis_before_footer', 'genfound_footer' );
function genfound_footer() {

	if( !is_home() ) { // Dont want this showing up on the Blog Home
		genesis_widget_area( 'primary-footer', array(
			'before'	=> '<div class="primary-footer-wrapper"><div class="primary-footer widget-area row">',
			'after'		=> '</div></div>',
		) );
	}

	genesis_widget_area( 'sub-footer', array(
		'before'	=> '<div class="sub-footer-wrapper"><div class="sub-footer widget-area row">',
		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'sub-sub-footer', array(
		'before'	=> '<div class="sub-sub-footer-wrapper"><div class="sub-sub-footer widget-area row">',
		'after'		=> '</div></div>',
	) );
}