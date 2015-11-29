<?php 
/**
 * Creates a form widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */
class made_theme_form_widget extends WP_Widget {

  // Register widget with WordPress.

  public function __construct() {
    parent::__construct(
      'made-theme-form-widget', // Base ID
      'Form Widget', // Name
      array( 'description' => __( 'This is a form widget', 'made-theme' ), ) // Args
    );
  }


  // Front-end display of widget.

  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $form_class = apply_filters( 'widget_title', $instance['form_class'] );
    $form_action = apply_filters( 'widget_title', $instance['form_action'] );

    echo $before_widget; ?>
    
      <!-- ALL CONTENT WITHIN THE WIDGET GOES HERE -->
      
    <div class="<?php echo $form_class;?>"> 
      <h3><?php echo $title;?></h3>             
      <form class="input_group" action="<?php echo $form_action?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>  
        <input type="text" name="EMAIL"/>
        <button type="submit" class="btn"></button>
      </form>
    </div>
    
    <?php echo $after_widget;
  }


  // Sanitize widget title on save

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['form_class'] = strip_tags( $new_instance['form_class'] );
    $instance['form_action'] = strip_tags( $new_instance['form_action'] );

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
    if ( isset( $instance[ 'form_class' ] ) ) {
      $form_class = $instance[ 'form_class' ];
    }
    else {
      $form_class = __( 'New Form Class', 'text_domain' );
    }
    if ( isset( $instance[ 'form_action' ] ) ) {
      $form_action = $instance[ 'form_action' ];
    }
    else {
      $form_action = __( 'New Form Action', 'text_domain' );
    }
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <label for="<?php echo $this->get_field_id( 'form_class' ); ?>"><?php _e( 'Form Class:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'form_class' ); ?>" name="<?php echo $this->get_field_name( 'form_class' ); ?>" type="text" value="<?php echo esc_attr( $form_class ); ?>" />
    <label for="<?php echo $this->get_field_id( 'form_action' ); ?>"><?php _e( 'Form Action:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'form_action' ); ?>" name="<?php echo $this->get_field_name( 'form_action' ); ?>" type="text" value="<?php echo esc_attr( $form_action ); ?>" />
    </p>
    <?php 
  }

}

// register our custom widget
add_action( 'widgets_init', 
  create_function( '', 'register_widget( "made_theme_form_widget" );' ) 
); ?>