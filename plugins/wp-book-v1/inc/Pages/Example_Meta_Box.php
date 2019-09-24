<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Pages;
use Inc\Base\InterfaceMetaBox;
class Example_Meta_Box implements InterfaceMetaBox
{
        public function init(){
                
                add_action('add_meta_boxes',array($this,'add'));
        }
        public function add(){
                
                add_meta_box(
			'example_meta_box',
			'Example Meta Box',
			array( $this, 'display' ),
			'book'
		);
        }
        public function display() {
                echo "This is an example meta box.";

	}
	public function save() {
		
	}

}
