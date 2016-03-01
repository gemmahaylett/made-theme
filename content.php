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
		<span class="entry-category"><?php echo get_the_date(); ?></span>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'made-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<?php 
			if (has_post_thumbnail( $post->ID ) ): 
				$pinimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
			endif;
		?>
		
		<ul class="comments-footer">
			<li class="comments-link">
				<span><?php comments_number( 'no comments yet', '1 comment', '% comments' ); ?></span>
			</li>
			<li class="comments-link">
				<?php comments_popup_link( 
					 __( 'Leave a comment', 'made-theme' ), 
					 __( 'Leave a comment', 'made-theme' ), 
					 __( 'Leave a comment', 'made-theme' ) ); 
				?>
			</li>
			<li class="share-love">
				SHARE THE LOVE: 
			</li>
			<li>
				<ul id="social-share-menu" class="social-media-menu square-icons comment-icons">
		      <li><a title="Facebook" target-"_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>"><i class="icon-fixed-width fa fa-facebook"></i></a></li>
		    	<li><a title="Instagram" target-"_blank" href="<?php the_field( 'instagram', 'options' ); ?>"><i class="icon-fixed-width fa fa-instagram"></i></a></li>
		    	<li><a title="Pinterest" target-"_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinimage[0]; ?>&description=<?php the_title(); ?>"><i class="icon-fixed-width fa fa-pinterest-p"></i></a></li>
		    	<li><a title="Twitter" target-"_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="icon-fixed-width fa fa-twitter"></i></a></li>
		    </ul>
			</li>
		</ul>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->