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

    <div class="container">
    <div class="row">
      <div class="col-md-8">
        <section class="row">
            <div class="col-md-6 press-col-left">
              <div class="about-link_group">
              <h5>Books &bull; Author & Photographer</h5>
              <?php if ( get_field('books_authored') ) : ?>
                  <?php while ( has_sub_field('books_authored') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('book_link'); ?>" target="_blank"><?php the_sub_field('book_name'); ?></a>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
              <div class="about-link_group">
              <h5>BOOKS &bull; FEATURES & CONTRIBUTIONS</h5>
              <?php if ( get_field('books_contributed') ) : ?>
                  <?php while ( has_sub_field('books_contributed') ) : ?>
                      <div class="media-item">
                        <a href="<?php the_sub_field('book_link'); ?>" target="_blank"><?php the_sub_field('book_name'); ?></a>
                        <span><?php the_sub_field('feature_name'); ?></span>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
              <div class="about-link_group">
              <h5>PARTNERSHIPS</h5>
              <?php if ( get_field('partnerships') ) : ?>
                  <?php while ( has_sub_field('partnerships') ) : ?>
                      <div class="media-item">
                        <a href="<?php the_sub_field('partnership_link'); ?>" target="_blank"><?php the_sub_field('partnership_title'); ?></a>
                        <span><?php the_sub_field('partnership_description'); ?></span>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
              <div class="about-link_group">
              <h5>PUBLIC SPEAKING & TEACHING</h5>
              <?php if ( get_field('public_speaking') ) : ?>
                  <?php while ( has_sub_field('public_speaking') ) : ?>
                      <div class="media-item">
                        <a href="<?php the_sub_field('public_speaking_link'); ?>" target="_blank"><?php the_sub_field('public_speaking_title'); ?></a>
                        <span><?php the_sub_field('public_speaking_role'); ?></span>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6 press-col-right">
              <div class="about-link_group">
              <h5>WEBSITE FEATURES & INTERVIEWS</h5>
              <?php if ( get_field('interviews') ) : ?>
                  <?php while ( has_sub_field('interviews') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('website_link'); ?>" target="_blank"><?php the_sub_field('website_name'); ?></a>
                      <?php if ( get_sub_field('article') ) : ?>
                        <?php while ( has_sub_field('article') ) : ?>
                          <a href="<?php the_sub_field('artilce_link'); ?>" target="_blank"><?php the_sub_field('article_title'); ?></a>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>
              </div>
              <div class="about-link_group">
              <h5>PRINT MAGAZINE FEATURES</h5>
              <?php if ( get_field('magazine') ) : ?>
                  <?php while ( has_sub_field('magazine') ) : ?>
                      <div class="media-item">
                        <p><?php the_sub_field('magazine_name'); ?>
                        <?php the_sub_field('magazine_article'); ?></p>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            <div class="about-link_group">
              <h5>TELEVISION & PODCASTS</h5>
              <?php if ( get_field('shows') ) : ?>
                  <?php while ( has_sub_field('shows') ) : ?>
                      <div class="media-item">
                        <p><?php the_sub_field('show_name'); ?>
                        <span><?php the_sub_field('episode_name'); ?><span></p>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
        </section>
      </div>
    </div>
  </div>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>