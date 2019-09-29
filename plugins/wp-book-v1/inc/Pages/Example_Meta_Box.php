<?php
/**
 * @package wp-book-v1
 */
namespace Inc\Pages;
use Inc\Base\InterfaceMetaBox;
class Example_Meta_Box
{
          public $author_name="";
          public $price = "";
          public $publisher="";
          public $year="";
          public $edition="";
          public $url="";
        public function init(){
                
                add_action('add_meta_boxes',array($this,'add'));
                add_action( 'save_post', array($this,'save') );
                


          }
          
        public function add(){
                
                add_meta_box(
			'book_meta_info',
			'Book Info',
			array( $this, 'display' ),
			'book'
		);
        }
        public function display($post) {
                $author_name= get_post_meta( $post->ID, 'author_name', true );
                $price = get_post_meta($post->ID,'price',true);
                $publisher=get_post_meta($post->ID,'publisher',true);
                $year=get_post_meta($post->ID,'year',true);
                $edition=get_post_meta($post->ID,'edition',true);
                $url= get_post_meta($post->ID,'url',true);
                
                
                
                ?>
                
                <form action="options.php" method="post"> 
                <label for=<?php echo $post->ID?></label>
                <table>
                <tr>
                <td><label for="author_name">Author Name</label></td>
                <td><input type="text" name="author_name" class="regular-text" id="author_name" size="15" value=<?php echo sanitize_text_field($author_name); ?>></td>
                </tr>
                <tr>
                <td><label for="price">Price </label></td>
                <td><input type="text" name="price" class="regular-text" id="price" size="15" value= <?php echo $price; ?> ></td>
                </tr>
                <tr>
                <td>
                <label for="year">Year</label>
                </td>
                <td>
                <input type="text" name="year" class="regular-text" id="year" size="15" value=<?php echo $year; ?>>
                </td>
                </tr>
                <tr>
                  <td><label for="edition">Edition</label></td>   
                  <td><input type="text" name="edition" class="regular-text" id="edition" size="15" value= <?php echo $edition; ?>></td>
                </tr>
                <tr>
                <td>
                <label for="url">URL</label></td>
                <td><input type="text" name="url" class="regular-text" id="url" size="15" value=<?php echo $url; ?>></td>
                </tr>                
                </table>       
                </form>

                <?php
                


	}
	public function save($post_id) {
      if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return post_id;

     if( isset( $_POST['author_name'] ) ){
                        update_post_meta( sanitize_textarea_field($post_id      ),'author_name', 
                        esc_attr( $_POST['author_name'] ) );
                     }
                     if( isset( $_POST['price'] ) ){
                        update_post_meta( $post_id,'price', 
                        esc_attr( $_POST['price'] ) );
                     }
                     if( isset( $_POST['publisher'] ) ){
                        update_post_meta( $post_id,'publisher', 
                        esc_attr( $_POST['publisher'] ) );
                     }
                     if( isset( $_POST['year'] ) ){
                        update_post_meta( $post_id,'year', 
                        esc_attr( $_POST['year'] ) );
                     }
                     if( isset( $_POST['edition'] ) ){
                        update_post_meta( $post_id,'edition', 
                        esc_attr( $_POST['edition'] ) );
                     }
                     if( isset( $_POST['url'] ) ){
                        update_post_meta( $post_id,'url', 
                        esc_attr( $_POST['url'] ) );
                     }
	}

}
