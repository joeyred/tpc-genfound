<?php

	/*
	 * Register Font Page Widgets
	 */
		// Register Front Page Landing Main widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-landing-section-1',
			'name'          => __( 'Front Page Landing Main', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Main Landing widget area', CHILD_DOMAIN ),
		) );

		// Register Front Call to Action Landing widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-landing-section-2',
			'name'          => __( 'Front Page Landing Call-to-Action', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Call to Action Landing widget area', CHILD_DOMAIN ),
		) );

		// Register Front Page Row 2 widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-row-2',
			'name'          => __( 'Front Page Row 2', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Row 2 widget area', CHILD_DOMAIN ),
		) );

		// Register Front Page Row 3 widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-row-3',
			'name'          => __( 'Front Page Row 3', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Row 3 widget area', CHILD_DOMAIN ),
		) );

		// Register Front Page Row 4 widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-row-4',
			'name'          => __( 'Front Page Row 4', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Row 4 widget area', CHILD_DOMAIN ),
		) );

		// Register Front Page Row 5 widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-row-5',
			'name'          => __( 'Front Page Row 5', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Row 5 widget area', CHILD_DOMAIN ),
		) );

		// Register Front Page Row 6 widget area
		genesis_register_sidebar( array(
			'id'            => 'front-page-row-6',
			'name'          => __( 'Front Page Row 6', CHILD_DOMAIN ),
			'description'   => __( 'This is the Front Page Row 6 widget area', CHILD_DOMAIN ),
		) );

	/*
	 * Register Footer Widgets
	 */
		// Register Primary Footer widget area
		genesis_register_sidebar( array(
			'id'            => 'primary-footer',
			'name'          => __( 'Primary Footer', CHILD_DOMAIN ),
			'description'   => __( 'This is the Primary Footer widget area', CHILD_DOMAIN ),
		) );

		// Register Sub Footer widget area
		genesis_register_sidebar( array(
			'id'            => 'sub-footer',
			'name'          => __( 'Sub Footer', CHILD_DOMAIN ),
			'description'   => __( 'This is the Sub Footer widget area', CHILD_DOMAIN ),
		) );

		// Register Sub Sub Footer widget area
		genesis_register_sidebar( array(
			'id'            => 'sub-sub-footer',
			'name'          => __( 'Sub Sub Footer', CHILD_DOMAIN ),
			'description'   => __( 'This is the Sub Sub Footer widget area', CHILD_DOMAIN ),
		) );
		
	/*
	 * Register Single Post Page Widgets
	 */	
		// Register after article widget area
		genesis_register_sidebar( array(
			'id'            => 'after-entry-single',
			'name'          => __( 'After Article', CHILD_DOMAIN ),
			'description'   => __( 'This is the after article widget area', CHILD_DOMAIN ),
		) );
	
	/*
	 * Register Blog Home Widgets
	 */
		// Register subscribe section widget area
		genesis_register_sidebar( array(
			'id'            => 'blog-home-subscribe',
			'name'          => __( 'Blog Home - Subscribe Section', CHILD_DOMAIN ),
			'description'   => __( 'This is the subscribe section widget area', CHILD_DOMAIN ),
		) );

		// Register ads section widget area
		genesis_register_sidebar( array(
			'id'            => 'blog-home-ads',
			'name'          => __( 'Blog Home - Ads Section', CHILD_DOMAIN ),
			'description'   => __( 'This is the ads section widget area', CHILD_DOMAIN ),
		) );
	