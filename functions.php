<?php
/**
 * Theme functions
 *
 * Sets up the theme and provides some helper functions.
 *
 * @package Made_Theme
 */

update_option('siteurl','localhost/made');
update_option('home','localhost/made');

/* OEMBED SIZING
 ========================== */
 
if ( ! isset( $content_width ) )
	$content_width = 690;
	
	
/* THEME SETUP
 ========================== */
 
if ( ! function_exists( 'made_theme_setup' ) ):
function made_theme_setup() {

	// Available for translation
	load_theme_textdomain( 'made-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add custom nav menu support
	register_nav_menus( 
    array('primary' => __( 'Primary Menu', 'made-media' ),
          'social-media' => __( 'Social Media Menu', 'made-media'),
          'footer' => __( 'Footer Menu', 'made-media')
  ));
	
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	// Add custom image sizes
	// add_image_size( 'name', 500, 300 );
}
endif;
add_action( 'after_setup_theme', 'made_theme_setup' );


/* SIDEBARS & WIDGET AREAS
 ========================== */
function made_theme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'made-theme' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-12 col-sm-12 col-xs-12">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'made_theme_widgets_init' );


/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function made_theme_scripts() {
	// theme style.css file
	wp_enqueue_style( 'made-theme-style', get_stylesheet_uri());
	
	// threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// vendor scripts
  wp_enqueue_script(
    'vendor-instafeed',
    get_template_directory_uri() . '/assets/vendor/instafeed.min.js',
    array('jquery')
  );
  
	// vendor scripts
	wp_enqueue_script(
		'vendor-modernizer',
		get_template_directory_uri() . '/assets/vendor/modernizr.custom.js',
		array('jquery')
	);
	wp_enqueue_script(
		'vendor-slider',
		get_template_directory_uri() . '/assets/vendor/owl.carousel.min.js',
		array('jquery'),
		'1.0.0',
		true
	);
  wp_enqueue_script(
    'vendor-nav',
    get_template_directory_uri() . '/assets/vendor/jquery.flexnav.min.js',
    array('jquery'),
    '1.0.0',
    true
  );

  wp_enqueue_script( 'ajax-pagination',  
    get_stylesheet_directory_uri() . '/assets/vendor/ajax-pagination.js', 
    array( 'jquery' ), 
    '1.0', 
    true 
  );
	// theme scripts
	wp_enqueue_script(
		'theme-init',
		get_template_directory_uri() . '/assets/theme.js',
		array('jquery'),
		'1.0.0',
		true
	);

  global $wp_query;
  wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'query_vars' => json_encode( $wp_query->query ),
    'post_id' => json_encode ($wp_query->post->ID)
  ));
}    
add_action('wp_enqueue_scripts', 'made_theme_scripts', 40);


/* MISC EXTRAS
 ========================== */
 
// Comments & pingbacks display template
include('inc/functions/comments.php');

// Widgets
include_once( 'inc/widget-about.php' );
include_once( 'inc/widget-form.php' );
include_once( 'inc/widget-feedform.php' );
include_once( 'inc/widget-link.php' );
include_once( 'inc/widget-popular-posts.php' );
include_once( 'inc/widget-instagram.php' );
include_once( 'inc/widget-social.php' );

// Optional Customizations
// Includes: TinyMCE tweaks, admin menu & bar settings, query overrides
include('inc/functions/customizations.php');
