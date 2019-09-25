<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Base;


use Inc\Base\InterfaceMetaBox;
use Inc\Base\BaseController;
use Inc\Pages\Example_Meta_Box;
//class will call custompost type creation of book
class CustomposttypeController extends BaseController
{

    private $options;

    /**
     * for register the custom post type call
     * the active function and default function of wp.
     */
    public function register()
    {

        
        add_action('init', array($this, 'activate'));
        add_action('admin_menu', array($this,'register_call'));

        // add_action('init',array($this,'register_call'));
        add_theme_support('post-thumbnails');
        $obj= new Example_Meta_Box();
        $obj->init();
        
        //init the options for currency
        $default =array("currency"=>array("€","$","₹"),"pages"=>"");
        if(!get_option('crr_field'));
        {
                update_option('crr_field',$default);
        }
    }
    /**
     * calling the register_post_type
     *  after init call of custom post type
     *
     * also it will declare meta box
     * and save meta box info by add_action
     * and calling function
     */
    public function activate()
    {
        register_post_type('Book',
            array(
                'labels' => array(
                    'name' => 'Book',
                    'singular_name' => 'Books',
                ),
                'public' => true,
                'has_archive' => true,
                'supports' => array( 'title', 'editor','thumbnail' ),

            )
        );

    }
    public function register_call()
    {

        add_submenu_page(
            'edit.php?post_type=book',
            __('Books Settings', 'wp-book-v1'),
            __('Settings', 'wp-book-v1'),
            'manage_options', //capabillities
            'books-settings', //menu-slug
            array($this,'books_ref_page_callback')
            
        );
    }
    function books_ref_page_callback() { 
        $one= get_option('crr_field');
        $currency=$one['currency'];
        ?>
        <div class="wrap">
        <?php settings_errors();?>
        <form action="options.php" method="post">
            <h1>Custom Setting for book</h1>
            <label for="currency">Currency
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;
            </label>
            <select name="c_id">
            <!-- <option value="">€</option>
            <option value="">$</option>
            <option value="">₹</option> -->
            
            <?php 
                foreach($currency as $opt)
                {   
                    ?><option value=""><?php echo "$opt"?></option><?php
                }
            ?></option>
            </select>
            <br>
            
            <label for="no_of_page">No of books per page<input type="text"></label>
        <?php submit_button( __( "Save changes", "FoundationPress" ), "primary", "submit", true ); ?>
        
        </form>
        </div>
        <?php
    }

    // public function book_info_box()
    // {
            
    //     add_meta_box( 'meta-box-id', __( 'My Meta Box', 'textdomain' ), array( $this, 'render_meta_box_content' ), 'post' );
    // }

    // public function render_meta_box_content()
    // { 
    //      die();
    //     return require_once("$this->plugin_path/Pages/Metabox.php");
    // }

}
