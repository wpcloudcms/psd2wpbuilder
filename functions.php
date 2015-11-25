<?php
/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {

    
//    wp_enqueue_style( 'google-font1', 'http://fonts.googleapis.com/css?family=Titillium+Web' );
    
    wp_enqueue_style( 'custom-font', get_stylesheet_directory_uri().'/fonts/BebasNeue.woff' ); 
    
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.10.2.js', array('jquery') );
    wp_enqueue_script('jquery');
    
    wp_register_style( 'wpcloudcms-css', get_stylesheet_directory_uri().'/assets/css/wpcloudcms.css' );
    wp_enqueue_style('wpcloudcms-css');

    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array('jquery') );
    wp_enqueue_script('custom-js');

	}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );


// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

?>