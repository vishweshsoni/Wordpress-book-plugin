<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

use Inc\Base\BaseController;

class CustomtexnomyController extends BaseController
{
    /**
     * for register the custom texnomy
     * the active function and default function of wp.
     */
    public function register()
    {
        add_action('init', array($this, 'activate'));
    }

    public function activate()
    {
        $labels = array(
            'name' => _x('Book categories', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('book category', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Search book categories', 'textdomain'),
            'all_items' => __('All book categories', 'textdomain'),
            'parent_item' => __('Parent book category', 'textdomain'),
            'parent_item_colon' => __('Parent book category:', 'textdomain'),
            'edit_item' => __('Edit book category', 'textdomain'),
            'update_item' => __('Update book category', 'textdomain'),
            'add_new_item' => __('Add New book category', 'textdomain'),
            'new_item_name' => __('New book category Name', 'textdomain'),
            'menu_name' => __('Book category', 'textdomain'),
        );
        $args = array(
            'labels' => $labels,
            'description' => __('Book categories', 'textdomain'),
            'hierarchical' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => false,
            'show_in_rest' => true,
        );
        register_taxonomy('bookcategory', array('book'), $args);
    }
}
