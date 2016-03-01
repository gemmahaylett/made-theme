<?php
/**
 * Main Template File
 *
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Made_Theme
 */

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">


		<?php if ( $wp_query->have_posts() ) : ?>

		<section class="grid grid_posts grid--loading">
			<!-- <img class="grid__loader" src="/wp-content/themes/made-theme/assets/images/grid.svg" width="60" alt="Loader image" /> -->
				<?php 
				  $count = 0;
					while ($wp_query->have_posts()) {

						$wp_query->the_post();
				 		get_template_part( 'content', 'grid' );
				 		
				  }
		    ?>
  	</section>
	
		<?php get_template_part( 'inc/pagination' ); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>