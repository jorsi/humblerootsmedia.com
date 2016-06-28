<?php

// Enqueue Scripts and Stylesheets
add_action( 'wp_enqueue_scripts', 'humblerootsmedia_enqueue' );
function humblerootsmedia_enqueue() {

    // Global Styles
    wp_enqueue_style( 'humblerootsmedia_style', get_stylesheet_uri() );
    wp_enqueue_style( 'humblerootsmedia_style_normalize', get_template_directory_uri().'/css/lib/normalize.css' );
    wp_enqueue_style( 'humblerootsmedia_style_googlefont_cabin', 'https://fonts.googleapis.com/css?family=Cabin' );
    wp_enqueue_style( 'humblerootsmedia_style_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style( 'humblerootsmedia_style_fancybox', get_stylesheet_directory_uri() . '/css/lib/jquery.fancybox.css');

    // Global scripts
    wp_enqueue_script( 'humblerootsmedia_script_jquery', get_template_directory_uri().'/js/lib/jquery-2.2.4.min.js' );
    wp_enqueue_script( 'humblerootsmedia_script_fancybox', get_template_directory_uri().'/js/lib/jquery.fancybox.pack.js' );
    wp_enqueue_script( 'humblerootsmedia_script_smoothscroll', get_template_directory_uri() . '/js/lib/jquery.smooth-scroll.min.js' );
    wp_enqueue_script( 'humblerootsmedia_script', get_template_directory_uri().'/js/main.js' );

    /**
     * Adds Page specific styles and scripts
     */
    if ( is_front_page() ) {
      wp_enqueue_style( 'humblerootsmedia_style_main', get_template_directory_uri().'/css/index.css' );

      wp_enqueue_script( 'humblerootsmedia_script_parallax', get_template_directory_uri().'/js/lib/jquery.parallax.min.js' );
      wp_enqueue_script( 'humblerootsmedia_script_bxslider', get_template_directory_uri().'/js/lib/jquery.bxslider.min.js' );
      wp_enqueue_script( 'humblerootsmedia_script_instafeed', get_template_directory_uri().'/js/lib/instafeed.min.js' );
      wp_enqueue_script( 'humblerootsmedia_script_index', get_template_directory_uri().'/js/index.js' );
    }
    if ( is_page( 'Clientele') )
      wp_enqueue_style( 'humblerootsmedia_style_clientele', get_stylesheet_directory_uri() . '/css/clientele.css');
    if ( is_page( 'Humble Thoughts') || is_single() || is_search() || is_author() || is_category() )
      wp_enqueue_style( 'humblerootsmedia_style_blog', get_stylesheet_directory_uri() . '/css/blog.css');
      wp_enqueue_script( 'humblerootsmedia_script_blog', get_template_directory_uri().'/js/blog.js' );
    if ( is_page( 'Contact') )
      wp_enqueue_style( 'humblerootsmedia_style_contact', get_stylesheet_directory_uri() . '/css/contact.css');
}
