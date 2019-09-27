<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

use Inc\Base;

class ShortcodeController extends BaseController
{   
    /**
     * Regsiter shortcode 
     */
    public function register()
    {
       add_action('init',array($this, 'register_shortcode') 
       );
    }
    /**
     * [book] shortcode
     */
    public function register_shortcode(){
        add_shortcode(
            'book', //unique id
            array($this, 'book_info_page') //callback function
        );
    }
    /**
     * it will call bookviewpage for shortcode 
     */
    public function book_info_page()
    {   
        ob_start();
        require_once $this->plugin_path . 'templates/BookView.php';
        return ob_get_clean();
        

    }
}
