<?php
/**
 * @package FerdroidPlugin
 */

class FerdroidPluginDeactivate 
{

    public static function deactivate() {
        flush_rewrite_rules();
    }
}