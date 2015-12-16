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
      <article id="post-<?php the_ID(); ?>" <?php post_class('ask-content'); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->
      </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // end of the loop. ?>
 
    <div class="fav-grid clearfix">
      <?php if ( get_field('posts') ) : ?>
        <?php while ( has_sub_field('posts') ) : ?>
          <div class="fav-post">
            <a href="<?php the_sub_field('post_link'); ?>">
                <img src="<?php the_sub_field('post_image'); ?>"/>
            </a>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>