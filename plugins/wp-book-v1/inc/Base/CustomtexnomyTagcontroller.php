<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

use Inc\Base\BaseController;

class CustomtexnomyTagcontroller extends BaseController
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
            'name'              => _x( 'book tags', 'taxonomy general name', 'wp-book-v1' ),
            'singular_name'     => _x( 'Book Tag', 'taxonomy singular name', 'wp-book-v1' ),
            'search_items'      => __( 'Search book tags', 'wp-book-v1' ),
            'all_items'         => __( 'All book tags', 'wp-book-v1' ),
            'parent_item'       => __( 'Parent Book Tag', 'wp-book-v1' ),
            'parent_item_colon' => __( 'Parent Book Tag:', 'wp-book-v1' ),
            'edit_item'         => __( 'Edit Book Tag', 'wp-book-v1' ),
            'update_item'       => __( 'Update Book Tag', 'wp-book-v1' ),
            'add_new_item'      => __( 'Add New Book Tag', 'wp-book-v1' ),
            'new_item_name'     => __( 'New Book Tag Name', 'wp-book-v1' ),
            'menu_name'         => __( 'Book Tag', 'wp-book-v1' ),
        );
        $args = array(
            'labels' => $labels,
            'description' => __( 'Book tags ', 'wp-book-v1' ),
            'hierarchical' => false,
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
        register_taxonomy('booktag', array('book'), $args);
    }
}
