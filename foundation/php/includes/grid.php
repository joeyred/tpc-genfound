<?php

/** 
 * Grid 
 *
 * Using Foundations Grid component
 *
 * URL for Documentation for component:
 * @see http://foundation.zurb.com/docs/components/grid.html
 * 
 */

/*
Filtering for Genesis Header
=========================================== */

// Site Header Wrapper
add_filter( 'genesis_attr_site-header', 'genfound_site_header' );
	function genfound_site_header( $attributes ) {
	 
	 $attributes['class'] .= ' ' . 'row';
	 return $attributes;
	}
// Title Area
add_filter( 'genesis_attr_title-area', 'genfound_title_area' );
	function genfound_title_area( $attributes ) {
	 
	 $attributes['class'] .= ' ' . 'columns' // foundation column class
	 				  //   . ' ' . 'small-'  . '' // Small screen column size
	 				  //   . ' ' . 'medium-' . '' // Medium screen column size
	 					   . ' ' . 'large-'  . '5' // Large screen column size
	 					   ;
	 return $attributes;
	}

// Header Widget Area
add_filter( 'genesis_attr_header-widget-area', 'genfound_header_widget_area' );
	function genfound_header_widget_area( $attributes ) {
	 
	 $attributes['class'] .= ' ' . 'columns' // foundation column class
				  		  //   . ' ' . 'small-'  . '' // Small screen column size
				  		  //   . ' ' . 'medium-' . '' // Medium screen column size
					   		   . ' ' . 'large-'  . '7' // Large screen column size
					   ;
	 return $attributes;
	}		

/*
Filtering for Genesis Page Layouts
=========================================== */

/**
 * Conditional Markup 
 *
 * @author Joey Hayes
 * @description This uses the value of the current page layout to execute filters that 
 * modify Genesis page markup to work with the Foundation Framwork 
 * 
 */

// Hook genfound_current_layout_markup() to Genesis
add_action('genesis_before', 'genfound_current_layout_markup');

function genfound_current_layout_markup() {
	$site_layout = genesis_site_layout(); //store current page layout in variable

	/*
	Content Sidebar ============================= */
	
	if ( 'content-sidebar' == $site_layout) { 
		
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row' // foundation row class
			 					   . ' ' . 'small-collapse' 
			 					   //. ' ' . 'large-uncollapse'
			 					   ;
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '9' // Large screen column size
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Primary	
		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
			function genfound_sidebar_primary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '3' // Large screen column size
			 					   ;
			 return $attributes;
			}	

	/*
	Sidebar Content ============================= */					

	} elseif ( 'sidebar-content' == $site_layout) {
		
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '9' // Large screen column size
			 					   . ' ' . 'large-push-3'
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Primary	
		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
			function genfound_sidebar_primary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '3' // Large screen column size
			 					   . ' ' . 'large-pull-9'
			 					   ;
			 return $attributes;
			}

	/*
	Content Sidebar Sidebar ============================= */

	} elseif ( 'content-sidebar-sidebar' == $site_layout) {

		// Site Inner div
		add_filter( 'genesis_attr_site-inner', 'genfound_site_inner' );
			function genfound_site_inner( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Add Opening div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_before_content_sidebar_wrap', 'genfound_csw_row_wrap_open');
		function genfound_csw_row_wrap_open() {

			echo '<div class="';
			echo 'columns' . ' ';
			//echo 'small-' . '' . ' ';
			//echo 'medium-' . '' . ' ';
			echo 'large-' . '10';
			echo '">';
		}
		// Add closing div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_after_content', 'genfound_csw_row_wrap_close');
		function genfound_csw_row_wrap_close() {
			echo '</div>';
		}	
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '9' // Large screen column size
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Primary	
		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
			function genfound_sidebar_primary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '3' // Large screen column size
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Secondary	
		add_filter( 'genesis_attr_sidebar-secondary', 'genfound_sidebar_secondary' );
			function genfound_sidebar_secondary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '2' // Large screen column size
			 					   ;
			 return $attributes;
			}

	/*
	Sidebar Sidebar Content ============================= */

	} elseif ( 'sidebar-sidebar-content' == $site_layout) {
		
		// Site Inner div
		add_filter( 'genesis_attr_site-inner', 'genfound_site_inner' );
			function genfound_site_inner( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Add Opening div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_before_content_sidebar_wrap', 'genfound_csw_row_wrap_open');
		function genfound_csw_row_wrap_open() {

			echo '<div class="';
			echo 'columns' . ' ';
			//echo 'small-' . '' . ' ';
			//echo 'medium-' . '' . ' ';
			echo 'large-' . '10' . ' ';
			echo 'large-push-2';
			echo '">';
		}
		// Add closing div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_after_content', 'genfound_csw_row_wrap_close');
		function genfound_csw_row_wrap_close() {
			echo '</div>';
		}
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '9' // Large screen column size
			 					   . ' ' . 'large-push-3'
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Primary	
		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
			function genfound_sidebar_primary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '3' // Large screen column size
			 					   . ' ' . 'large-pull-9'
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Secondary	
		add_filter( 'genesis_attr_sidebar-secondary', 'genfound_sidebar_secondary' );
			function genfound_sidebar_secondary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '2' // Large screen column size
			 					   . ' ' . 'large-pull-10'
			 					   ;
			 return $attributes;
			}		

	/*
	Sidebar Content Sidebar ============================= */

	} elseif ( 'sidebar-content-sidebar' == $site_layout) {
		
		// Site Inner div
		add_filter( 'genesis_attr_site-inner', 'genfound_site_inner' );
			function genfound_site_inner( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Add Opening div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_before_content_sidebar_wrap', 'genfound_csw_row_wrap_open');
		function genfound_csw_row_wrap_open() {

			echo '<div class="';
			echo 'columns' . ' ';
			//echo 'small-' . '' . ' ';
			//echo 'medium-' . '' . ' ';
			echo 'large-' . '10' . ' ';
			echo 'large-push-2';
			echo '">';
		}
		// Add closing div Wrapper around Content-Sidebar-Wrap	
		add_action( 'genesis_after_content', 'genfound_csw_row_wrap_close');
		function genfound_csw_row_wrap_close() {
			echo '</div>';
		}
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row'; // foundation row class
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '9' // Large screen column size
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Primary	
		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
			function genfound_sidebar_primary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '3' // Large screen column size
			 					   ;
			 return $attributes;
			}
		// Aside - Sidebar Secondary	
		add_filter( 'genesis_attr_sidebar-secondary', 'genfound_sidebar_secondary' );
			function genfound_sidebar_secondary( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				  //   . ' ' . 'small-'  . '' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 					   . ' ' . 'large-'  . '2' // Large screen column size
			 					   . ' ' . 'large-pull-10'
			 					   ;
			 return $attributes;
			}	

	/*
	Full Width Content ============================= */	

	} elseif ( 'full-width-content' == $site_layout) {       
		
		// Content Sidebar Wrap
		add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
			function genfound_content_sidebar_wrap( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'row' // foundation row class
			 					   . ' ' . 'small-collapse'
			 				//     . ' ' . 'medium-uncollapse'
			 					   ; 
			 return $attributes;
			}
		// Main Content	
		add_filter( 'genesis_attr_content', 'genfound_main_content' );
			function genfound_main_content( $attributes ) {
			 
			 $attributes['class'] .= ' ' . 'columns' // foundation column class
			 				       . ' ' . 'small-'  . '12' // Small screen column size
			 				  //   . ' ' . 'medium-' . '' // Medium screen column size
			 				  //   . ' ' . 'large-'  . '' // Large screen column size
			 					   ;
			 return $attributes;
			}
	} 	

	// } else {
	// 		echo '<h1 style="color: #FF5DBD">';
	// 		echo 'Broken';
	// 		echo '</h1>';
	// }
}

/*
Filtering for Genesis Footer
=========================================== */

add_filter( 'genesis_attr_site-footer', 'genfound_site_footer' );
	function genfound_site_footer( $attributes ) {
	 
	 $attributes['class'] .= ' ' . 'row';
	 return $attributes;
	}