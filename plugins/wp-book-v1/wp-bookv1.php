<?php
/**
 * RtCamp Task one Plugin
 *
 * This Plugin will have the Book custom plugin and custom ,
 * texonomy and also also working woth metabox ,metadata API,
 * and extension of metadata API
 *
 * @link http://example.com/
 * @since 1.0.0
 * @package wp-bookv1
 *
 * @worpress-plugin
 * Plugin Name:       wp-bookv1
 * Plugin URI:        http://example.com/
 * Description:       RtCamp task-1 plugin 1
 * Version:           1.0.0
 * Author:            Vishwesh Soni
 * Author URI:        https://github.com/vishweshsoni
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-bookv1
 */

defined('ABSPATH') or die('You are not allowed!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if (!class_exists('WpBookV1')) {
    //main class
    class WpBookv1
    {

        public $plugin;

        public function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
        }

        public function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_pages'));
        }

        public function enqueue()
        {
            // enqueue all our scripts and css files
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
        }

        public function add_admin_pages()
        {
            add_menu_page('WP Book', 'WPBOOK', 'manage_options', 'wp_book_v1', array($this, 'admin_index'), 'dashicons-book', 110);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

         function activate()
        {
            Activate::activate();
        }

    }
}
$wpbookv1 = new WpBookv1();
$wpbookv1->register();
// activation
register_activation_hook(__FILE__, array($wpbookv1, 'activate'));
// deactivation
register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));

	