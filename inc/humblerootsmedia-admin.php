<?php
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
