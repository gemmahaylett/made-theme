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

    <?php get_template_part( 'inc/pagination-title' ); ?>

    <?php 
      $cat = wp_get_post_categories($post->ID);
      if ($cat) {
        $first_cat = $cat[0];
        $args=array(
          'category' => array($first_cat),
          'post__not_in' => array($post->ID),
          'posts_per_page'=>4,
          'caller_get_posts'=>1);
        $postsInCat = get_term_by('id',$first_cat,'category');
      } ?>

    <?php  $related = get_posts( $args );
      if( !empty($related) ) {?>
    <div class="favorites row clearfix">
      <h3>MORE FAVORITES</h3>
        <div class="related-posts col-md-12" data-columns>
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
      if ($postsInCat->count > 4) { ?>
      <div class="show-more">
        <button href="#" class="show-more-btn"></button>
      </div>
      <?php } ?>

	<?php endwhile; // end of the loop. ?>
</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>