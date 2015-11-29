<?php
/**
 * Template Name: Ask Page
 *
 * This is a full width page template (no sidebar).
 *
 * @package Made_Theme
 */

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->
      </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>

    <?php if ( get_field('posts') ) : ?>
      <?php while ( has_sub_field('post') ) : ?>
        <div class="ask-post">
          <?php the_sub_field('post'); ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>