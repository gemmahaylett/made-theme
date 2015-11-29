<?php
 /**
 * Creates a custom widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */

class made_theme_popular_widget extends WP_Widget {

  // Register widget with WordPress.

  public function __construct() {
    parent::__construct(
      'made-theme-popular-widget', // Base ID
      'Popular Posts Widget', // Name
      array( 'description' => __( 'This is a popular posts widget', 'made-theme' ), ) // Args
    );
  }

 
  public function show_popular() {
   $widget_ops = array('classname' => 'show_popular', 'description' => __('Show your popular posts.'));
   $this->WP_Widget('show_popular', __('Wpgreen - Popular Posts'), $widget_ops, $control_ops);
   }
   
  public function widget($args, $instance){
    extract($args);
     
    //$options = get_option('custom_recent');
    $title = $instance['title'];
    $postscount = $instance['posts'];
     
    //GET the posts
    global $postcount;

    echo $before_widget . $title ;

      $args = array("posts_per_page" => 4, "orderby" => "comment_count", "order" => "DESC");
      $posts_array = get_posts($args);
      foreach($posts_array as $post){ 
        echo "<a href='";
        echo get_permalink( $post->ID );
        echo "'>";
        echo get_the_post_thumbnail( $post->ID );
        echo "</a>";
        //echo get_title( $post->ID );
      } 
      echo $after_widget;
    }
     
    public function update($newInstance, $oldInstance){
      $instance = $oldInstance;
      $instance['title'] = strip_tags($newInstance['title']);
      $instance['posts'] = $newInstance['posts'];
       
      return $instance;
    }
   
    public function form($instance){ 
      if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
      }
      else {
        $title = __( 'New title', 'text_domain' );
      }
      if ( isset( $instance[ 'posts' ] ) ) {
        $postscount = $instance[ 'posts' ];
      }
      else {
        $postscount = __( 'New Number of Posts', 'text_domain' );
      }
    ?>
      <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      <label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e( 'Number of Posts:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" type="text" value="<?php echo esc_attr( $postscount ); ?>" />
      </p>
   <?php }
  }
  
  // register our custom widget
  add_action('widgets_init', 
    create_function('', 'return register_widget("made_theme_popular_widget");')

);?>