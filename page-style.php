<?php
/**
 * Template Name: Style Page
 *
 * This is a full width page template (no sidebar).
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

  <div class="container">
      <div id="main" class="row">
        <h1>MADE EVERYDAY Styleguide</h1>
        <h1>Color Palette Used</h1>

        <div class="row">
          <div class="col-md-3">
            <h2>Red - #F1625e - $red</h2>
            <div style="background-color: #F1625e; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Yellow - #F4E303 - $yellow</h2>
            <div style="background-color: #F4E303; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Blue - #BCE0E5 - $blue</h2>
            <div style="background-color: #BCE0E5; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Light Gray - #DBD7D3 - $light-gray</h2>
            <div style="background-color: #DBD7D3; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Medium Gray - #828175 - $medium-gray</h2>
            <div style="background-color: #828175; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Dark Gray - #4C4B4C - $dark-gray</h2>
            <div style="background-color: #4C4B4C; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Orange - #F47F50 - $orange</h2>
            <div style="background-color: #F47F50; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
          <div class="col-md-3">
            <h2>Dark Yellow - #D4DC4C - $dark-yellow</h2>
            <div style="background-color: #D4DC4C; height: 50px; width: 50px; margin-bottom: 1em;"></div>
          </div>
        </div>

        <h1>Global Link and Button Styles</h1>

        <a href="#">Main link style</a>

        <div class="post-tags">
          <a href="#">Post Tag link</a>
        </div>

        <div class="press-links">
          <a href="#">About link</a>
        </div>

        <h1>Social Media</h1>

        <?php social_media_nav(); ?>
        
    </div> <!-- end container -->
  </div> <!-- end main-->
</body>
