<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Made_Theme
 */
?>

<!DOCTYPE html>
 
<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <!-- favicon & links -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->

    <!-- all other scripts are enqueued via functions.php -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <?php // Lets other plugins and files tie into our theme's <head>:
    wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>
	<div id="page">
		<header id="site-header" role="banner" class="row">            
			<a href="<?php echo esc_url( home_url() ); ?>/" class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo.png'" alt="<?php bloginfo('name'); ?>">
			</a>
            <div class="container">
              <div class="row">
    			<nav class="col-md-8 inline-list row access" role="navigation">
    				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    			</nav><!-- #access -->
                <div class="col-md-4">
                    <?php social_media_nav(); ?>
                </div>
              </div>
            </div>
            <div class="top-slider">
                <?php if ( get_field('top_slider', 'options') ) : ?>
                  <?php while ( has_sub_field('top_slider', 'options') ) : ?>
                    <div class="item">
                        <a href="<?php the_sub_field('link', 'options'); ?>">
                            <img src="<?php the_sub_field('image', 'options'); ?>"/>
                        </a>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
		</header><!-- #branding -->

     <div class="container">
		<div id="main" class="row">