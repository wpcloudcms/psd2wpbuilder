<?php
/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {

    
//  wp_enqueue_style( 'google-font1', 'http://fonts.googleapis.com/css?family=Titillium+Web' );
    
//    wp_register_style( 'custom-font', get_stylesheet_directory_uri().'/fonts/BebasNeue.woff' ); 
//    wp_enqueue_style('custom-font');
    
 //   wp_enqueue_style( 'arial-narrow', 'http://allfont.net/allfont.css?fonts=arial-narrow' ); 
          
//    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
    
    wp_register_style( 'wpcloudcms-css', get_stylesheet_directory_uri().'/assets/css/wpcloudcms.css' );
    wp_enqueue_style('wpcloudcms-css');

    wp_enqueue_script( 'js-lib-1', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js');  
    
//  wp_enqueue_script( 'js-lib-2', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js');
    
//    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' );

	}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

function headerscripts() {
    
    if( wp_script_is( 'jquery', 'done' ) ) {
    ?>
    <script>  
    $(function(){
   if ($('body').hasClass('membership-checkout')) {
        $("link#formidable-css, link#pmpro_print-css, link#siteorigin-panels-front-css, link#pp-bootstrap-css, link#pp-flat-ui-css, link#ppcore-css, link#wpcloudcms-css-css, link#animate-css-css, link#virtue_skin-css, link#kadence_child-css, link#redux-google-fonts-virtue_premium-css, div#wrapper, footer#containerfooter, .footertext.clearfix").remove();
       $("script[src*='jquery-migrate.min.js'], script[src*='jquery.min.js'], script[src*='wp-emoji-release.min.js']").remove();
         }
    if ($('body').hasClass('pricing')) {
        $("link#formidable-css, link#pmpro_print-css, link#pp-bootstrap-css, link#pp-flat-ui-css, link#ppcore-css, link#animate-css-css").remove();
        $("script[src*='jquery-migrate.min.js'], script[src*='jquery.min.js'], script[src*='wp-emoji-release.min.js']").remove();
    }
    if ($('body').hasClass('single-job')) {
        $("link#formidable-css, link#pmpro_print-css, link#pp-bootstrap-css, link#pp-flat-ui-css, link#ppcore-css, link#animate-css-css").remove();
        $("script[src*='jquery-migrate.min.js'], script[src*='jquery.min.js'], script[src*='wp-emoji-release.min.js']").remove();
    }

});
</script>
    <?php
    }
}
add_action( 'wp_head', 'headerscripts' );

function footerscripts() {
    
    wp_register_style( 'animate-css', get_stylesheet_directory_uri().'/assets/css/animate.min.css' );
    wp_enqueue_style('animate-css');  
    
    wp_register_script( 'scrollSpeed-js', get_stylesheet_directory_uri() . '/jQuery.scrollSpeed.js');  
    wp_enqueue_script('scrollSpeed-js');
    
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js');  
    wp_enqueue_script('custom-js');
    
    if( wp_script_is( 'jquery', 'done' ) ) {
    ?>

    <script>		   
    jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery(".siteloader-cell").delay(200).fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery(".siteloader-wrap").delay(200).fadeOut();
})
$(function() {  
    jQuery.scrollSpeed(100, 800);
}); 
         if ($('input[type="checkbox"]#field_9hqv5-0').is(':checked')) {
   $("input.pmpro_btn.pmpro_btn-submit-checkout").addClass("checked");
}
         $('#btnpricing1').click(function() { 
        $('#iframel1').attr('src', '/membership-account/membership-checkout/?level=1');
        $('#iframel2').attr('src', '').attr('style', 'display: none;');
        $('#iframel3').attr('src', '').attr('style', 'display: none;');
        $('#iframel4').attr('src', '').attr('style', 'display: none;');
        $('#iframel5').attr('src', '').attr('style', 'display: none;');
        $('#iframel6').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing2').click(function() { 
        $('#iframel2').attr('src', '/membership-account/membership-checkout/?level=2');
        $('#iframel1').attr('src', '').attr('style', 'display: none;');
        $('#iframel3').attr('src', '').attr('style', 'display: none;');
        $('#iframel4').attr('src', '').attr('style', 'display: none;');
        $('#iframel5').attr('src', '').attr('style', 'display: none;');
        $('#iframel6').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing3').click(function() { 
        $('#iframel3').attr('src', '/membership-account/membership-checkout/?level=3'); 
        $('#iframel1').attr('src', '').attr('style', 'display: none;');
        $('#iframel2').attr('src', '').attr('style', 'display: none;');
        $('#iframel4').attr('src', '').attr('style', 'display: none;');
        $('#iframel5').attr('src', '').attr('style', 'display: none;');
        $('#iframel6').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing4').click(function() { 
        $('#iframel4').attr('src', '/membership-account/membership-checkout/?level=4'); 
        $('#iframel1').attr('src', '').attr('style', 'display: none;');
        $('#iframel2').attr('src', '').attr('style', 'display: none;');
        $('#iframel3').attr('src', '').attr('style', 'display: none;');
        $('#iframel5').attr('src', '').attr('style', 'display: none;');
        $('#iframel6').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing5').click(function() { 
        $('#iframel5').attr('src', '/membership-account/membership-checkout/?level=5');
        $('#iframel1').attr('src', '').attr('style', 'display: none;');
        $('#iframel2').attr('src', '').attr('style', 'display: none;');
        $('#iframel3').attr('src', '').attr('style', 'display: none;');
        $('#iframel4').attr('src', '').attr('style', 'display: none;');
        $('#iframel6').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing6').click(function() { 
        $('#iframel6').attr('src', '/membership-account/membership-checkout/?level=6');
        $('#iframel1').attr('src', '').attr('style', 'display: none;');
        $('#iframel2').attr('src', '').attr('style', 'display: none;');
        $('#iframel3').attr('src', '').attr('style', 'display: none;');
        $('#iframel4').attr('src', '').attr('style', 'display: none;');
        $('#iframel5').attr('src', '').attr('style', 'display: none;');
        $('#iframel7').attr('src', '').attr('style', 'display: none;');
    });
    $('#btnpricing7').click(function() { 
        $('#iframel7').attr('src', '/membership-account/membership-checkout/?level=7');
    {modal.style.display = "block"; iframe7.style.display = "block"; span.style.display = "block";} 
    });
</script>
    <?php
    }
}
add_action( 'wp_footer', 'footerscripts' );

/**
 * WordPress function for logout menu
 */

function add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary_navigation') {
        $items .= '<li><a href="'. wp_logout_url() .'"><span>Sign Out</span></a></li>';
    }
    else {}
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );


// Disable wpadminbar for specific role (in this case, 'subscriber')
add_action('wp_enqueue_scripts', 'remove_admin_bar', 99 );
add_action('admin_enqueue_scripts', 'remove_admin_bar', 99 );
function remove_admin_bar() {
    $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];
 
    if ( 'subscriber' === $role_name ) {
       echo '<style type="text/css">
      #wpadminbar { display: none; }
      body { margin-top: -32px !important; }
   </style>';
}
        else { }
}
/**
 * Add editbilling.php into a post or page using shortcode [edit_billing]
 */

function my_editbilling_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/editbilling' );
    return ob_get_clean();
}
add_shortcode( 'edit_billing', 'my_editbilling_shortcode' );

/**
 * WordPress function for redirecting users on login based on user role
 */
function cm_redirect_users_by_role() {
 
    $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];
 
    if ( 'subscriber' === $role_name ) {
        wp_redirect( '/my-account/' );
    } // if
    else { }
} // cm_redirect_users_by_role
add_action( 'admin_init', 'cm_redirect_users_by_role' );


// Add Div with id and class Shortcode
function div_shortcode( $atts, $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);

	// Code
return '<div id="' . $id . '" class="' . $class . '">' . $content . '</div>';

}
add_shortcode( 'div', 'div_shortcode' );


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
		'href'  => '/wp-admin/widgets.php',
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