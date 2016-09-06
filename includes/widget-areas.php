<?php

/**
 * 
 * Widget areas.
 *
 * @package theme-honey
 * @author Angela J. Holden
 * @link https://themehoney.com
 * @copyright Copyright (c) 2016, Angela Holden Design LLC
 * @license GPL–2.0+
 */

//* Register new widget area
genesis_register_sidebar( array(
	'id'            => 'new-widget',
	'name'          => __( 'New Widget', 'heidi' ),
	'description'   => __( 'This is a new widget area.', 'heidi' ),
) );