<?php

// Initialize Theme
function humblerootsmedia_init() {
  // Check if the Humble Roots theme options are in the database
  $humblerootsmedia_options = get_option( 'theme_humblerootsmedia_options' );
  if ( $humblerootsmedia_options === false ) {
      // Humble Roots options are not saved, get default
      $humblerootsmedia_options = humblerootsmedia_get_default_options();
      add_option( 'theme_humblerootsmedia_options', $humblerootsmedia_options );
  }

  // Add Google Font to TinyMCE editor styles
  $font_url = urlencode( '//fonts.googleapis.com/css?family=Lato:400,300,700,900' );
  add_editor_style( $font_url );

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

  // Register Menu Locations
  register_nav_menus( array(
    'pages' => 'Pages Menu',
    'socialmedia' => 'Social Media Menu',
  ));

  // Check if the menus exists
  $menu_name = 'Pages Menu';
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
    $locations['pages'] = $menu_id;  //$foo is term_id of menu
    set_theme_mod('nav_menu_locations', $locations);
  }

  $menu_name = 'Social Media Menu';
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
    $locations['socialmedia'] = $menu_id;  //$foo is term_id of menu
    set_theme_mod('nav_menu_locations', $locations);
  }
}
add_action( 'after_setup_theme', 'humblerootsmedia_init' );
