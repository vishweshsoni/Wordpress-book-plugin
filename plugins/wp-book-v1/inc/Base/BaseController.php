<?php

/**
 *
 *  @package wp-book-v1
 */
namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    //bydefault __construct is public
    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
    }
}
