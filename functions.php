<?php
/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {

    
//    wp_enqueue_style( 'google-font1', 'http://fonts.googleapis.com/css?family=Titillium+Web' );
    
    wp_enqueue_style( 'custom-font', get_stylesheet_directory_uri().'/fonts/BebasNeue.woff' ); 
    
     wp_enqueue_style( 'arial-narrow', 'http://allfont.net/allfont.css?fonts=arial-narrow' ); 
    
  //  wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.10.2.js', array('jquery') ); ======= Removed due to overload
 //   wp_enqueue_script('jquery');
    
    wp_register_style( 'wpcloudcms-css', get_stylesheet_directory_uri().'/assets/css/wpcloudcms.css' );
    wp_enqueue_style('wpcloudcms-css');

    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array('jquery') );
    wp_enqueue_script('custom-js');

	}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );



add_action('admin_bar_menu', 'github_updater', 100);
function github_updater($admin_bar){
	$admin_bar->add_menu( array(
		'id'    => 'github-updater',
		'title' => 'Github Updater',
		'href'  => '/wp-admin/options-general.php?page=github-updater&tab=github_updater_install_theme',
		'meta'  => array(
			'title' => __('Github Updater'),			
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'github-updater-sub',
		'parent' => 'github-updater',
		'title' => 'Theme Updater',
		'href'  => '/wp-admin/themes.php?theme=psd2wpbuilder',
		'meta'  => array(
			'title' => __('Theme Updater'),
			'target' => '_self',
			'class' => 'my_submenu_item_class'
		),
	));
//	$admin_bar->add_menu( array(
//		'id'    => 'github-updater-second-sub',
//		'parent' => 'github-updater',
//		'title' => 'Widgets',
//		'href'  => '/wp-admin/widgets.php',
//		'meta'  => array(
//			'title' => __('My Second Sub Menu Item'),
//			'target' => '_blank',
//			'class' => 'my_submenu_item_class'
//		),
//	));
}

add_action('admin_bar_menu', 'psd2wp_builder', 105);
function psd2wp_builder($admin_bar){
	$admin_bar->add_menu( array(
		'id'    => 'dev-shortcuts',
		'title' => 'Dev Shortcuts',
		'href'  => '/wp-admin/admin.php?page=kad_options&tab=18',
		'meta'  => array(
			'title' => __('Dev Shortcuts'),			
		),
	));
    	$admin_bar->add_menu( array(
		'id'    => 'widgets',
		'parent' => 'dev-shortcuts',
		'title' => 'Widgets',
		'href'  => '/wp-admin/themes.php?theme=psd2wpbuilder',
		'meta'  => array(
			'title' => __('Widgets'),
			'target' => '_self',
			'class' => 'my_submenu_item_class'
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'menus',
		'parent' => 'dev-shortcuts',
		'title' => 'Menus',
		'href'  => '/wp-admin/nav-menus.php',
		'meta'  => array(
			'title' => __('Menus'),
			'target' => '_self',
			'class' => 'my_submenu_item_class'
		),
	));
    	$admin_bar->add_menu( array(
		'id'    => 'plugins',
		'parent' => 'dev-shortcuts',
		'title' => 'Plugins',
		'href'  => '/wp-admin/plugins.php',
		'meta'  => array(
			'title' => __('Plugins'),
			'target' => '_self',
			'class' => 'my_submenu_item_class'
		),
	));
}
?>