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
		<div class="filter">
	<?php wp_nav_menu( array( 'theme_location' => 'recipe-cat') );?>
	</div>

	<?php 
	  if($_GET['category']) {
	  	$cat = get_category_by_slug($_GET['category']);
	    $args = array(
	      'category__and' => $cat->term_taxonomy_id,
	      //'nopaging' => false, 
	      'tag' =>  'recipe', //must use tag id for this field
	      'posts_per_page' => -1
			); //get all posts
			$wp_query = new WP_Query( $args );
		}
		
		?>

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