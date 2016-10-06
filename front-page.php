<?php 

/**
 * 
 * The homepage template.
 *
 * @package Heidi
 * @author Angela J. Holden
 * @link http://heidi.themehoney.com
 * @copyright Copyright (c) 2016, Angela Holden Design LLC
 * @license GPL–3.0+
 */

// Responsive Slider
add_action('genesis_after_header', 'homepage_slider');
function homepage_slider() {
	get_template_part('includes/home', 'slider');
}

// Homepage content and layout
add_action('genesis_before_content_sidebar_wrap', 'homepage_content');
function homepage_content() {
	get_template_part('includes/home', 'page');
}

// Remove genesis loop and force full width layout
add_action( 'genesis_meta', 'themehoney_homepage_setup' );
function themehoney_homepage_setup() {
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
}

genesis();