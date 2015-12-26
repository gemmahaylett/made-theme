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
	<?php if (is_category( )) {
	  $cat = get_query_var('cat');
	  $curcat = get_category ($cat);
		$args = array('categories' => $curcat->term_id);
		$tags = get_category_tags($args); 
		echo '<a href="" class="action filter__item filter__item--selected" data-filter="*">All</button>';
		foreach ($tags as $tag) {
	    echo '<a href=\'?tag=';
	    echo str_replace(' ', '_', $tag->tag_id);
	    echo ' \' class=\'action filter__item filter__item\' data-filter=\'.';
	    echo str_replace(' ', '_', $tag->tag_name);
	    echo '\'>'.$tag->tag_name.'</a>';
		}
	}?>
	</div>

	<?php 

	  if($_GET['tag']) :
			//global $wp_query;
	    //    $args = array(
	    //    'category__and' => $curcat->term_id
	        //'tag__in' =>  $_GET['tag'], //must use tag id for this field
	        //'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )
			//		); //get all posts

			//$posts = get_posts($args);
			echo 'End';
		endif;

		if ( $posts ) : ?>

		<section class="grid grid_posts grid--loading">
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
	    <!-- Grid sizer for a fluid Isotope (Masonry) layout -->
	    <div class="grid__sizer"></div>

		<?php 
			foreach ($posts as $post) :
		 		get_template_part( 'content', 'grid' );
		  endforeach;
    ?>
  	</section>
	
		<?php get_template_part( 'inc/pagination' ); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>