<?php
/**
 * @package wp-book-v1
 */
namespace Inc;

//can not inherit for protection made it final
final class Init
{

    /**
     * Store all the class inside an array
     * @return array full of services
     *
     *
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\CustomtexnomyController::class,
            Base\CustomposttypeController::class 
        ];
    }
    /**
     * Loop through the classes ,initallize them and call register method if exist
     * @return array
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    /**
     * initiallze the class
     * @param class $class  class from the service array
     * @return class instance  new instance of the  class
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if (!class_exists('WpBookV1')) {
//     //main class
//     class WpBookv1
//     {

//         public $plugin;

//         public function __construct()
//         {
//             $this->plugin = plugin_basename(__FILE__);
//         }

//         public function register()
//         {
//             add_action('admin_enqueue_scripts', array($this, 'enqueue'));
//             add_action('admin_menu', array($this, 'add_admin_pages'));
//         }

//         public function enqueue()
//         {
//             // enqueue all our scripts and css files
//             wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
//             wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
//         }

//         public function add_admin_pages()
//         {
//             add_menu_page('WP Book', 'WPBOOK', 'manage_options', 'wp_book_v1', array($this, 'admin_index'), 'dashicons-book', 110);
//         }

//         public function admin_index()
//         {
//             require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
//         }

//          function activate()
//         {
//             Activate::activate();
//         }

//     }
// }
// $wpbookv1 = new WpBookv1();
// $wpbookv1->register();
// // activation
// register_activation_hook(__FILE__, array($wpbookv1, 'activate'));
// // deactivation
// register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
