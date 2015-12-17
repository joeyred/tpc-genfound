<?php

// Force full-width layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full-width-content' );

add_action( 'genesis_after_entry', 'genfound_blog_home_after_article_widgets' );
function genfound_blog_home_after_article_widgets() {

	genesis_widget_area( 'blog-home-subscribe', array(
		'before'	=> '<div class="blog-home-subscribe widget-area wrap"><div class="row">',
		'after'		=> '</div></div>',
	) );

	genesis_widget_area( 'blog-home-ads', array(
		'before'	=> '<div class="blog-home-ads widget-area wrap"><div class="row">',
		'after'		=> '</div></div>',
	) );
}

 
genesis();