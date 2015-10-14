<?php
/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {

    
//    wp_enqueue_style( 'google-font1', 'http://fonts.googleapis.com/css?family=Titillium+Web' );
    
    wp_enqueue_style( 'custom-font', get_stylesheet_directory_uri().'/fonts/BebasNeue.woff' ); 
    
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.10.2.js', array('jquery') );
    wp_enqueue_script('jquery');
    
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array('jquery') );
    wp_enqueue_script('custom-js');

	}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

?>