<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
  
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>

<script>
;(function(window) {
	jQuery(".thumbnails").find("a.zoom").unbind('click');
	jQuery('.thumbnails .zoom').on('click', function(e){
	    e.preventDefault();
	    var photo_fullsize =  jQuery(this).attr('href');
	    console.log( photo_fullsize );
	    jQuery('.woocommerce-main-image img').attr('src', photo_fullsize);
	    jQuery('.woocommerce-main-image img').attr('srcset', photo_fullsize);
	    jQuery('a.woocommerce-main-image').attr('href', photo_fullsize);
	    return false;
	 });
})(window);
</script>
