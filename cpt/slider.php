<?php
// CUSTOM POST TYPE
add_action('init', 'register_jessica_slider');
	function register_jessica_slider() {
		$labels = array(
	    'name'               		=> 'Image Slider',
	    'singular_name'      		=> 'Slide',
	    'add_new'            		=> 'Add New',
	    'add_new_item'       		=> 'Add New Slide',
	    'edit_item'          		=> 'Edit Slide',
	    'new_item'           		=> 'New Slide',
	    'search_items'       		=> 'Search Slider',
	    'all_items'							=> 'All Slides',
	    'not_found'          		=> 'No Slides. Add some images to your slider!',
	    'not_found_in_trash' 		=> 'Nothing found in Trash',
	    'menu_name'          		=> 'Slider',
	    'insert_into_item'	 		=> 'Insert into Slider',
			'uploaded_to_this_item'	=> 'Uploaded to this Slider',
			'featured_image'		 		=> 'Slider Image',
			'set_featured_image' 		=> 'Set Slider Image',
			'remove_featured_image'	=> 'Remove Slider Image',
			'use_featured_image' 		=> 'Use as Slider Image',
		);
		$args = array(
			'labels'                => $labels,
	    'public'                => false,
	    'publicly_queryable'    => false,
	    'exclude_from_search'		=> false,
	    'show_ui'               => true,
	    'query_var'             => false,
	    'menu_icon'             => 'dashicons-images-alt',
	    'rewrite'               => false,
	    'capability_type'       => 'post',
	    'hierarchical'          => false,
	    'has_archive'						=> false,
	    'can_export'						=> false,
	    'menu_position'         => 20,
	    'supports'              => array('title', 'thumbnail'),
	  ); 
	register_post_type( 'jessica_slider' , $args );
};
	// Flush Permalinks Upon Activation
	function jessica_rewrite_flush() {
	  register_jessica_slider();
	  flush_rewrite_rules();
	}
register_activation_hook( __FILE__, 'jessica_rewrite_flush' );

add_action('do_meta_boxes', 'jessica_move_meta_box');
function jessica_move_meta_box(){
  remove_meta_box( 'postimagediv', 'jessica_slider', 'side' );
  add_meta_box('postimagediv', __('Slider Image'), 'post_thumbnail_meta_box', 'jessica_slider', 'normal', 'high');
}