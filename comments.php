<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to made_theme_comment() which is
 * located in the functions.php file.
 *
 * @package Made_Theme
 */
?>
<div id="commentlist" class="row">
	<div class="col-md-12">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'made-theme' ); ?></p>
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * See made_theme_comment() in inc/functions/comments.php for more.
				 */
				wp_list_comments( array( 'callback' => 'made_theme_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'made-theme' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'made-theme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'made-theme' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'made-theme' ); ?></p>
	<?php endif; ?>
	
	<div id="comments">
	<?php 
	$fields = array (
		'author' => '<p class="comment-form-author"><input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email' => '<p class="comment-form-email"><input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>'
		);
	comment_form( 
		array(
			 'title_reply' => '<div class="comment-form-title">Leave a Comment</div>',
			 'comment_notes_before' => '',
			 'label_submit' => 'COMMENT',
			 'fields' => $fields,
			 'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="COMMENT"></textarea>'
		 ) 
	); ?>
	</div>
	      	
</div>
</div><!-- #comments -->

<script>
	;(function(window) {
		jQuery(".comment.depth-1").append("<hr>");
	})(window);
</script>
