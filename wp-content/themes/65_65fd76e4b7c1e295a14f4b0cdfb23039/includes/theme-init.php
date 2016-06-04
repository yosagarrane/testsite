<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 151, true ); // Normal post thumbnails
		add_image_size( 'post-thumbnail-xl', 440, 198, true ); // Post Extra Large Thumbnail
		add_image_size( 'slider-post-thumbnail', 900, 533, true ); // Slider Thumbnail
		add_image_size( 'portfolio-post-thumbnail', 281, 189, true ); // Portfolio Thumbnail
		add_image_size( 'portfolio-post-thumbnail-small', 200, 150, true ); // Portfolio Small Thumbnail
		add_image_size( 'portfolio-post-thumbnail-large', 440, 261, true ); // Portfolio Large Thumbnail
		add_image_size( 'portfolio-post-thumbnail-xl', 520, 261, true ); // Portfolio Extra Large Thumbnail
		add_image_size( 'small-post-thumbnail', 98, 98, true ); // Small Thumbnail
		add_image_size( 'big-post-thumbnail', 368, 178, true ); // Big Thumbnail
		add_image_size( 'testi-thumbnail', 220, 274, true ); // Testimonial Thumbnail
		add_image_size( 'extra-thumbnail', 212, 163, true ); // Extra Thumbnail
		add_image_size( 'news-thumbnail', 118, 118, true ); // News Thumbnail
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu_left' => 'Header Menu Left',
			  'header_menu_right' => 'Header Menu Right',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;


/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slides', 'theme1599'), 
				'singular_label' => __('Slide', 'theme1599'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'slide-view',
					'with_front' => FALSE,
				),
				'query_var' => "slide", // This goes to the WP_Query schema
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_slider');



/* Portfolio */
function my_post_type_portfolio() {
	register_post_type( 'portfolio',
                array( 
				'label' => __('Portfolio', 'theme1599'), 
				'singular_label' => __('Porfolio Item', 'theme1599'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					'slug' => 'portfolio-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_portfolio');



/* Services */
function my_post_type_services() {
	register_post_type( 'services',
                array( 
				'label' => __('Services', 'theme1599'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'services-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor',
						'excerpt')
					) 
				);
}

add_action('init', 'my_post_type_services');




/* Extra */
function my_post_type_extra() {
	register_post_type( 'extra',
                array( 
				'label' => __('Extra posts', 'theme1599'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'extra-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor',
						'excerpt')
					) 
				);
}

add_action('init', 'my_post_type_extra');



/* Our Team */
function my_post_type_friends() {
	register_post_type( 'friends',
                array( 
				'label' => __('Friends', 'theme1599'), 
				'singular_label' => __('Person', 'theme1599'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'friends-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
						'excerpt',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_friends');



?>