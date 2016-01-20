<?php
/**
 * The default template for displaying content
 *
 * @package Made_Theme
 */

$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    $tagname = str_replace(' ', '_', $tag->name);
    $taglist = $taglist . $tagname . ' '; 
  }
}?>

	<div class="col-md-3 col-sm-6 col-xs-12 <?php echo $taglist;?>">
		<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?>
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h4>
	</div><!-- .entry-content -->