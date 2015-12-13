<?php
/*
Template Name: Search Page
*/

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">

  <article id="post-<?php the_ID(); ?>" <?php post_class('ask-content'); ?>>
    <div class="entry-content">
      <h1>Search</h1>
      <?php get_search_form(); ?>
    </div><!-- .entry-content -->
  </article><!-- #post-<?php the_ID(); ?> -->

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
