<?php

/** 
 * Forms 
 *
 * Using Foundations Forms Base Styling
 *
 * URL for Documentation for component:
 * @see http://foundation.zurb.com/docs/components/forms.html
 * 
 */

/**
 * Edit submit button markup
 *
 * @since 
 * @param array $defaults Existing attributes
 * @return array Ammended attributes
 */
function genfound_comment_form_submit( $defaults ) {
	$defaults['submit_field'] = '<div class="form-submit row">' . 
							'<div class="' . 'small-12' . ' ' . 'columns' . '">' .
							'%1$s %2$s' . 
							'</div>' .
							'</div>'
							;
	$defaults['class_submit'] .= ' ' . 'button';

	return $defaults;
}
add_filter( 'comment_form_defaults', 'genfound_comment_form_submit' );

/**
 * Change markup for WordPress comment default fields
 *
 * @since  
 * @param array $fields Existing fields markup.
 * @return array Amended fields markup.
 */
function genfound_comment_fields( $fields ) {

	$fields['author'] = 
		'<div class="row">' . // Row open
		'<div class="comment-form-author' . ' ' . 'small-12' . ' ' . 'columns' . '">' . // Column open
		//'<label>' . __( 'Name', CHILD_DOMAIN ) . // Label open
		//( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" aria-label="Name" placeholder="' . __( 'Name', CHILD_DOMAIN ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />' .
		//'</label>' . // Label close
		'</div>' . // Column div close
		'</div>' // Row div close
		;

	$fields['email'] = 
		'<div class="row">' . // Row open
		'<div class="comment-form-email' . ' ' . 'small-12' . ' ' . 'columns' . '">' .
		//'<label>' . __( 'Email', CHILD_DOMAIN ) . 
		//( $req ? '<span class="required">*</span>' : '' )
		'<input id="email" name="email" type="text" aria-label="Email" placeholder="' . __( 'Email', CHILD_DOMAIN ) . ( $req ? '<span class="required">*</span>' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />' .
		//'</label>' . // Label close
		'</div>' . // Column div close
		'</div>' // Row div close
		;

	$fields['url'] =
		'<div class="row">' . // Row open
		'<div class="comment-form-url' . ' ' . 'small-12' . ' ' . 'columns' . '">' .
		//'<label>' . __( 'Website', CHILD_DOMAIN ) .
		'<input id="url" name="url" type="text" aria-label="Website" placeholder="' . __( 'Website', CHILD_DOMAIN ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />' .
		//'</label>' . // Label close
		'</div>' . // Column div close
		'</div>' // Row div close
		;	

	return $fields;	
}
add_filter( 'comment_form_default_fields', 'genfound_comment_fields');

/**
 * Edit markup for WordPress comment field textbox
 * 
 * @since  
 * @param string $comment_field Existing markup.
 * @return string Amended markup.
 */
function genfound_comment_field_comment( $comment_field ) {
	$comment_field = 
		'<div class="row">' . // Row open
		'<div class="comment-form-comment' . ' ' . 'small-12' . ' ' . 'columns' . '">' .
		//'<label>' . _x( 'Comment', 'noun' ) . 
		'<textarea id="comment" name="comment" cols="45" rows="4" aria-label="Message" placeholder="Type Your Message Here" aria-required="true"></textarea>' .
		//'</label>' . // Label close
		'</div>' . // Column div close
		'</div>' // Row div close
		;
	return $comment_field;
}
add_filter( 'comment_form_field_comment', 'genfound_comment_field_comment');


