<?php

// Amend the post comments shortcode to add extra markup for styling.
add_filter( 'genesis_post_comments_shortcode', 'prefix_post_comments_shortcode' );
/**
 * Replace Post Comments Shortcode
 *
 * @since  1.0
 * @param  string $output original markup
 * 
 * @return string         ammended markup
 */
function prefix_post_comments_shortcode( $output ) {
    return preg_replace( '/#comments"\>(\d+) Comment/', '#comments"><span class="entry-comments-number">$1</span> <span class="fa fa-comment"></span><span class="old-browsers"> Comments</span>', $output );
}

// Customize Entry Meta Filed Under and Tagged Under
add_filter( 'genesis_post_meta', 'genfound_entry_meta_footer' );
/**
 * Entry Meta Filtering
 *
 * @since  1.0 
 * @param  string $post_meta original markup
 * 
 * @return string            ammended markup
 */
function genfound_entry_meta_footer( $post_meta ) {
	$post_meta = '<div class="post-meta-wrap wrap">'
			   . '<div class="row">'
			   . '<div class="small-12 columns">'
			   . '<span class="fa fa-tags"></span><span class="old-browsers">Tags:</span> [post_tags before="" sep=""]'
			   . '</div></div></div>'
			   ;
	return $post_meta;
}
// [post_categories before="" sep=""]

/**
 * Title Over Featured Image  
 */

	// Unhook Entry Header Post Title
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

	// Add New Entry Header Markup for Post Title
	add_action( 'genesis_entry_header', 'genfound_text_over_featured_image', 8 );
	function genfound_text_over_featured_image() {
		$thumbnail_src = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		if( is_single() || is_home() ) {

			echo '<div class="article-title-wrap wrap';
		    if( has_post_thumbnail() ) {
		    	echo ' post-thumbnail" style="background-image: url(' . $thumbnail_src . ');"';
		    } else {
		    	echo ' image-placeholder"';
		    }
		    echo '>';
			echo '<div class="article-title row"><div class="small-12 columns">';
			genesis_do_post_title();
			echo '</div></div></div>';

		} else { // This is to make sure the image background doesnt get applied to all pages
			echo '<div class="article-title-wrap wrap';
			echo '<div class="article-title row"><div class="small-12 columns">';
			genesis_do_post_title();
			echo '</div></div></div>';
		}
	}

// Customize the entry meta in the entry header
add_filter( 'genesis_post_info', 'genfound_post_info_filter' );
/**
 * Post Info Filter
 * 
 * @since  1.0
 * @param  string $post_info original markup
 * 
 * @return string            ammended markup
 */
function genfound_post_info_filter($post_info) {
	$post_info = '<div class="entry-meta-top-bar-wrap wrap"><div class="entry-meta-top-bar row collapse">' // Top bar wrapper and row open
			   . '<div class="post-date-container small-6 columns text-left">[post_date]</div>' // Post Date - Left
			   . '<div class="post-comments-container small-6 columns text-right">[post_comments]</div>' // Post Commetns - Right
			   . '</div></div>' // Top bar wrapper and row close
			   . '<div class="entry-meta-bottom-bar-wrap wrap"><div class="entry-meta-bottom-bar row">' // Bottom bar wrapper and row open
			   . '<div class="post-author-container small-12 columns">by [post_author_posts_link]</div>' // Post Author
			   . '</div></div>' // Bottom bar wrapper and row close
			   . '[post_edit]'
			   ;
	return $post_info;
}