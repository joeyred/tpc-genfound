<?php

/**
 * Author Box
 */

function genfound_author_social_bar() {

	echo '<ul class="social-links">';

	if ( get_the_author_meta( 'linkedin' ) != '' ) {
		echo '<li class="linkedin">';
		echo '<a href="' . get_the_author_meta( 'linkedin' ) . '"><span class="fa fa-linkedin"></span></a>';
		echo '</li>';
	}
	if ( get_the_author_meta( 'facebook' ) != '' ) {
		echo '<li class="facebook">';
		echo '<a href="' . get_the_author_meta( 'facebook' ) . '"><span class="fa fa-facebook"></span></a>';
		echo '</li>';
	}
	if ( get_the_author_meta( 'twitter' ) != '' ) {
		echo '<li class="twitter">';
		echo '<a href="' . get_the_author_meta( 'twitter' ) . '"><span class="fa fa-twitter"></span></a>';
		echo '</li>';
	}
	if ( get_the_author_meta( 'googleplus' ) != '' ) {
		echo '<li class="googleplus">';
		echo '<a href="' . get_the_author_meta( 'googleplus' ) . '"><span class="fa fa-google-plus"></span></a>';
		echo '</li>';
	}
	if ( get_the_author_meta( 'user_url' ) != '' ) {
		echo '<li class="website">';
		echo '<a href="' . get_the_author_meta( 'user_url' ) . '"><span class="fa fa-laptop"></span></a>';
		echo '</li>';
	}

	echo '</li>';
}

// Add author box to single post pages 
add_filter( 'get_the_author_genesis_author_box_single', '__return_true' );

function genfound_alt_author_box() {
	if( is_single() ) {
		?>
		<div class="author-box-wrap">

			<div class="author-box header-row row">

				<div class="small-4 columns">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), '140' ); ?> 
				</div>

				<div class="small-8 columns">
					<h1><span class="mobile-block">About</span><span class="author-name"> <?php echo get_the_author(); ?></span></h1>

					<div class="hide-for-small-only">
						<?php genfound_author_social_bar(); ?>
					</div>	

				</div>

			</div>

			<div id="social-bar-mobile" class="social-row row small-collapse show-for-small-only">
				<div class="small-12 columns">		
				
					<?php genfound_author_social_bar(); ?>

				</div>
			</div>

			<div class="row bio-row">
				<div class="small-12 columns about-author">
					
					<p><?php echo get_the_author_meta( 'description' ); ?></p> 
				</div>
			</div>

			<div class="row author-posts-row">
				<div class="small-12 columns contact-links">
					<a class="button light" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">View all posts by <?php echo get_the_author(); ?></a>
				</div>
			</div>	

		</div>
		<?php
	}
}
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
add_action( 'genesis_after_entry', 'genfound_alt_author_box', 8 ); //change hook for position