<?php

namespace Inc;

final class Init 
{

    public static function get_services() {
        return [
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }


    private static function instantiate( $class ) {
        return new $class;
    }

}


// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPage;

// class FerdroidPlugin 
// {
//     // private
//     // solo puede ser accedida desde la misma clase

//     // public
//     // puede ser accedido desde cualquier parte

//     // protected
//     // puede ser accedido desde la misma clase o de sus clases heredadas

//     public $pluginName;


//     function __construct()
//     {
//         // $this->print_more_stuff();
//         // $this->print_stuff();
//         $this->pluginName = plugin_basename( __FILE__ );
//     }

//     function register() {
//         add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
//         // wp_ agrega el script al frontend
//         // admin_ agrega el script al backend

//         add_action( 'admin_menu', [ $this, 'add_admin_pages' ] );

//         add_filter( "plugin_action_links_{$this->pluginName}", [ $this, 'settings_link' ] );
//     }

//     public function settings_link( $links) {
//         $settings_link = '<a href="admin.php?page=ferdroid_plugin">Settings</a>';
//         array_push( $links, $settings_link );
//         return $links;
//     }

//     public function add_admin_pages() {
//         add_menu_page( 'Ferdroid Plugin', 'Ferdroid', 'manage_options', 'ferdroid_plugin', [ $this, 'admin_index'], 'dashicons-store', 110 );
//     }

//     public function admin_index() {
//         // require template
//         require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//     }

//     // public static function register() {
//     //     add_action( 'wp_enqueue_scripts', [ 'FerdroidPlugin', 'enqueue' ] );
//         // wp_ agrega el script al frontend
//         // admin_ agrega el script al backend
//     // }


//     // function activate() {
//     //     $this->custom_post_type();
//     //     flush_rewrite_rules();
//     // }


//     // function deactivate() {

//     //     flush_rewrite_rules();
//     // }

//     // function uninstall() {
        
//     // }


//     function activate() {
//         // require_once plugin_dir_path( __FILE__ ) . 'inc/ferdroid-plugin-activate.php';
//         Activate::activate();
//     }


//     protected function create_post_type() {
//         add_action('init', [ $this, 'custom_post_type' ]);
//     }

//     protected function print_stuff() {
//         var_dump(['testing']);
//     }

//     function custom_post_type() {
//         register_post_type('book', ['public' => true, 'label' => 'Books']);
//     }

//     function enqueue() {
//         // añadir todos los assets (css, js)
//         wp_enqueue_style( 'mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__) );
//         wp_enqueue_script( 'mypluginscript', plugins_url('/assets/myscript.js', __FILE__) );
//     }

//     private function print_more_stuff() {
//         echo "Test private function";
//     }
// }

// class SecondClass extends FerdroidPlugin {

//     function register_post_type() {
//         $this->create_post_type();
//     }
// }


// if ( class_exists('FerdroidPlugin') ) {
//     $ferdroidPlugin = new FerdroidPlugin();
//     $ferdroidPlugin->register();
//     // FerdroidPlugin::register();


//     // $secondClass = new SecondClass();
//     // $secondClass->register_post_type();
// }


// // activation
// // require_once plugin_dir_path( __FILE__ ) . 'inc/ferdroid-plugin-activate.php';
// // register_activation_hook( __FILE__, array( 'FerdroidPluginActivate', 'activate') );
// register_activation_hook( __FILE__, array( $ferdroidPlugin, 'activate') );

// // deactivation
// // require_once plugin_dir_path( __FILE__ ) . 'inc/ferdroid-plugin-deactivate.php';
// register_deactivation_hook( __FILE__, [ 'Deactivate', 'deactivate' ] );

// uninstall
// register_uninstall_hook( __FILE__, [ $ferdroidPlugin, 'uninstall' ]);
