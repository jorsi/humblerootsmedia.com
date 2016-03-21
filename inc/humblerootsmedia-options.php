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
       * Adds Page specific styles and scripts
       */
      if ( is_page( 'Clientele') )
        wp_enqueue_style( 'humblerootsmedia_style_clientele', get_stylesheet_directory_uri() . '/styles/clientele.css');
      if ( is_page( 'Humble Thoughts') )
        wp_enqueue_style( 'humblerootsmedia_style_humble-thoughts', get_stylesheet_directory_uri() . '/styles/humble-thoughts.css');
      if ( is_page( 'Contact') )
        wp_enqueue_style( 'humblerootsmedia_style_contact', get_stylesheet_directory_uri() . '/styles/contact.css');
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




// Custom Post Types
function humblerootsmedia_custom_posts() {
  $labels = array(
    'name'               => _x( 'Productions', 'post type general name' ),
    'singular_name'      => _x( 'Production', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Production' ),
    'edit_item'          => __( 'Edit Production' ),
    'new_item'           => __( 'New Production' ),
    'all_items'          => __( 'All Productions' ),
    'view_item'          => __( 'View Production' ),
    'search_items'       => __( 'Search Productions' ),
    'not_found'          => __( 'No productions found' ),
    'not_found_in_trash' => __( 'No productions found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Productions'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Productions videos for display on the front page',
    'public'        => true,
    'menu_position' => 4,
    'menu_icon'     => 'dashicons-video-alt',
    'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
    'register_meta_box_cb' => 'add_productions_metaboxes',
    'has_archive'   => true,
  );
  // Adds the Testimonial Custom Fields
  function add_productions_metaboxes() {
    add_meta_box('productions_video_description', 'Video Description', 'productions_video_desc_display', 'production', 'normal', 'default');
      add_meta_box('productions_video_uri', 'Video Source', 'productions_video_uri_display', 'production', 'normal', 'default');
  }
  // The Production Metaboxes
  function productions_video_desc_display() {
  	global $post;

  	// Noncename needed to verify where the data originated
  	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

  	// Get the location data if its already been entered
  	$location = get_post_meta($post->ID, 'productions_video_description', true);

  	// Echo out the field
  	echo '<input type="text" name="productions_video_description" value="' . $location  . '" class="widefat" />';
  }
  function productions_video_uri_display() {
  	global $post;

  	// Noncename needed to verify where the data originated
  	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

  	// Get the location data if its already been entered
  	$location = get_post_meta($post->ID, 'productions_video_uri', true);

  	// Echo out the field
  	echo '<input type="text" name="productions_video_uri" value="' . $location  . '" class="widefat" />';
  }

  // Save the Metabox Data
  function productions_save_data($post_id, $post) {

  	// verify this came from the our screen and with proper authorization,
  	// because save_post can be triggered at other times
  	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
  	   return $post->ID;
  	}

  	// Is the user allowed to edit the post or page?
  	if ( !current_user_can( 'edit_post', $post->ID ))
  		return $post->ID;

  	// OK, we're authenticated: we need to find and save the data
  	// We'll put it into an array to make it easier to loop though.

  	$events_meta['productions_video_uri'] = $_POST['productions_video_uri'];
    $events_meta['productions_video_description'] = $_POST['productions_video_description'];

  	// Add values of $events_meta as custom fields

  	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
  		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
  		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
  		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
  			update_post_meta($post->ID, $key, $value);
  		} else { // If the custom field doesn't have a value
  			add_post_meta($post->ID, $key, $value);
  		}
  		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
  	}
  }
  add_action('save_post', 'productions_save_data', 1, 2); // save the custom fields

  register_post_type( 'production', $args );

  $labels = array(
    'name'               => _x( 'Clientele', 'post type general name' ),
    'singular_name'      => _x( 'Client', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Client' ),
    'edit_item'          => __( 'Edit Client' ),
    'new_item'           => __( 'New Client' ),
    'all_items'          => __( 'All Clientele' ),
    'view_item'          => __( 'View Client' ),
    'search_items'       => __( 'Search Clientele' ),
    'not_found'          => __( 'No clientele found' ),
    'not_found_in_trash' => __( 'No clientele found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Clientele'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Clientele for display on the clientele pages',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-universal-access',
    'supports'      => array( 'title', 'thumbnail', 'page-attributes', ),
    'has_archive'   => true,
  );
  register_post_type( 'client', $args );

  $labels = array(
    'name'               => _x( 'Testimonials', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonial' ),
    'search_items'       => __( 'Search Testimonials' ),
    'not_found'          => __( 'No Testimonials found' ),
    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Testimonial to display on the clientele page',
    'public'        => true,
    'menu_position' => 6,
    'menu_icon'     => 'dashicons-id',
    'supports'      => array( 'title', 'thumbnail', 'page-attributes' ),
    'register_meta_box_cb' => 'add_testimonial_metaboxes',
    'has_archive'   => true,
  );
  // Adds the Testimonial Custom Fields
  function add_testimonial_metaboxes() {
      add_meta_box('testimonial_quote', 'Testimonial Quote', 'testimonial_quote_display', 'testimonial', 'normal', 'default');
  }
  // The Testimonial Quote Metabox
  function testimonial_quote_display() {
  	global $post;

  	// Noncename needed to verify where the data originated
  	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

  	// Get the location data if its already been entered
  	$location = get_post_meta($post->ID, 'testimonial_quote', true);

  	// Echo out the field
  	echo '<input type="text" name="testimonial_quote" value="' . $location  . '" class="widefat" />';
  }
    // Save the Metabox Data

  function testimonial_save_data($post_id, $post) {

  	// verify this came from the our screen and with proper authorization,
  	// because save_post can be triggered at other times
  	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
  	return $post->ID;
  	}

  	// Is the user allowed to edit the post or page?
  	if ( !current_user_can( 'edit_post', $post->ID ))
  		return $post->ID;

  	// OK, we're authenticated: we need to find and save the data
  	// We'll put it into an array to make it easier to loop though.

  	$events_meta['testimonial_quote'] = $_POST['testimonial_quote'];

  	// Add values of $events_meta as custom fields

  	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
  		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
  		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
  		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
  			update_post_meta($post->ID, $key, $value);
  		} else { // If the custom field doesn't have a value
  			add_post_meta($post->ID, $key, $value);
  		}
  		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
  	}

  }
  add_action('save_post', 'testimonial_save_data', 1, 2); // save the custom fields

  register_post_type( 'testimonial', $args );
}
add_action( 'init', 'humblerootsmedia_custom_posts' );





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

        update_option('clientele_splash_title', $_POST[ 'clientele_splash_title' ] );
        update_option('clientele_splash_tagline', $_POST[ 'clientele_splash_tagline' ] );
        update_option('clientele_max_clients', $_POST[ 'clientele_max_clients' ] );
        update_option('clientele_max_testimonials', $_POST[ 'clientele_max_testimonials' ] );

        // Put a "settings saved" message on the screen
        ?>
        <div class="updated"><p><strong>Settings saved.</strong></p></div>
    <?php
    }
    ?>
    <form method="post" action="">
      <input type="hidden" name="humblerootsmedia_submit_hidden" value="Y">
      <?php
        settings_fields('humblerootsmedia_section');
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
    'humblerootsmedia_section',           // ID of the this section
    'Humble Roots Media Custom Settings', // Title of the this section
    'display_humblerootsmedia_section',   // Callback function for displaying section
    'humblerootsmedia-settings'    // ID of the page that this section is for
  );

  // Add fields to the Front Page section
  add_settings_field(
    'frontpage_splash_title',           // ID of this settings field
    'Splash Title',                // Title of this settings field
    'display_frontpage_splash_title',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_splash_tagline',           // ID of this settings field
    'Splash Tagline',                // Title of this settings field
    'display_frontpage_splash_tagline',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_intro',           // ID of this settings field
    'Intro Text',                // Title of this settings field
    'display_frontpage_intro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_midtro',           // ID of this settings field
    'Midtro Text',                // Title of this settings field
    'display_frontpage_midtro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'frontpage_outro',           // ID of this settings field
    'Outro Text',                // Title of this settings field
    'display_frontpage_outro',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );

  add_settings_field(
    'clientele_splash_title',           // ID of this settings field
    'Clientle Splash Title',                // Title of this settings field
    'display_clientele_splash_title',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );
  add_settings_field(
    'clientele_splash_tagline',           // ID of this settings field
    'Clientele Splash Tagline',                // Title of this settings field
    'display_clientele_splash_tagline',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );
  add_settings_field(
    'clientele_max_clients',           // ID of this settings field
    'Max amount of Clients to display',                // Title of this settings field
    'display_clientele_max_clients',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
  );
  add_settings_field(
    'clientele_max_testimonials',           // ID of this settings field
    'Max amount of Testimonials to display',                // Title of this settings field
    'display_clientele_max_testimonials',   // Callback function for displaying this field
    'humblerootsmedia-settings',                  // ID of the page this field is for
    'humblerootsmedia_section'                 // ID of the sectino this field is for
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
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'clientele_splash_title'             // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'clientele_splash_tagline'             // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'clientele_max_clients'             // ID of the field to register to
  );
  register_setting(
    'humblerootsmedia-settings',                  // ID of the page to register to
    'clientele_max_testimonials'             // ID of the field to register to
  );
});

function display_humblerootsmedia_section() {
  echo 'These settings change various text and styling options on the pages of Humble Roots Media.';
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
function display_clientele_splash_title() {
  echo '<input type="text" class="large-text" name="clientele_splash_title" value="'. stripslashes( get_option('clientele_splash_title') ) . '">';
}
function display_clientele_splash_tagline() {
  echo '<input type="text" class="large-text" name="clientele_splash_tagline" value="'. stripslashes( get_option('clientele_splash_tagline') ) . '">';
}
function display_clientele_max_clients() {
  echo '<input type="number" name="clientele_max_clients" value="'. get_option('clientele_max_clients') . '">';
}
function display_clientele_max_testimonials() {
  echo '<input type="number" name="clientele_max_testimonials" value="'. get_option('clientele_max_testimonials') . '">';
}
