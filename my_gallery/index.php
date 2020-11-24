<?php
/**
 * @package my_gallery
 */
/*
Plugin Name: my_gallery
Plugin URI: http://form.com
Description: Plugin to submit form.
Author: Umar
Version: 1.0.1
Author URI:
*/

/* Define */
define('ADMIN_URL', admin_url());
define('GALLERY_FOLDER', dirname(plugin_basename(__FILE__)));
define('GALLERY_URL', plugins_url('/') . GALLERY_FOLDER);
define('GALLERY_FILE_PATH', dirname(__FILE__));
define('GALLERY_DIR_NAME', basename(GALLERY_FILE_PATH));
/* Include script/style*/
if(file_exists( GALLERY_FILE_PATH . '/inc/scripts.php'))
{
    require_once(GALLERY_FILE_PATH . "/inc/scripts.php");
}
function wp_gallery_install()
{
    /* Here you can add script to create tables as per your requirements. */
}
function wp_gallery_uninstall()
{
    /* Here you can add script to delete tables. */
}
register_activation_hook(__FILE__,'wp_gallery_install');
register_deactivation_hook(__FILE__ , 'wp_gallery_uninstall' );
add_action('admin_menu','gallery_admin_menu');
function gallery_admin_menu() {
    add_menu_page(
        'MENU1',
        'MENU1',
        8,
        __FILE__,
        "galley_list",
        GALLERY_URL."/images/gallery.png"
    );
    add_submenu_page(__FILE__,'MENU2' ,'MENU2' ,'8','add_gallery','add_gallery');
}
function galley_list()
{
// include page to show gallery list.
}
function add_gallery()
{
// include page for add items to gallery functionality.
}
function add_post_gallery()
{
// include page for add items to post functionality.
    $postarr=[];

    wp_insert_post( $postarr,  $wp_error = false );
}


