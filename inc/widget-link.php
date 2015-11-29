<?php 
/**
 * Creates a form widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */
class made_theme_link_widget extends WP_Widget {

  // Register widget with WordPress.

  public function __construct() {
    parent::__construct(
      'made-theme-link-widget', // Base ID
      'Link Widget', // Name
      array( 'description' => __( 'This is a link widget', 'made-theme' ), ) // Args
    );
  }


  // Front-end display of widget.

  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $link_img = apply_filters( 'widget_title', $instance['link_img'] );
    $link = apply_filters( 'widget_title', $instance['link'] );

    echo $before_widget; 

      if ( ! empty( $title ) )
        echo '<h3>'. $title .'</h3>';

      if ( ! empty( $link_img ) && ! empty( $link ) )
        echo '<a href=' . $link . '><img src=' . $link_img . '></a>'; 
    
    echo $after_widget;
  }


  // Sanitize widget title on save

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['link_img'] = strip_tags( $new_instance['link_img'] );
    $instance['link'] = strip_tags( $new_instance['link'] );

    return $instance;
  }


  // Admin widget form (for title field)

  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'New title', 'text_domain' );
    }
    if ( isset( $instance[ 'link_img' ] ) ) {
      $link_img = $instance[ 'link_img' ];
    }
    else {
      $link_img = __( 'New Link Img', 'text_domain' );
    }
    if ( isset( $instance[ 'link' ] ) ) {
      $link = $instance[ 'link' ];
    }
    else {
      $link = __( 'New Link', 'text_domain' );
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <label for="<?php echo $this->get_field_id( 'link_img' ); ?>"><?php _e( 'Link Img:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link_img' ); ?>" name="<?php echo $this->get_field_name( 'link_img' ); ?>" type="text" value="<?php echo esc_attr( $link_img ); ?>" />
    <label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Form Link:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
    </p>
    <?php 
  }

}

// register our custom widget
add_action( 'widgets_init', 
  create_function( '', 'register_widget( "made_theme_link_widget" );' ) 
); ?>