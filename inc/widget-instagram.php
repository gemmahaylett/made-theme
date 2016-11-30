<?php 
/**
 * Creates a custom widget 
 * 
 * (This file goes in a WordPress theme and is included into functions.php)
 * 
 */
class made_theme_instagram_widget extends WP_Widget {

  // Register widget with WordPress.

  public function __construct() {
    parent::__construct(
      'made-theme-instagram-widget', // Base ID
      'Instagram Widget', // Name
      array( 'description' => __( 'This is an instagram widget', 'made-theme' ), ) // Args
    );
  }

  // Front-end display of widget.

  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $before_widget;
    if ( ! empty( $title ) )
      echo $before_title . $title . $after_title; ?>
    
      <!-- ALL CONTENT WITHIN THE WIDGET GOES HERE -->
    
      <script>
      jQuery(document).ready(function($){
         var widgetFeed = new Instafeed({
          target: 'widgetfeed',
          get: 'user',
          limit: 4,
          userId: 182650508,
          resolution: 'low_resolution',
          accessToken: '182650508.cebe9f4.658e4fd00ca74073b3401f808c59ce15',
          template: '<div class="col-md-6 col-sm-6 col-xs-6 widgetfeed"><a href="{{link}}"><img src="{{image}}" /></a></div>'
        });

        widgetFeed.run();
      });
      </script>

      <div id="widgetfeed" class="row"></div> 
               
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
  create_function( '', 'register_widget( "made_theme_instagram_widget" );' ) 
); ?>