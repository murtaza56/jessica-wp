<?php 
/**
 * Theme Honey Customizer
 *
 * @package Theme Honey
 * @subpackage Jessica
 * @since Jessica 1.0.0
 */

// Create Logo Setting and Upload Control
add_action('customize_register', 'jessica_logo_customizer_settings');
function jessica_logo_customizer_settings($wp_customize) {
$wp_customize->add_setting('jessica_logo');
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'jessica_logo',
	array(
		'label' 			=> __('Add Your Logo', 'jessica'),
		'section' 		=> 'title_tagline',
		'settings' 		=> 'jessica_logo',
		) 
	));
}

// Create accent color customizer option
add_action('customize_register','jessica_customize_register');
function jessica_customize_register($wp_customize) {
$wp_customize->add_setting('jessica_accent_color', array('default' => '#16a085'));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'jessica_accent_color',
	array(
		'label'      => __('Choose an accent color for your site.', 'jessica'),
		'section'    => 'colors',
		'settings'   => 'jessica_accent_color'
		)
	));
}

// Output custom colors
add_action( 'wp_head', 'jessica_customize_css' );
function jessica_customize_css() { ?>
<style type="text/css">
/* color */
a,
.home-excerpt li span.fa,
.icon-text h2>span.fa,
.home-cta a.cta-button:hover,
.home-cta a.cta-button:active,
.home-cta a.cta-button:focus{color:<?php echo get_theme_mod( 'jessica_accent_color', '#16a085'); ?>}
/* border-color */
a:hover,
a:active,
a:focus,
.nav-primary{border-bottom-color: <?php echo get_theme_mod('jessica_accent_color', '#16a085'); ?>}
/* background */
.home-cta{background:<?php echo get_theme_mod('jessica_accent_color', '#16a085'); ?>;}
</style>
<?php }