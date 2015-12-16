<?php
/**
 * Single post template
 *
 * @package Made_Theme
 */

get_header(); ?>

<section id="primary" class="col-md-8">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content' ); ?>

		<?php comments_template( '', true ); ?>

    <?php 
      $tags = wp_get_post_tags($post->ID);
      if ($tags) {
        $first_tag = $tags[0]->term_id;
        $args=array(
          'tag__in' => array($first_tag),
          'post__not_in' => array($post->ID),
          'posts_per_page'=>4,
          'caller_get_posts'=>1);
      } ?>

    <?php  $related = get_posts( $args );
      if( !empty($related) ) {?>
    <div class="favorites clearfix">
      <h3>MORE FAVORITES</h3>
        <div class="related-posts" data-columns>
          <?php
           foreach( $related as $post ) {
            setup_postdata($post); 
            ?>
            <?php get_template_part( 'content', 'related') ?>   
          <?php }
          wp_reset_postdata(); ?>
        </div>
    </div>
    <?php } ?>

    <?php 
      if (get_posts_count_by_tag($tags[0]->name) > 4) { ?>
      <div class="show-more">
        <button href="#" class="show-more-btn"></button>
      </div>
      <?php } ?>

	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>