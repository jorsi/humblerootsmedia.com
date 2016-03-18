<?php
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



  // Add default posts and comments RSS feed links to head
  add_theme_support( 'automatic-feed-links' );
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




  // Enqueue Scripts and Stylesheets
  add_action( 'wp_enqueue_scripts', 'humblerootsmedia_enqueue' );
  function humblerootsmedia_enqueue() {

      wp_enqueue_style( 'humblerootsmedia_style', get_stylesheet_uri() );
      wp_enqueue_style( 'humblerootsmedia_style_normalize', get_template_directory_uri().'/styles/normalize.css' );
      wp_enqueue_style( 'humblerootsmedia_style_googlefonts', 'https://fonts.googleapis.com/css?family=Lato:400,300,700,900' );
      wp_enqueue_style( 'humblerootsmedia_style_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
      wp_enqueue_style( 'humblerootsmedia_style_main', get_template_directory_uri().'/styles/main.css' );

      // Register updated version of jQuery
      wp_deregister_script('jquery');
      wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js", false, null);
      wp_enqueue_script('jquery');

      wp_enqueue_script( 'humblerootsmedia_script_instafeed', get_template_directory_uri().'/js/instafeed.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_parallax', get_template_directory_uri().'/js/jquery.parallax.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_smoothscroll', get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_main', get_template_directory_uri().'/js/main.js', array('jquery'));

      /**
       * Adds JavaScript to pages with the comment form to support
       * sites with threaded comments (when in use).
       */
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
          wp_enqueue_script( 'comment-reply' );
  }

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




// Add Humble Roots Media Theme Options
function humblerootsmedia_menu_options() {
  add_theme_page(
    'Humble Roots Settings',  // Title for the page
    'Humble Roots',           // Text for the menu
    'manage_options',         // Who has privileges to see it
    'humblerootsmedia-settings',        // Page slug
    'humblerootsmedia_settings_display'  // Callback function
  );
}
add_action('admin_menu', 'humblerootsmedia_menu_options');

function humblerootsmedia_settings_display() {
?>
  <div class="wrap">
    <h2>Humble Roots Media Theme Settings</h2>
    <?php
    // Check to see if data has been posted back
    if( isset($_POST[ 'humblerootsmedia_submit_hidden' ]) && $_POST[ 'humblerootsmedia_submit_hidden' ] == 'Y' ) {
        // Save the posted value in the database
        update_option( 'frontpage_splash_title', $_POST[ 'frontpage_splash_title' ] );
        update_option( 'frontpage_splash_tagline', $_POST[ 'frontpage_splash_tagline' ] );
        update_option( 'frontpage_intro', $_POST[ 'frontpage_intro' ] );
        update_option( 'frontpage_midtro', $_POST[ 'frontpage_midtro' ] );
        update_option( 'frontpage_outro', $_POST[ 'frontpage_outro' ] );

        // Put a "settings saved" message on the screen
        ?>
        <div class="updated"><p><strong>Settings saved.</strong></p></div>
    <?php
    }
    ?>
    <form method="post" action="">
      <input type="hidden" name="humblerootsmedia_submit_hidden" value="Y">
      <?php
        settings_fields('frontpage_section');
        do_settings_sections('humblerootsmedia-settings');
        submit_button();
      ?>
    </form>
  </div>
<?php
}

// Register settings for the Humble Roots Media theme
add_action('admin_init', function() {

  // Add the Front Page section
  add_settings_section(
    'frontpage_section',           // ID of the this section
    'Frontpage Section',           // Title of the this section
    'display_frontpage_section',   // Callback function for displaying section
    'humblerootsmedia-settings'              // ID of the page that this section is for
  );

  // Add fields to the Front Page section
  add_settings_field(
    'frontpage_splash_title',           // ID of this settings field
    'Splash Title',                // Title of this settings field
    'display_frontpage_splash_title',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_splash_tagline',           // ID of this settings field
    'Splash Tagline',                // Title of this settings field
    'display_frontpage_splash_tagline',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_intro',           // ID of this settings field
    'Intro Text',                // Title of this settings field
    'display_frontpage_intro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_midtro',           // ID of this settings field
    'Midtro Text',                // Title of this settings field
    'display_frontpage_midtro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_outro',           // ID of this settings field
    'Outro Text',                // Title of this settings field
    'display_frontpage_outro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  // Register Setting
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'frontpage_splash_title'            // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'frontpage_splash_tagline'            // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'frontpage_intro'            // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'frontpage_midtro'            // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'frontpage_outro'             // ID of the field to register to
  );
});

function display_frontpage_section() {
  echo 'These settings change various text and styling options on the front page of Humble Roots Media.';
}
function display_frontpage_splash_image() {
    ?>
        <img src="">
        <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wptuts' ); ?>" />
        <span class="description"><?php _e('Upload an image for the banner.', 'wptuts' ); ?></span>
    <?php
}
function display_frontpage_splash_title() {
  echo '<input type="text" class="large-text" name="frontpage_splash_title" value="'. stripslashes( get_option('frontpage_splash_title') ) . '">';
}
function display_frontpage_splash_tagline() {
  echo '<input type="text" class="large-text" name="frontpage_splash_tagline" value="'. stripslashes( get_option('frontpage_splash_tagline') ) . '">';
}
function display_frontpage_intro() {
  echo '<input type="text" class="large-text" name="frontpage_intro" value="'. stripslashes( get_option('frontpage_intro') ) . '">';
}
function display_frontpage_midtro() {
  echo '<input type="text" class="large-text" name="frontpage_midtro" value="'. stripslashes( get_option('frontpage_midtro') ) . '">';
}
function display_frontpage_outro() {
  echo '<input type="text" class="large-text" name="frontpage_outro" value="'. stripslashes( get_option('frontpage_outro') ) . '">';
}