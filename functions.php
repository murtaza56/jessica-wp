<?php 

/**
 * 
 * Theme customizations.
 *
 * @package Heidi
 * @author Angela J. Holden
 * @link https://angelajholden.com
 * @copyright Copyright (c) 2016, Angela Holden Design LLC
 * @license GPL–3.0+
 */

//* Load child theme textdomain
load_child_theme_textdomain('heidi');

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. 
 * All the functions themselves are defined below this setup function.
 * @since 1.0.0
 */
add_action ('genesis_setup', 'heidi_setup', 15);
function heidi_setup() {
	//* Define theme constants
	define( 'Child_Theme_Name', __( 'Heidi', 'heidi' ) );
	define( 'Child_Theme_Url', 'https://angelajholden.com' );
	define( 'Child_Theme_Version', '1.0.0' );

	//* Add theme support
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	) );
	add_theme_support( 'genesis-footer-widgets', 3 );

	//* Unregister layouts with double sidebars
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	//* Unregister secondary sidebar
	unregister_sidebar( 'sidebar-alt' );

	//* Widgets
	include_once(get_stylesheet_directory() . '/includes/widget-areas.php');
}

// Load jQuery
if (!is_admin()) {
	function heidi_scripts_styles() {
	  // Google Fonts
		wp_enqueue_style( 'web-fonts', "//fonts.googleapis.com/css?family=Raleway:400,400i,600|Sacramento" );

		// jQuery
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
	  wp_enqueue_script('jquery');

	  // Base JS
	  wp_register_script('base', get_stylesheet_directory_uri() . "/compiled/base.min.js");
	  wp_enqueue_script('base');
	}
}
add_action("wp_enqueue_scripts", "heidi_scripts_styles", 11);