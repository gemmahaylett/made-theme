<?php
/*
Template Name: Search Page
*/

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">

  <article id="post-<?php the_ID(); ?>" <?php post_class('search-content'); ?>>
    <h1>Search</h1>
      <form method="get" id="searchform-page" action="http://www.dev.danamadeit.com/">
        <label for="s">
          <i class="fa fa-search"></i>
        </label>
        <input type="text" class="field" name="s" id="s">
        <input type="submit" class="submit" name="submit" id="searchsubmit" value="SEARCH">
      </form>
  </article><!-- #post-<?php the_ID(); ?> -->

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
