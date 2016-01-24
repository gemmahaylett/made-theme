<?php
/**
 * Template Name: Shop Page
 *
 * This is a full width page template (no sidebar).
 *
 * @package Made_Theme
 */

get_header('shop'); ?>

<section id="primary" role="main" class="col col-md-offset-1 col-md-10">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page-title' ); ?>

			<?php comments_template( '', false ); ?>

		<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_footer(); ?>