<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 */
function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );

// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

// Set wp_mail() to send html emails
add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

// Require the custom options page for Humble Roots Media
require_once( 'inc/humblerootsmedia-options.php' );
require_once( 'inc/humblerootsmedia-enqueue.php' );
require_once( 'inc/humblerootsmedia-pages.php' );
require_once( 'inc/humblerootsmedia-customposts.php' );
require_once( 'inc/humblerootsmedia-admin.php' );
require_once( 'inc/humblerootsmedia-customize.php' );
