<?php
/**
 * The default template for displaying content
 *
 * @package Made_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'made-theme' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>	
		<span class="entry-date">
		<?php $categories = get_the_category(array('hierarchical'=> 1));
		if ( ! empty( $categories ) ) {
		    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
		}?>
		</span> 
		<span class="entry-category"><?php echo get_the_date(); ?></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo get_the_post_thumbnail( $page->ID, 'full' ); ?>
		<?php $content = get_the_content();
	  $trimmed_content = wp_trim_words( $content, 60, '<a href="'. get_permalink() .'">...[ read more ]</a>' ); ?>
	  <p><?php echo $trimmed_content; ?></p>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'made-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		
		<?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'made-theme' ) , ', ', '</div>' ); ?>
		
		<div class="comments-link">
			<?php comments_popup_link( 
				 __( 'Leave a comment +', 'made-theme' ), 
				 __( 'Leave a comment +', 'made-theme' ), 
				 __( 'Leave a comment +', 'made-theme' ) ); 
			?>
		</div>
		<div class="comments-link">
			SHARE THE LOVE: 
			<ul id="social-share-menu" class="social-media-menu square-icons">
	      <li><a title="Facebook" target-"_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>"><i class="icon-fixed-width fa fa-facebook"></i></a></li>
		    <li><a title="Instagram" target-"_blank" href="<?php the_field( 'instagram', 'options' ); ?>"><i class="icon-fixed-width fa fa-instagram"></i></a></li>
		    <li><a title="Pinterest" target-"_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"><i class="icon-fixed-width fa fa-pinterest-p"></i></a></li>
		    <li><a title="Twitter" target-"_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="icon-fixed-width fa fa-twitter"></i></a></li>
		  </ul>
		</div>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->