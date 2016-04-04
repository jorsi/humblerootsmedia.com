<?php
function humblerootsmedia_customize_register( $wp_customize ) {
  // Add Option to Change the Slide Image
  $wp_customize->add_section( 'humblerootsmedia_section_slide_image' , array(
    'title'      => __( 'Slide Image', 'humblerootsmedia' ),
    'description' => 'Change Slide Image',
    'priority'  => 60
  ));
  // Add Option to Change the Textured Background
  $wp_customize->add_section( 'humblerootsmedia_section_texturedbg_image' , array(
    'title'      => __( 'Textured Background Image', 'humblerootsmedia' ),
    'description' => 'Change Textured Background Image',
    'priority'  => 70
  ));
  $wp_customize->add_setting( 'humblerootsmedia_slide_image', array(
    'default'     => get_bloginfo('template_directory') . '/images/film.jpg'
  ));
  $wp_customize->add_setting( 'humblerootsmedia_texturebg', array(
    'default'     => ''
  ));
  $wp_customize->add_control(
  new WP_Customize_Image_Control( $wp_customize, 'humblerootsmedia_slide_image', array(
  	'label'        => __( 'Slide Image', 'humblerootsmedia' ),
    'description' => __( 'Image that displays in the slide that goes to the Humble Thoughts page.', 'humblerootsmedia' ),
  	'section'    => 'humblerootsmedia_section_slide_image',
  	'settings'   => 'humblerootsmedia_slide_image'
  )));
  $wp_customize->add_control(
  new WP_Customize_Image_Control( $wp_customize, 'humblerootsmedia_texturebg', array(
  	'label'        => __( 'Tiled Image', 'humblerootsmedia' ),
    'description' => __( 'An image used for tiled backgrounds.', 'humblerootsmedia' ),
  	'section'    => 'humblerootsmedia_section_texturedbg_image',
  	'settings'   => 'humblerootsmedia_texturebg'
  )));
}
add_action( 'customize_register', 'humblerootsmedia_customize_register' );

// Add CSS from Theme Customizer
function humblerootsmedia_customize_css()
{
    ?>
         <style type="text/css">
             .break { background-image: url(<?php echo get_theme_mod('humblerootsmedia_texturebg'); ?>); }
         </style>
    <?php
}
add_action( 'wp_head', 'humblerootsmedia_customize_css');
