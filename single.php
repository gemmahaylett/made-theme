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

    <?php get_template_part( 'content', 'related') ?>

	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>