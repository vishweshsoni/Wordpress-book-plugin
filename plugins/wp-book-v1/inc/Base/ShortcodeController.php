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
       add_action(
           'init',
            array($this, 'register_shortcode') 
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
    public function book_info_page($atts)
    {   
        // extract(
        //     shortcode_atts(array(
        //         'id'=>'5',
        //         'author_name'=>"vishwesh",
        //         'year'=>"2019",
        //         'category'=>"comic",
        //         'tag'=>"Famousbookbyjay",
        //         'publisher'=>"gm.singh"
        //      )
        //    ),
        //     $atts  
        // );
        $atts= shortcode_atts(array(
                'post_type'=>'book',
                'id'=>'no id',
                'author_name'=>"no name",
                'year'=>"no year",
                'category'=>"no category",
                'tag'=>"no tag",
                'publisher'=>"no publisher"
        ),$atts);
        
        
        // $args = array(
        //     'post_type' => array(
        //         'book',
        //     )

        //     // 'posts_per_page' => '2',
        //     // 'post_status' => 'publish',
        //     // 'post_id' => null,
        // );
        $args = array(
            'post_type' => 'book',
            'p'=>$atts['id'],
            'tax_query' => array(
                array(
                  'taxonomy' => 'bookcategory',
                  'field' => 'id',
                //   'terms' => 'dgit'
                )
            )
            // // 'orderby'   => 'meta_value_num',
            // 'meta_key'  => 'book_meta_info',
            // 'meta_query'=>array(
             
            //     array(
            //         'key'=>'author_name',
            //         'value'=>'vishwesh'
            //     ),
                // array(
                //     'key'=>'year',
                //     'value'=>'2019'
                // )
                
            // )
        );
        // $string = '';
        $query = new \WP_Query( $args );
        $posts=$query->posts;
        
        // if($query->have_posts()){
        //         // echo "$query->category"."<br>";
        //         print_r($query);
        //         // $post_categories = wp_get_post_categories();
                
                
        // }
            //    print_r($query);
        foreach($posts as $post){
            //    print_r($posts);
            
                if($atts['id']==$post->ID){
                    echo "<b>Book Id</b>".": ".$post->ID."<br>";    
                }else{
                    echo "Book id    doesnot match";
                }
                if($atts['author_name']==$post->author_name){
                    echo "<b>Author</b>".": ".$post->author_name."<br>";    
                }else{
                    echo "Author name doesnot match";
                }
                if($atts['year']==$post->year){
                    echo "<b>Published Year</b>".": ".$post->year."<br>";    
                }else{
                    echo "year not matched";
                }
                           
                echo "<b>Categories</b>".": ";
                $termlist = wp_get_post_terms($post->ID,'bookcategory');
                foreach($termlist  as $term){
                    echo $term->name;
                    echo ",";
                }
                echo "<br>";
                if($atts['publisher']==$post->publisher){
                    echo "<b>Publisher Name</b>".": ".$post->publisher."<br>";    
                }else{
                    echo "Publisher name not matched";
                }
                
                echo "<b>Edition: </b>".$post->edition."<br>";

        }
        wp_reset_postdata();
        
        // ob_start();
        // require_once $this->plugin_path . 'templates/BookView.php';
        // return ob_get_clean();
        

    }
}
