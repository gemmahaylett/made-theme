<?php
/**
 * Template Name: About Page
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

    <div class="about-grid">
    <?php if ( get_field('about_box') ) : ?>
      <?php while ( has_sub_field('about_box') ) : ?>
        <div class="about-box">
          <?php the_sub_field('box_content'); ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>

    <?php if ( get_field('about_bottom_content') ) : ?>    
      <?php the_field('about_bottom_content'); ?>
    <?php endif; ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>