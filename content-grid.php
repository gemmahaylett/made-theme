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
}

if(is_search()){
  $searchclass="search-item";
}

if(is_mobile() && is_home()) {
  $mobileclass = "mobile-grid";
  $mobiletitle = "mobile-title";
} 
?>


	<div class="col-md-3 col-sm-6 col-xs-12 <?php echo $searchclass;?> <?php echo $taglist;?>">
    <article class="clearfix <?php echo $mobileclass;?>">
  		<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?></a>
  		<div class="<?php echo $mobiletitle?>">
        <h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
  		</h4>
      </div>
    </article>
	</div><!-- .entry-content -->