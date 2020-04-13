<?php

namespace Inc\Base;

class Enqueue
{
    
    public function register() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
        // wp_ agrega el script al frontend
        // admin_ agrega el script al backend
    }

    function enqueue() {
        // añadir todos los assets (css, js)
        wp_enqueue_style( 'mypluginstyle', PLUGINS_ASSETS_URL . 'assets/mystyle.css' );
        wp_enqueue_script( 'mypluginscript', PLUGINS_ASSETS_URL . 'assets/myscript.js' );
    }

}