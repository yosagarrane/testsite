<?php
/**
 * curtains functions and definitions
 *
 * @package curtains
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'curtains_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function curtains_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on curtains, use a find and replace
	 * to change 'curtains' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'curtains', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'curtains' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'curtains_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Add Additional image sizes
	 *
	 */
	add_image_size( 'curtains_recent_posts_img', 300, 300, true );
	add_image_size( 'curtains_home_page_img', 130, 130, true );
    add_image_size( 'curtains-small-featured-image-width', 450,300, true );
	add_image_size( 'curtains-blog-large-width', 800,300, true );
	add_image_size( 'curtains-blog-full-width', 1200,350, true );

}
endif; // curtains_setup
add_action( 'after_setup_theme', 'curtains_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function curtains_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'curtains' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Left', 'curtains' ),
		'id'            => 'top-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Right', 'curtains' ),
		'id'            => 'top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebars( 4, array(
		'name'          => __( 'Footer %d', 'curtains' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav', 'curtains' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'curtains_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/**
 * Load Filter and Hook functions
 */
require get_template_directory() . '/includes/hooks-filters.php';

/* Woocommerce support */

add_theme_support('woocommerce');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'curtains_output_content_wrapper');

function curtains_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area eleven columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'curtains_output_content_wrapper_end' );

function curtains_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'curtains_remove_wc_breadcrumbs' );
function curtains_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
