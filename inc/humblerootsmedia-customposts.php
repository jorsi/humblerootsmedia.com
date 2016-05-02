<?php
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
  register_post_type( 'testimonial', $args );

  $labels = array(
    'name'               => _x( 'Footer', 'post type general name' ),
    // 'singular_name'      => _x( 'Footer', 'post type singular name' ),
    // 'add_new'            => _x( 'Add New', 'book' ),
    // 'add_new_item'       => __( 'Add New Production' ),
    'edit_item'          => __( 'Edit Footer Item' ),
    // 'new_item'           => __( 'New Production' ),
    'all_items'          => __( 'All Footer Items' ),
    'view_item'          => __( 'View Footer Item' ),
    // 'search_items'       => __( 'Search Productions' ),
    'not_found'          => __( 'No footer items found' ),
    'not_found_in_trash' => __( 'No footer items found in the trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Footer'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Sections for the footer',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-building',
    'supports'      => array( 'title', 'editor', 'page-attributes' ),
    'has_archive'   => true,
    'capability_type' => 'post',
    'capabilities' => array(
      'create_posts' => 'do_not_allow'
    ),
    'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
  );
  register_post_type( 'footer', $args);
}
add_action( 'init', 'humblerootsmedia_custom_posts' );

// Adds the Productions Custom Fields
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

// Adds the Testimonial Custom Fields
function add_testimonial_metaboxes() {
    add_meta_box('testimonial_quote', 'Testimonial Quote', 'testimonial_quote_display', 'testimonial', 'normal', 'default');
    add_meta_box('testimonial_link', 'Testimonial Link', 'testimonial_link_display', 'testimonial', 'normal', 'default');
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
function testimonial_link_display() {
  global $post;

  // Noncename needed to verify where the data originated
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

  // Get the location data if its already been entered
  $location = get_post_meta($post->ID, 'testimonial_link', true);

  // Echo out the field
  echo '<input type="text" name="testimonial_link" value="' . $location  . '" class="widefat" />';
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
  $events_meta['testimonial_link'] = $_POST['testimonial_link'];

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
