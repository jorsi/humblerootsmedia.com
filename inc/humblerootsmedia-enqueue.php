<?php

// Enqueue Scripts and Stylesheets
add_action( 'wp_enqueue_scripts', 'humblerootsmedia_enqueue' );
function humblerootsmedia_enqueue() {

    // Global Styles
    wp_enqueue_style( 'humblerootsmedia_style', get_stylesheet_uri() );
    wp_enqueue_style( 'humblerootsmedia_style_normalize', get_template_directory_uri().'/styles/normalize.css' );
    wp_enqueue_style( 'humblerootsmedia_style_googlefont_lato', 'https://fonts.googleapis.com/css?family=Lato:400,300,700,900' );
    wp_enqueue_style( 'humblerootsmedia_style_googlefont_tangerine', 'https://fonts.googleapis.com/css?family=Tangerine:400,700' );
    wp_enqueue_style( 'humblerootsmedia_style_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'humblerootsmedia_style_main', get_template_directory_uri().'/styles/main.css' );

    // Register updated version of jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js", false, null);
    wp_enqueue_script('jquery');

    // Global scripts
    wp_enqueue_script( 'humblerootsmedia_script_parallax', get_template_directory_uri().'/js/jquery.parallax.min.js', array('jquery'));
    wp_enqueue_script( 'humblerootsmedia_script_smoothscroll', get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js', array('jquery'));
    wp_enqueue_script( 'humblerootsmedia_script_global', get_template_directory_uri().'/js/global.js', array('jquery'));

    /**
     * Adds Page specific styles and scripts
     */
    if ( is_front_page() ) {
      wp_enqueue_style( 'humblerootsmedia_style_fancybox', get_stylesheet_directory_uri() . '/styles/jquery.fancybox.css');
      wp_enqueue_script( 'humblerootsmedia_script_fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_bxslider', get_template_directory_uri().'/js/jquery.bxslider.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_instafeed', get_template_directory_uri().'/js/instafeed.min.js', array('jquery'));
      wp_enqueue_script( 'humblerootsmedia_script_index', get_template_directory_uri().'/js/index.js', array('jquery'));
    }
    if ( is_page( 'Clientele') )
      wp_enqueue_style( 'humblerootsmedia_style_clientele', get_stylesheet_directory_uri() . '/styles/clientele.css');
    if ( is_page( 'Humble Thoughts') )
      wp_enqueue_style( 'humblerootsmedia_style_humble-thoughts', get_stylesheet_directory_uri() . '/styles/humble-thoughts.css');
    if ( is_page( 'Contact') )
      wp_enqueue_style( 'humblerootsmedia_style_contact', get_stylesheet_directory_uri() . '/styles/contact.css');
    if ( is_single() )
      wp_enqueue_style( 'humblerootsmedia_style_single', get_stylesheet_directory_uri() . '/styles/single.css');
}