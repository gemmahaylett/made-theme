<?php 
/**
 * Creates a form widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */
class made_theme_social_widget extends WP_Widget {

  // Register widget with WordPress.

  public function __construct() {
    parent::__construct(
      'made-theme-social-widget', // Base ID
      'Social Widget', // Name
      array( 'description' => __( 'This is a social media widget', 'made-theme' ), ) // Args
    );
  }


  // Front-end display of widget.

  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $before_widget; 
    if ( ! empty( $title ) ) 
      echo '<h3>' . $title . '</h3>';

    ?>

    <ul id="social-sidebar-menu" class="social-media-menu square-icons widget-icons">
      <li><a title="Facebook" href="<?php the_field( 'facebook', 'options' ); ?>"><i class="icon-fixed-width fa fa-facebook"></i></a></li>
      <li><a title="Instagram" href="<?php the_field( 'instagram', 'options' ); ?>"><i class="icon-fixed-width fa fa-instagram"></i></a></li>
      <li><a title="Pinterest" href="<?php the_field( 'pinterest', 'options' ); ?>"><i class="icon-fixed-width fa fa-pinterest-p"></i></a></li>
      <li><a title="You Tube" href="<?php the_field( 'youtube', 'options' ); ?>"><i class="icon-fixed-width fa fa-youtube-play"></i></a></li>
    </ul>

    <?php echo $after_widget;
  }


  // Sanitize widget title on save

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = strip_tags( $new_instance['title'] );

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
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
  }

}

// register our custom widget
add_action( 'widgets_init', 
  create_function( '', 'register_widget( "made_theme_social_widget" );' ) 
); ?>