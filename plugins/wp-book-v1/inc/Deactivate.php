<?php
/**
 * RtCamp Task one Plugin
 *
 *
 * @link http://example.com/
 * @since 1.0.0
 * @package wp-bookv1
*/
namespace Inc;

class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}