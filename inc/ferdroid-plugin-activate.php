<?php
/**
 * @package FerdroidPlugin
 */

class FerdroidPluginActivate 
{

    public static function activate() {
        flush_rewrite_rules();
    }

}