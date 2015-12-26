<?php
/**
 * Template Name: Press Page
 *
 * This is a full width page template (no sidebar).
 *
 * @package Made_Theme
 */

get_header(); ?>

<section id="primary" role="main" class="col col-md-8">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>

    <section class="row press-grid">
      <?php if ( get_field('press_group') ) : ?>
        <?php while ( has_sub_field('press_group') ) : ?>
          <div class="press-group">
            <h5><?php the_sub_field('press_title'); ?></h5>
            <div class="press-links">
              <?php if ( get_sub_field('press_item') ) : ?>
                  <?php while ( has_sub_field('press_item') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('press_link'); ?>" target="_blank"><?php the_sub_field('press_source'); ?></a>
                      <?php if ( get_sub_field('press_article') ) : ?>
                        <span>&nbsp|&nbsp</span>
                        <ul>
                        <?php while ( has_sub_field('press_article') ) : ?>
                          <li><a href="<?php the_sub_field('article_link'); ?>" target="_blank"><?php the_sub_field('article_name'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </section>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>