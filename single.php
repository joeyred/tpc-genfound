<?php

// Force full-width layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full-width-content' );

add_action( 'genesis_before_comments', 'genfound_single_post_widget_areas');

function genfound_single_post_widget_areas() {

	genesis_widget_area( 'after-entry-single', array(
		'before'	=> '<div class="after-entry-single widget-area wrap"><div class="row">',
		'after'		=> '</div></div>',
	) );

}

genesis();