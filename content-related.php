<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Made_Theme
 */
?>
<div class="favorites">
<h3>MORE FAVORITES</h3>
<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
if( !empty($related) ) {?>
  <div class="related-posts">
    <?php

     foreach( $related as $post ) {
      setup_postdata($post); 
      ?>
        
      <div class="related-post-item">
        <div class="related-thumb">
          <a rel="external" href="<?php the_permalink()?>"><?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?></a>
          <h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
          <p class="entry-category">
            <span class="entry-author">By <?php the_author(); ?></span>
            <?php echo get_the_date(); ?>
          </p>
        </div>
      </div>
         
    <?php }
    wp_reset_postdata(); ?>
  </div>
</div>
<div class="show-more">
  <button href="#" class="show-more-btn"></button>
</div>
<?php } ?>