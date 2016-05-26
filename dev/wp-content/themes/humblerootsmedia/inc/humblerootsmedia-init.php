<?php

// Initialize Theme
add_action( 'after_setup_theme', 'humblerootsmedia_init' );
function humblerootsmedia_init() {

  // Add Theme Supports
  require_once( 'humblerootsmedia-customsupport.php' );

  // Attempt to increase upload size
  @ini_set( 'upload_max_size' , '64M' );
  @ini_set( 'post_max_size', '64M');
  @ini_set( 'max_execution_time', '300' );

  // Removes width and height attributes from image tags
  add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
  add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );
  function remove_image_size_attributes( $html ) {
      return preg_replace( '/(width|height)="\d*"/', '', $html );
  }

  add_filter('the_content', 'filter_ptags_on_images');
  function filter_ptags_on_images($content){
     return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }

  // Set wp_mail() to send html emails
  add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

  add_filter('user_contactmethods','new_contactmethods',10,1);
  function new_contactmethods( $contactmethods ) {

    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';

    // Add Facebook
    $contactmethods['facebook'] = 'Facebook';

    // Add Facebook
    $contactmethods['instagram'] = 'Instagram';
    return $contactmethods;
  }

  // Register Menu Locations
  register_nav_menus( array(
    'pages' => 'Pages Menu'
  ));

  // Check if the menus exists
  $menu_name = 'Humble Roots Media Menu';
  $menu_exists = wp_get_nav_menu_object( $menu_name );

  // If it doesn't exist, let's create it.
  if( !$menu_exists){
      $menu_id = wp_create_nav_menu($menu_name);

  	// Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  'Clientele',
        'menu-item-classes' => 'clientele',
        'menu-item-url' => home_url( '/clientele' ),
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  'Humble Thoughts',
        'menu-item-url' => home_url( '/humble-thoughts/' ),
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  'Contact',
        'menu-item-url' => home_url( '/contact/' ),
        'menu-item-status' => 'publish'));

    $locations = get_theme_mod('nav_menu_locations');
    $locations['pages'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
  }
}
