<?php

// Add Humble Roots menu item to admin panel
add_action('admin_menu', function() {

  add_object_page(
    'Humble Roots Settings',  // Title for the page
    'Humble Roots',           // Text for the menu
    'manage_options',         // Who has privileges to see it
    'humble-settings',        // Page slug
    'humble_settings_display'  // Callback function
  );
});

function humble_settings_display() {
?>
  <div class="wrap">
    <h2>Humble Roots Media Theme Settings</h2>
    <?php
    // Check to see if data has been posted back
    if( isset($_POST[ 'humble_submit_hidden' ]) && $_POST[ 'humble_submit_hidden' ] == 'Y' ) {
        // Save the posted value in the database
        update_option( 'frontpage_splash_title', $_POST[ 'frontpage_splash_title' ] );
        update_option( 'frontpage_splash_tagline', $_POST[ 'frontpage_splash_tagline' ] );

        // Put a "settings saved" message on the screen
        ?>
        <div class="updated"><p><strong>Settings saved.</strong></p></div>
    <?php
    }
    ?>
    <form method="post" action="">
      <input type="hidden" name="humble_submit_hidden" value="Y">
      <?php
        settings_fields('frontpage_section');
        do_settings_sections('humble-settings');
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
    'humble-settings'              // ID of the page that this section is for
  );

  // Add fields to the Front Page section
  add_settings_field(
    'frontpage_splash_title',           // ID of this settings field
    'Splash Title',                // Title of this settings field
    'display_frontpage_splash_title',   // Callback function for displaying this field
    'humble-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  // Register Setting
  register_setting(
    'humble-settings',                  // ID of the page to register to
    'frontpage_splash_title'            // ID of the field to register to
  );

  add_settings_field(
    'frontpage_splash_tagline',           // ID of this settings field
    'Splash Tagline',                // Title of this settings field
    'display_frontpage_splash_tagline',   // Callback function for displaying this field
    'humble-settings',                  // ID of the page this field is for
    'frontpage_section'                 // ID of the sectino this field is for
  );

  register_setting(
    'humble-settings',                  // ID of the page to register to
    'frontpage_splash_tagline'            // ID of the field to register to
  );
});

function display_frontpage_section() {
  echo 'These settings change various text and styling options on the front page of Humble Roots Media.';
}

function display_frontpage_splash_title() {
  echo '<input type="text" class="large-text" name="frontpage_splash_title" value="'. stripslashes( get_option('frontpage_splash_title') ) . '">';
}
function display_frontpage_splash_tagline() {
  echo '<input type="text" class="large-text" name="frontpage_splash_tagline" value="'. stripslashes( get_option('frontpage_splash_tagline') ) . '">';
}
