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
    
    <title><?php wp_title( '', true, 'right' ); ?></title>
    
    <!-- favicon & links -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/made-sec.png" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <!-- all other scripts are enqueued via functions.php -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <?php // Lets other plugins and files tie into our theme's <head>:
    wp_head(); ?>
</head>

<?php if(is_mobile()) {
  $mobileclass = "mobile-header";
  $mobilehide = "hidden";
} ?>
 
<body <?php body_class(); ?>>
	<div id="page">
		<header id="site-header" role="banner" class="row <?php echo $mobileclass;?>">
            <div class="header"> 
                <div class="container">
                    <div class="shop-link row">
                        <div class="shop-circle col-md-12">
                            <a href="<?php echo esc_url( home_url( '/', 'http') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-link.png"></a>
                        </div>
                    </div> 
                    <a href="<?php echo esc_url( home_url( '', 'http') ); ?>/" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo.png'" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>  

                <hr>     

                <div class="container">
                    <div class="row">
                        <div class="menu-button">Menu</div>
            			<nav class="access col-md-12 col-sm-12 col-xs-12" role="navigation">
            				<?php wp_nav_menu( array( 
                                'theme_location' => 'primary',
                                'menu_class' => 'flexnav', //Adding the class for FlexNav
                                'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>', // Adding data-breakpoint for FlexNav
                            )); ?>
                          <ul id="social-header-menu" class="social-media-menu">
                              <li><a title="Facebook" href="<?php the_field( 'facebook', 'options' ); ?>" target="_blank"><i class="icon-fixed-width fa fa-facebook"></i></a></li>
                              <li><a title="Instagram" href="<?php the_field( 'instagram', 'options' ); ?>" target="_blank"><i class="icon-fixed-width fa fa-instagram"></i></a></li>
                              <li><a title="Pinterest" href="<?php the_field( 'pinterest', 'options' ); ?>" target="_blank"><i class="icon-fixed-width fa fa-pinterest"></i></a></li>
                              <li><a title="Twitter" href="<?php the_field( 'twitter', 'options' ); ?>" target="_blank"><i class="icon-fixed-width fa fa-twitter"></i></a></li>
                              <li><a title="You Tube" href="<?php the_field( 'youtube', 'options' ); ?>" target="_blank"><i class="icon-fixed-width fa fa-youtube-play"></i></a></li>
                              <li class="search-form">
                                <form method="get" id="searchform-header" action="<?php echo esc_url( home_url( '/', 'http' ) ); ?>">
                                  <input type="text" class="field" name="s" id="search-header" />
                                  <input type="submit" class="submit hidden" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'SEARCH', 'made-theme' ); ?>" />
                                  <label for="s"><i class="fa fa-search"></i></label>
                                </form>
                              </li>
                              <li class="search-icon"><a title="Search" href="/made/search"><i class="icon-fixed-width fa fa-search"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                  
            
            </div>

            <?php if(is_shop() && !is_mobile()){ ?>
            <div class="shop-slider">
              <?php if ( get_field('shop_slider', 'options') ) : ?>
                <?php while ( has_sub_field('shop_slider', 'options') ) : ?>
                  <div class="item">
                      <a href="<?php the_sub_field('link', 'options'); ?>">
                          <img src="<?php the_sub_field('image', 'options'); ?>"/>
                      </a>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
          </div>
          <?php } else { 
            if(!is_mobile()) :?>
              <hr>
            <?php endif; ?>
          <?php } ?>

		</header><!-- #branding -->

<div class="container">
    <div id="main" class="row">