<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class SubmenuController extends BaseController
{
    /**
     * add submenu page under the
     * custom post type
     */
    public function register()
    {
        add_action('admin_menu', array($this, 'register_sub_menu'));
    }
    public function register_sub_menu()
    {
        //adds submenu for settigs
        add_submenu_page(
            'edit.php?post_type=book',
            'Book Setting',
            'Settings',
            'manage_options',
            'submenu-page',
            array($this, 'custom_submenu_page')
        );
        //register settings
        add_action('admin_init', array($this, 'register_settings'));

    }
    public function register_settings()
    {
        register_setting(
            'custom-db-book', //database field
            'no_of_page'
        );
        register_setting(
            'custom-db-book', //database field
            'currency_of_page'
        );
        add_settings_section(
            'book-setting-options', //unique id
            'Book settings for admin', //title to be displayed
            array($this, 'settings_for_book'), //calling for dsiplay function
            'book' //main slug
        );

        add_settings_field(
            'curr_of_book', //unique id
            'No of Pages', //display it
            array($this, 'no_of_pages'),//callback function
            'book',//use slug id
            'book-setting-options'//section id for adding field
        );

        add_settings_field(
            'currency_b', //unique id
            'Currency of book', //display it
            array($this, 'currency_of_book_func'),//callback function
            'book',//use slug id
            'book-setting-options'//section id for adding field
        );
    }
    public function no_of_pages()
    {
        $firstname=esc_attr(get_option('no_of_page'));//esc_attr() for removing unrelevent access to the data
        echo '<input type="text" name="no_of_page" value="'.$firstname.'" placeholder="No of pages"/>';

    }
    public function currency_of_book_func(){
        $currency = esc_attr(get_option('currency_of_page'));//curr_of_book is setting which is registered
        
        ?> <select name="currency_of_page">
                <option  value="₹" <?php  if ( $currency== "₹") echo 'selected="selected"';?>>₹</option>
                <option value="$" <?php  if ( $currency== "$") echo 'selected="selected"';?>>$</option>
                <option value="£" <?php  if ( $currency== "£") echo 'selected="selected"';?>>£</option>
                <option value="€" <?php  if ( $currency== "€") echo 'selected="selected"';?>>€</option>
            </select>
        <?php
    }
    public function settings_for_book()
    {
        echo "do it now!";
    }

    public function custom_submenu_page()
    {
        require_once $this->plugin_path . 'templates/BookSetting.php';
    }

}
