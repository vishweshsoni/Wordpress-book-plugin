<?php

/**
 *
 *  @package wp-book-v1
 */
namespace Inc\Pages;

class Admin
{  

    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages()
    {
        add_menu_page('WP Book', 'WPBOOK', 'manage_options', 'wp_book_v1', array($this, 'admin_index'), 'dashicons-book', 110);
    }

    public function admin_index()
    {
        require_once PLUGIN_PATH. 'templates/admin.php';
    }
}
