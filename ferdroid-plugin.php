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

defined( 'ABSPATH' ) or die('Hey, you can\'t access this file');

// if ( ! function_exists( 'add_action') ) {
//     echo "Hey, you can't access this file";
//     exit;
// }


class FerdroidPlugin 
{

    function __construct()
    {
        add_action('init', [ $this, 'custom_post_type' ]);
    }

    function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate() {

        flush_rewrite_rules();
    }

    function uninstall() {
        
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

}

if ( class_exists('FerdroidPlugin') ) {
    $ferdroidPlugin = new FerdroidPlugin();
}


// activation
register_activation_hook( __FILE__, array($ferdroidPlugin, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, [ $ferdroidPlugin, 'deactivate' ] );

// uninstall

