<?php
/**
 * Theme functions
 *
 * Sets up the theme and provides some helper functions.
 *
 * @package Made_Theme
 */

/* OEMBED SIZING
 ========================== */
 
if ( ! isset( $content_width ) )
	$content_width = 600;
	
	
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
    array('primary' => __( 'Primary Menu', 'little-farm-media' ),
          'social-media' => __( 'Social Media Menu', 'little-farm-media')
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
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
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
	wp_enqueue_style( 'made-theme-style', get_stylesheet_uri() );
	
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

   wp_enqueue_script(
    'vendor-masonry',
    get_template_directory_uri() . '/assets/vendor/isotope.pkgd.min.js',
    array('jquery')
  );

  wp_enqueue_script(
    'vendor-mixitup',
    get_template_directory_uri() . '/assets/vendor/flickity.pkgd.min.js',
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
	// theme scripts
	wp_enqueue_script(
		'theme-init',
		get_template_directory_uri() . '/assets/theme.js',
		array('jquery'),
		'1.0.0',
		true
	);

}    
add_action('wp_enqueue_scripts', 'made_theme_scripts');


/* MISC EXTRAS
 ========================== */
 
// Comments & pingbacks display template
include('inc/functions/comments.php');
include('inc/functions/navwalker.php');

// Widgets
include_once( 'inc/widget-about.php' );
include_once( 'inc/widget-form.php' );
include_once( 'inc/widget-link.php' );
include_once( 'inc/widget-popular-posts.php' );
include_once( 'inc/widget-instagram.php' );
include_once( 'inc/widget-social.php' );

// Optional Customizations
// Includes: TinyMCE tweaks, admin menu & bar settings, query overrides
include('inc/functions/customizations.php');

/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function social_media_nav($nav = 'social-media') {
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'Social Media Menu', 'made-theme' ),              // nav name
        'menu_class' => 'social-media-menu',              // adding custom nav class
        'theme_location' => $nav,                             // where it's located in the theme
        'before' => '',                                             // before the menu
        'after' => '',                                            // after the menu
        'link_before' => '',                                      // before each link
        'link_after' => '',                                       // after each link
        'depth' => 1,                                             // limit the depth of the nav
        'fallback_cb' => 'wp_social_navwalker::fallback',  // fallback
        'walker' => new wp_social_navwalker()                     
    ));
} /* end social nav */