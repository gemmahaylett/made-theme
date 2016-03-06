<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Made_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
  /**
   * @hooked storefront_page_header - 10
   * @hooked storefront_page_content - 20
   */
  do_action( 'storefront_page' );
  ?>
</article><!-- #post-## -->