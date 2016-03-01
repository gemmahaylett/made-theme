<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Made_Theme
 */
?>
<div class="related-post-item">
  <div class="related-thumb">
    <a rel="external" href="<?php the_permalink()?>"><?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?></a>
    <h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
  </div>
</div>