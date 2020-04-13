<?php
/**
 * @package FerdroidPlugin
 */
/*
Plugin Name: Ferdroid Plugin
Plugin URI: http://ferdinania.com/get-plugins
Description: This is my first attempt on writing a custom Plugin
Version: 1.0.0
Author: FernanityChamp
Author URI: http://ferdinania.com
License: GPLv2 or later
Text Domain: ferdroid-plugin
*/

/*
Disclaimer of the License
*/


// if ( ! defined('ABSPATH') ) {
//     die;
// }

if ( ! file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    die(' No autoload file. Remember you must run composer install');
}

require_once dirname( __FILE__ ) . '/vendor/autoload.php';


defined( 'ABSPATH' ) or die('Hey, you can\'t access this file');

// if ( ! function_exists( 'add_action') ) {
//     echo "Hey, you can't access this file";
//     exit;
// }

define( 'PLUGIN_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGINS_ASSETS_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}

