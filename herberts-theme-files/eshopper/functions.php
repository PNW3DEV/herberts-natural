<?php
/**
 * eshopper functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage eshopper
 * @since eshopper 1.0
 */

define('THEMENAME', 'eshopper');
define('THEMEVER', '1.4.2');
define('THEMEURI', get_template_directory_uri());
define('THEMEDIR', get_template_directory());

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1100;

/**
 * eshopper setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 *eshopperr supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since eshopper 1.0
 */
function eshopper_setup() {
	/*
	 * Makes eshopper available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on eshopper, use a find and replace
	 * to change THEMENAME to the name of your theme in all the template files.
	 */
	load_theme_textdomain( THEMENAME, get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'gallery', 'link', 'quote', 'audio' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', THEMENAME ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', THEMENAME ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	/*add_theme_support( 'custom-background', array(
		'default-color' => 'fff',
	) );*/

	add_theme_support( 'woocommerce' );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1000, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'eshopper_setup' );


/**
 * Filters the Theme Option header list.
 */
function eshopper_filter_header_list() {
   echo '<li id="theme-version"><span>eshopper ' . THEMEVER . '</span></li>';
}
add_action( 'ot_header_list', 'eshopper_filter_header_list' );

/**
 * Theme Mode
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Show Settings Pages
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Show Theme Options UI Builder
 */
add_filter( 'ot_show_options_ui', '__return_false' );

/**
 * Show Settings Import
 */
add_filter( 'ot_show_settings_import', '__return_false' );

/**
 * Show Settings Export
 */
add_filter( 'ot_show_settings_export', '__return_false' );

/**
 * Show New Layout
 */
add_filter( 'ot_show_new_layout', '__return_true' );

/**
 * Show Documentation
 */
add_filter( 'ot_show_docs', '__return_false' );

/**
 * Custom Theme Option page
 */
add_filter( 'ot_use_theme_options', '__return_true' );

/**
 * Meta Boxes
 */
add_filter( 'ot_meta_boxes', '__return_true' );

/**
 * Loads the meta boxes for post formats
 */
add_filter( 'ot_post_formats', '__return_true' );

/**
 * OptionTree in Theme Mode
 */
 require( trailingslashit( THEMEDIR ) . 'option-tree/ot-loader.php' );
 //require( trailingslashit( THEMEDIR ) . 'option-tree-google-fonts/functions.php' );
 
/**
 * Theme Options
 */
require( trailingslashit( THEMEDIR ) . 'admin/theme-options.php' );
require( trailingslashit( THEMEDIR ) . 'lib/eshopper-plugins.php' );

require THEMEDIR. '/admin/functions.php';
require THEMEDIR. '/inc/functions.php';
