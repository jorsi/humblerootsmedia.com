<?php

// Initialize Theme
function humblerootsmedia_init() {
  // Remove Auto <p> tags
  remove_filter( 'the_content', 'wpautop' );
  remove_filter( 'the_excerpt', 'wpautop' );

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

  // Set-up Default Pages
  if (isset($_GET['activated']) && is_admin()) {

    $new_page_title = 'Clientele';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    $new_page_title = 'Humble Thoughts';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    $new_page_title = 'Contact';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }
  }

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

// Default Options
function humblerootsmedia_get_default_options() {
    $options = array(
        // Frontpage Section Options
        'frontpage_splash_image_url' => '',
        'frontpage_splash_video_url' => '',
        'frontpage_splash_title' => '',
        'frontpage_splash_tagline' => '',
        'frontpage_splash_button_text' => '',

        'frontpage_intro' => '',
        'frontpage_intro_color' => '',
        'frontpage_intro_bgcolor' => '',

        'frontpage_midtro' => '',
        'frontpage_midtro_color' => '',
        'frontpage_midtro_bgcolor' => '',

        'frontpage_outro' => '',
        'frontpage_outro_color' => '',
        'frontpage_outro_bgcolor' => '',

        'frontpage_blog_image_url' => '',
        'frontpage_blog_title' => '',
        'frontpage_blog_tagline' => '',
        'frontpage_blog_button_text' => '',

        // Clientele Options
        'clientele_splash_title' => 'How We Work',
        'clientele_splash_tagline' => 'Hear what our clients say about Humble Roots Media',
        'clientele_max_clients' => 3,

        // Blog Options
        // Contact Options

        // Footer Options
        'footer_connect_title' => '',
        'footer_info_title' => '',
        'footer_info_text' => '',
        'footer_contact_title' => '',
        'footer_contact_email' => '',
        'footer_contact_phone' => ''
    );
    return $options;
}
