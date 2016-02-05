<?php
/**
 * Search form template
 *
 * @package Made_Theme
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s">
    <i class="fa fa-search"></i>
  </label>
	<input type="text" class="field" name="s" id="s" placeholder="Search" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'SEARCH', 'made-theme' ); ?>" />
</form>
