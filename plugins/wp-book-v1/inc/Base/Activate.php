<?php
/**
 * RtCamp Task one Plugin
 *
 *
 * @link http://example.com/
 * @since 1.0.0
 * @package wp-bookv1
*/
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}