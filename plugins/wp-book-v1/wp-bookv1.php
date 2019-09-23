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
define('PLUGIN_PATH',plugin_dir_path(__FILE__));
if(class_exists('Inc\\Init')){
        Inc\Init::register_services();
}

