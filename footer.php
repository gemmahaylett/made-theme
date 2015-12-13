<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Made_Theme
 */
?>
   </div>
	</div><!-- #main -->
</div><!-- #page -->
<div class="footer-slider-outer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-header">
            <h3>Favorites</h3>
            <div class="bottom-slider-nav">
              <div class="bs-prev"></div>
              <div class="bs-next"></div>
            </div>
          </div>
          <div class="bottom-slider">
              <?php if ( get_field('bottom_slider', 'options') ) : ?>
                <?php while ( has_sub_field('bottom_slider', 'options') ) : ?>
                  <div class="item">
                    <img src="<?php the_sub_field('image', 'options'); ?>"/>
                    <div class="caption">
                      <a href="<?php the_sub_field('link', 'options'); ?>">
                        Read More
                      </a>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<footer id="footer" role="contentinfo">
  <div class="container">
  	<div id="copyright" class="row">
      <div class="col-md-4 col-sm-12 col-xs-12 footer-item-center">
  		&copy; Copyright <?php echo date( 'Y' ); echo '&nbsp;'; echo bloginfo( 'name' ); ?>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 footer-item-center">
        <a href="<?php echo esc_url( home_url() ); ?>/" class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo2.png'" alt="<?php bloginfo('name'); ?>">
        </a>

      </div>
      <nav class="col-md-4 col-sm-12 col-xs-12 footer-item-center" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
      </nav><!-- #access -->
  	</div>
  </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>