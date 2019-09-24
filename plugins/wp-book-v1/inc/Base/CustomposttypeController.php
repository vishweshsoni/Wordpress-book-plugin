<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

class CustomposttypeController
{

    public function register()
    {

        add_action('init', array($this, 'activate'));
    }
    public function activate()
    {
        register_post_type('Book',
            array(
                'labels' => array(
                    'name' => 'books',
                    'singular_name' => 'books',
                ),
                'public' => true,
                'has_archive' => true,

            )
        );
    }

}
