<?php
	$functions_path = get_template_directory() . '/functions/';
	$includes_path = get_template_directory() . '/includes/';
	//Loading jQuery and Scripts
	require_once $includes_path . 'theme-scripts.php';
	//Widget and Sidebar
	require_once $includes_path . 'sidebar-init.php';
	require_once $includes_path . 'register-widgets.php';
	//Theme initialization
	require_once $includes_path . 'theme-init.php';
	//Additional function
	require_once $includes_path . 'theme-function.php';
	//Shortcodes
	require_once $includes_path . 'theme_shortcodes/shortcodes.php';
	include_once(get_template_directory() . '/includes/theme_shortcodes/alert.php');
	include_once(get_template_directory() . '/includes/theme_shortcodes/tabs.php');
	include_once(get_template_directory() . '/includes/theme_shortcodes/toggle.php');
	include_once(get_template_directory() . '/includes/theme_shortcodes/html.php');
	//tinyMCE includes
	include_once(get_template_directory() . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	//Loading theme textdomain
	load_theme_textdomain( 'theme1599', get_template_directory() . '/languages' );
	if ( ! isset( $content_width ) ) $content_width = 900;
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	/*
	 * Loads the Options Panel
	 *
	 * If you're loading from a child theme use stylesheet_directory
	 * instead of template_directory
	*/
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	// Custom excpert length
	function new_excerpt_length($length) {
	return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
/*	
	// Register Theme Features
	function custom_theme_features()  {

		// Add theme support for Custom Background
		$background_args = array(
			'default-color'          => '',
			'default-image'          => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $background_args );
		// Add theme support for Custom Header
		$header_args = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-width'             => false,
			'flex-height'            => false,
			'random-default'         => false,
			'header-text'            => false,
			'default-text-color'     => '',
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $header_args );
	}
	// Hook into the 'after_setup_theme' action
	add_action( 'after_setup_theme', 'custom_theme_features' );
*/	
?>