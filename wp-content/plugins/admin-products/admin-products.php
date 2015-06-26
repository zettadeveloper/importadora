<?php
/**
 * Plugin Name: Insert Products.
 * Plugin URI: http://www.importadoraseverino.com/
 * Description: Insert Products.
 * Version: 1.0.0
 * Author: Sebastian
 * Author URI: http://www.importadoraseverino.com/
 * License: JSDO 
 */
 require(dirname(__FILE__) . '/../../../wp-load.php');
 //Define GLOBAL PATH
if(!session_id())
	session_start();
 
 if (!defined('INSERT_PRODUCT_THEME_DIR'))
    define('INSERT_PRODUCT_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());

if (!defined('INSERT_PRODUCT_PLUGIN_NAME'))
    define('INSERT_PRODUCT_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('INSERT_PRODUCT_PLUGIN_DIR'))
    define('INSERT_PRODUCT_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . INSERT_PRODUCT_PLUGIN_NAME);

if (!defined('INSERT_PRODUCT_PLUGIN_URL'))
    define('INSERT_PRODUCT_PLUGIN_URL', WP_PLUGIN_URL . '/' . INSERT_PRODUCT_PLUGIN_NAME);
 
 
 
 
 /** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_options_page( 'Administrar Productos', 'Administrar Productos', 'manage_options', 'admin-products', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	include_once('views/form.php');
	
}
 
 
 function generate_report_load_script() {

}

 add_action( 'admin_head', 'generate_report_load_script' );
 
 ?>
