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
    // private
    // solo puede ser accedida desde la misma clase

    // public
    // puede ser accedido desde cualquier parte

    // protected
    // puede ser accedido desde la misma clase o de sus clases heredadas


    function __construct()
    {
        $this->print_more_stuff();
        $this->print_stuff();
    }

    function register() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
        // wp_ agrega el script al frontend
        // admin_ agrega el script al backend
    }

    function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    function deactivate() {

        flush_rewrite_rules();
    }

    // function uninstall() {
        
    // }

    protected function create_post_type() {
        add_action('init', [ $this, 'custom_post_type' ]);
    }

    protected function print_stuff() {
        var_dump(['testing']);
    }

    function custom_post_type() {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue() {
        // añadir todos los assets (css, js)
        wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__) );
        wp_enqueue_script( 'mypluginscript', plugins_url('/assets/myscript.js', __FILE__) );
    }

    private function print_more_stuff() {
        echo "Test private function";
    }
}

class SecondClass extends FerdroidPlugin {

    function register_post_type() {
        $this->create_post_type();
    }
}


if ( class_exists('FerdroidPlugin') ) {
    $ferdroidPlugin = new FerdroidPlugin();
    $ferdroidPlugin->register();

    $secondClass = new SecondClass();
    $secondClass->register_post_type();
}


// activation
register_activation_hook( __FILE__, array($ferdroidPlugin, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, [ $ferdroidPlugin, 'deactivate' ] );

// uninstall
// register_uninstall_hook( __FILE__, [ $ferdroidPlugin, 'uninstall' ]);

