<?php 

/**
 * 
 * Genesis Theme customization helper notes.
 * These are my notes on how to use actions, hooks and filters.
 *
 * @package Heidi
 * @author Angela J. Holden
 * @link http://heidi.themehoney.com
 * @copyright Copyright (c) 2016, Angela Holden Design LLC
 * @license GPL–3.0+
 */

// Generic Action
add_action( 'hook', 'callback_function', 10, 2 );

// Generic callback function
function callback_function( $arg1, $arg2 ) {
	// Stuff Goes Here
}

/**
 *
 * Refer to the WordPress Codex PHP Coding Standards
 * https://genesistutorials.com/visual-hook-guide
 * The last two parts of the callback_function (the numbers) are not required to write a valid function.
 * 
 * The First Number
 * ================
 * The prioroty number is the order in which code/callback functions are executed in.
 * In WordPress, 10 is the default priority number.
 * So #5 would execute first, #10 would execute second, and #15 would execute third.
 * If no priority is specified, WordPress will see it as a #10.
 * If multiple functions have the same priority for a particular hook, they'll be executed in the order the code occurs.
 * 
 * The Second Number
 * =================
 * The number of accepted arguments that can be passed to the callback_function.
 * If no priority is specified, the default number is 1.
 * 
 * Remove Action
 * =============
 * Remove_action must be the same as add_action counterpart; including the priorities.
 * If it doesn't exist, it can't be removed.
 * Copy and paste the add_action from Genesis Core to functions.php, then change 'add' to 'remove'.
 * 
 * Moving an Action – or unhooking and rehooking
 * =============================================
 * 1) First – remove_action
 * 2) Second – add_action with a lower or higher priority number
 */

// Move the post info above the post title
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // lower priority
add_action( 'genesis_entry_header', 'genesis_post_info', 9 ); // higher priority


// Remove post_meta from footer. Add back in under the post_info.
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_action( 'genesis_entry_header', 'genesis_post_meta', 13 );

/**
 *
 * Change the output of a function
 * ===============================
 */

// Change the post info output
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 ); // same priority
add_action( 'genesis_entry_header', 'change_post_info', 12 ); // same priority
function change_post_info() {
	echo "New Post Information";
}

/**
 *
 * Working with Filters
 * ====================
 * 1) Same premise as adding and removing actions.
 * 2) Can't remove something that doesn't exist. Must match exactly.
 * 3) Actions are about adding or removing chunks of code.
 * 4) Filters add or remove specific pieces of data.
 */

// Generic add_filter
add_filter( 'hook_name', 'function_to_filter', 10, 1 );

// Generic remove_filter
remove_filter( 'hook_name', 'function_to_filter', 10, 1 );

/**
 *
 * Use the Studio Press Filter Reference to find filters.
 * https://my.studiopress.com/docs/filter-reference
 * 
 * Or, use the Visual Hook Guide for core theme hooks.
 * https://genesistutorials.com/visual-hook-guide/
 */

// Filter the comments title
add_filter('genesis_title_comments', 'change_title_comments');
function change_title_comments() {
	$title = "<h3>These are the comments!</h3>";
	return $title;
}

/**
 *
 * Use a conditional statement with actions, hooks and filters.
 */

// Remove site description and only show it on the homepage.
remove_action('genesis_site_description', 'genesis_seo_site_description');
add_action('genesis_site_description', 'home_seo_site_description');
function home_seo_site_description() {
	if(is_home()) {
		genesis_seo_site_description();
	}
}

/**
 *
 * Register a widget called 'after-post' and hook it after the post content.
 */

// Register 'after-post' widget.
genesis_register_sidebar( array(
	'id'		=> 'after-post',
	'name'	=> __('After Post', 'sample'),
	'description'		=> __('This is a widget area that can be placed after the post', 'sample'),
	) );

// Place it beneath the post content.
add_action('genesis_before_comments', 'after_post_widget');
function after_post_widget() {
	if(is_singular('post')) {
		genesis_widget_area('after-post', array(
			'before'	=> '<aside class="after-post widget-area entry">',
			'after'		=> '</aside>',
		) );
	}
}

/**
 *
 * Remove genesis loop from the homepage.
 * Force full-width layout on homepage.
 * These functions go on front-page.php.
 */

add_action( 'genesis_meta', 'themehoney_homepage_setup' );
function themehoney_homepage_setup() {
	// Remove genesis loop
	remove_action( 'genesis_loop', 'genesis_do_loop' );

	// Force full width layout
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
}

/**
 *
 * ---------------------------------------------------------------------
 *  Functions from Lynda course to customize genesis-sample child theme
 * ---------------------------------------------------------------------
 */

// Remove post_meta from footer. Add back in under the post_info
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_action( 'genesis_entry_header', 'genesis_post_meta', 13 );

// Filter the comments title
add_filter('genesis_title_comments', 'change_title_comments');
function change_title_comments() {
	$title = "<h3>These are the comments!</h3>";
	return $title;
}

// Register 'home-widget' widget.
genesis_register_sidebar( array(
	'id'		=> 'home-widget',
	'name'	=> __('Home Widget', 'sample'),
	'description'		=> __('This is the home widget area that can be placed after the site description on the homepage.', 'sample'),
	)
);

// Remove site description and only show on homepage above the content.
remove_action('genesis_site_description', 'genesis_seo_site_description');
add_action('genesis_before_content', 'home_seo_site_description');
function home_seo_site_description() {
	if(is_front_page()) {
		genesis_seo_site_description();
		genesis_widget_area('home-widget', array(
			'before'	=> '<aside class="home-widget widget-area entry">',
			'after'		=> '</aside>',
		) );
	}
}

// Register 'after-post' widget.
genesis_register_sidebar( array(
	'id'		=> 'after-post',
	'name'	=> __('After Post', 'sample'),
	'description'		=> __('This is a widget area that can be placed after the post', 'sample'),
	)
);

// Place after_post widget beneath the post content.
add_action('genesis_before_comments', 'after_post_widget');
function after_post_widget() {
	if(is_singular('post')) {
		genesis_widget_area('after-post', array(
			'before'	=> '<aside class="after-post widget-area entry">',
			'after'		=> '</aside>',
		) );
	}
}

// Register 'my-widget' widget.
genesis_register_sidebar( array(
	'id'		=> 'my-widget',
	'name'	=> __('My Widget', 'sample'),
	'description'		=> __('This is my widget area and it goes beneath the header.', 'sample'),
	)
);

// Place it beneath the post content.
add_action('genesis_after_header', 'my_header_widget');
function my_header_widget() {
	genesis_widget_area('my-widget', array(
		'before'	=> '<aside class="my-widget widget-area site-header"><div class="wrap">',
		'after'		=> '</div></aside>',
	) );
}