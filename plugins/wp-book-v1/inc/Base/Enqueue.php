<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    public function enqueue()
    {
        // enqueue all our scripts and css files
        wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . '/assets/myscript.js');
    }

}
