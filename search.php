<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Made_Theme
 */

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="entry-title text-center"><?php printf( __( 'Search Results for: %s', 'made-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>

		<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', 'grid');
				?>

			<?php endwhile; ?>

		<?php get_template_part( 'inc/pagination' ); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>