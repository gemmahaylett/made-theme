<?php
/**
 * The default template for displaying content
 *
 * @package Made_Theme
 */

$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    $taglist = $taglist . $tag->name . ' '; 
  }
}?>

	<div class="grid__item <?php echo $taglist;?>">
		<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?>
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h4>
		<p class="entry-category">
		<?php $categories = get_the_category();
		if ( ! empty( $categories ) ) {
		    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
		}?>
		<?php echo get_the_date(); ?></p>
	</div><!-- .entry-content -->