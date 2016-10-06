<?php 

/**
 * 
 * Theme customizations.
 *
 * @package Jessica
 * @author Angela J. Holden
 * @link https://themehoney.com
 * @copyright Copyright (c) 2016, Angela Holden Design LLC
 * @license GPL–3.0+
 */

//* Load child theme textdomain
load_child_theme_textdomain('jessica');

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. 
 * All the functions themselves are defined below this setup function.
 * @since 1.0.0
 */
add_action ('genesis_setup', 'jessica_setup', 15);

function jessica_setup() {

	//* Define theme constants
	define( 'Child_Theme_Name', __( 'Jessica', 'jessica' ) );
	define( 'Child_Theme_Url', 'https://themehoney.com' );
	define( 'Child_Theme_Version', '1.0.0' );

	//* Add theme support
	add_theme_support( 'html5', array( 
		'comment-list', 
		'comment-form', 
		'search-form', 
		'gallery', 
		'caption'  
	) );

	add_theme_support( 'genesis-responsive-viewport' );

	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	) );

	//* Footer Widgets
	add_theme_support( 'genesis-footer-widgets', 4 );

	//* Remove .wrap by omitting from the array
	add_theme_support( 'genesis-structural-wraps', array( 
		'header', 
		'footer-widgets', 
		'footer' 
	) );

	//* Unregister layouts with double sidebars
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	//* Unregister secondary sidebar
	unregister_sidebar( 'sidebar-alt' );

	//* Unregister secondary navigation menu
	add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

	//* Slider
	include_once (get_stylesheet_directory() . '/cpt/slider.php');

	//* Customizer
	include_once (get_stylesheet_directory() . '/customizer/customizer.php');

	//* Shortcodes
	include_once (get_stylesheet_directory() . '/shortcodes/shortcodes.php');

	//* Widgets
	include_once (get_stylesheet_directory() . '/widgets/widgets.php');

	//* Title & Logo
	remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
	add_action( 'genesis_site_title', 'jessica_site_title' );
	function jessica_site_title() {
		if ( get_theme_mod( 'jessica_logo' ) ) : ?>
			<a class="site-title-logo" href="<?php bloginfo('url'); ?>">
				<img src="<?php echo get_theme_mod( 'jessica_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
			</a>
		<?php else : ?>
			<div class="site-title">
				<a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a>
			</div>
		<?php endif;
	}

	// Filter the Footer
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	add_action( 'genesis_footer', 'jessica_custom_footer' );
	function jessica_custom_footer() {
		?>
		<p class="copyright">Copyright <?php echo date('Y'); ?> &copy; <?php bloginfo('title'); ?></p>
		<?php
	}

}

//* Load Scripts & Styles
if (!is_admin()) {
	function jessica_scripts_styles() {
	  //* Google Fonts
		wp_enqueue_style( 'web-fonts', "//fonts.googleapis.com/css?family=Tinos:400,700,400italic" );

		//* jQuery
	  wp_deregister_script('jquery');
	  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
	  wp_enqueue_script('jquery');

	  //* Base JS
	  wp_register_script('base', get_stylesheet_directory_uri() . "/compiled/base.min.js");
	  wp_enqueue_script('base');
	}
}
add_action("wp_enqueue_scripts", "jessica_scripts_styles", 11);

//* Show Featured Images in Admin
function ajh_get_featured_image($post_ID) {
  $post_thumbnail_id = get_post_thumbnail_id($post_ID);
  if ($post_thumbnail_id) {
      $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
    return $post_thumbnail_img[0];
  }
}
function ajh_columns_head($defaults) {
  $defaults['featured_image'] = 'Images';
	return $defaults;
}
function ajh_columns_content($column_name, $post_ID) {
  if ($column_name == 'featured_image') {
      $post_featured_image = ajh_get_featured_image($post_ID);
    if ($post_featured_image) {
        echo '<img src="' . $post_featured_image . '" />';
    }
  }
}
add_filter('manage_posts_columns', 'ajh_columns_head');
add_action('manage_posts_custom_column', 'ajh_columns_content', 10, 2);
add_filter('manage_pages_columns', 'ajh_columns_head');
add_action('manage_pages_custom_column', 'ajh_columns_content', 10, 2);

//* Show Image Dimensions in Media Library
function wh_column( $cols ) {
  $cols["dimensions"] = "Dimensions (w, h)";
  return $cols;
}
function wh_value( $column_name, $id ) {
  $meta = wp_get_attachment_metadata($id);
     if(isset($meta['width']))
     echo $meta['width'].' x '.$meta['height'];
}
add_filter( 'manage_media_columns', 'wh_column' );
add_action( 'manage_media_custom_column', 'wh_value', 10, 2 );