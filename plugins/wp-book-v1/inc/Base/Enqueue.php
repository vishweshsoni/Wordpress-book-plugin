<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

class Enqueue
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    public function enqueue()
    {
        // enqueue all our scripts and css files
        wp_enqueue_style('mypluginstyle', PLUGIN_URL.'/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL.'/assets/myscript.js');
    }

}
