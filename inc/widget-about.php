<?php 
/**
 * Creates a about me widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */
class made_theme_about_widget extends WP_Widget {
  // Register widget with WordPress.
  public function __construct() {
    parent::__construct(
      'made-theme-about-widget', // Base ID
      'About Widget', // Name
      array( 'description' => __( 'This is an about widget', 'made-theme' ), ) // Args
    );
  }
  // Front-end display of widget.
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $about_text = apply_filters( 'widget_title', $instance['about_text'] );
    $about_btn = apply_filters( 'widget_title', $instance['about_btn'] );
    $about_link = apply_filters( 'widget_title', $instance['about_link'] );
    $about_img = apply_filters( 'widget_title', $instance['about_img'] );
    
    echo $before_widget;
    if ( ! empty( $about_img ) )
      echo '<img src=' . $about_img . '>';

    if ( ! empty( $title ) )
      echo $before_title . $title . $after_title;

    if ( ! empty( $about_text ) )
      echo $about_text;

    if ( ! empty( $about_link ) && ! empty( $about_btn ) )
      echo '<a href=' . $about_link . '>'.$about_btn.'</a>'

    ?>
    
      <!-- ALL CONTENT WITHIN THE WIDGET GOES HERE -->
    
    <?php echo $after_widget;
  }
  // Sanitize widget title on save
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['about_text'] = strip_tags( $new_instance['about_text'] );
    $instance['about_btn'] = strip_tags( $new_instance['about_btn'] );
    $instance['about_link'] = strip_tags( $new_instance['about_link'] );
    $instance['about_img'] = strip_tags( $new_instance['about_img'] );
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

    if ( isset( $instance[ 'about_text' ] ) ) {
      $about_text = $instance[ 'about_text' ];
    }
    else {
      $about_text = __( 'About Text', 'text_domain' );
    }

    if ( isset( $instance[ 'about_btn' ] ) ) {
      $about_btn = $instance[ 'about_btn' ];
    }
    else {
      $about_btn = __( 'About Btn', 'text_domain' );
    }

    if ( isset( $instance[ 'about_link' ] ) ) {
      $about_link = $instance[ 'about_link' ];
    }
    else {
      $about_link = __( 'About Link', 'text_domain' );
    }

    if ( isset( $instance[ 'about_img' ] ) ) {
      $about_img = $instance[ 'about_img' ];
    }
    else {
      $about_img = __( 'About Image', 'text_domain' );
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <label for="<?php echo $this->get_field_id( 'about_text' ); ?>"><?php _e( 'About Text:' ); ?></label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_text' ); ?>" name="<?php echo $this->get_field_name( 'about_text' ); ?>" type="text"><?php echo esc_attr( $about_text ); ?></textarea>
    <label for="<?php echo $this->get_field_id( 'about_btn' ); ?>"><?php _e( 'About Btn Text:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'about_btn' ); ?>" name="<?php echo $this->get_field_name( 'about_btn' ); ?>" type="text" value="<?php echo esc_attr( $about_btn ); ?>" />
    </p>
    <label for="<?php echo $this->get_field_id( 'about_link' ); ?>"><?php _e( 'About Link:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'about_link' ); ?>" name="<?php echo $this->get_field_name( 'about_link' ); ?>" type="text" value="<?php echo esc_attr( $about_link ); ?>" />
    <label for="<?php echo $this->get_field_id( 'about_img' ); ?>"><?php _e( 'About Image:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'about_img' ); ?>" name="<?php echo $this->get_field_name( 'about_img' ); ?>" type="text" value="<?php echo esc_attr( $about_img ); ?>" />
    
    </p>
    <?php 
  }
}
// register our custom widget
add_action( 'widgets_init', 
  create_function( '', 'register_widget( "made_theme_about_widget" );' ) 
); ?>