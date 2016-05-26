<?php

// Add custom header support
$args = array(
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 675,
	'default-image' => get_template_directory_uri() . '/images/camera.jpg',
);
add_theme_support( 'custom-header', $args );

// Add featured image support for posts and pages
// Featured image will override header image if it is larger
add_theme_support( 'post-thumbnails' );
