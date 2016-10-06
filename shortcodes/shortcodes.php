<?php 
// Homepage Text Area
add_shortcode( 'textarea', 'text_area' );
function text_area( $atts , $content = null ) {
	return '<aside class="home-blurb"><div class="wrap"><p>'.$content.'</p></div></aside>';
}

// Icons
add_shortcode( 'iconarea', 'icon' );
function icon( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'icon' => '',
			'title' => '',
		),
		$atts,
		'iconarea'
	);
	return '<div class="icon-text"><h2><span class="fa '.$atts['icon'].'"></span>'.$atts['title'].'</h2><p>'.$content.'</p></div>';
}

// Call to Action
add_shortcode( 'calltoaction', 'cta' );
function cta( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'link' => '',
			'button' => '',
			'title' => '',
		),
		$atts,
		'calltoaction'
	);
	return '<aside class="home-cta clear"><div class="wrap"><div class="cta-text"><h3>'.$atts['title'].'</h3><p>'.$content.'</p></div><a class="cta-button" href="'.$atts['link'].'"><span>'.$atts['button'].'</span></a></div></aside>';
}