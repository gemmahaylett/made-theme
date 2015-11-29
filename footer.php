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
<div class="container">
<div class="col col-md-12">
  <div class="bottom-slider">
      <?php if ( get_field('bottom_slider', 'options') ) : ?>
        <?php while ( has_sub_field('bottom_slider', 'options') ) : ?>
          <div class="item">
              <a href="<?php the_sub_field('link', 'options'); ?>">
                  <img src="<?php the_sub_field('image', 'options'); ?>"/>
              </a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
  </div>
</div>
</div>
<footer id="footer" role="contentinfo" class="row">
	<div id="copyright" class="container">
		&copy; <?php echo date( 'Y' ); echo '&nbsp;'; echo bloginfo( 'name' ); ?><br>
		Site by <a href="designerURI" target="_blank" rel="nofollow">themeDesigner</a> &amp;
		<a href="authorURI" target="_blank" rel="nofollow">themeAuthor</a>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>