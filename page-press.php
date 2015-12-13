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
          <div class="press-group">
            <h5>Books &bull; Author & Photographer</h5>
            <div class="press-links">
              <?php if ( get_field('books_authored') ) : ?>
                <?php while ( has_sub_field('books_authored') ) : ?>
                  <div class="media-item">
                    <a href="<?php the_sub_field('book_link'); ?>" target="_blank"><?php the_sub_field('book_name'); ?></a>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>BOOKS &bull; FEATURES & CONTRIBUTIONS</h5>
            <div class="press-links">
              <?php if ( get_field('books_contributed') ) : ?>
                <?php while ( has_sub_field('books_contributed') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('book_link'); ?>" target="_blank"><?php the_sub_field('book_name'); ?></a>
                      <?php if ( get_sub_field('feature_name') ): ?>
                        <span>&nbsp|&nbsp<?php the_sub_field('feature_name'); ?></span>
                      <?php endif; ?>                   
                    </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>PARTNERSHIPS</h5>
            <div class="press-links">
              <?php if ( get_field('partnerships') ) : ?>
                <?php while ( has_sub_field('partnerships') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('partnership_link'); ?>" target="_blank"><?php the_sub_field('partnership_title'); ?></a>
                      <?php if ( get_sub_field('partnership_description') ): ?>
                        <span>&nbsp|&nbsp<?php the_sub_field('partnership_description'); ?></span>
                      <?php endif; ?>
                    </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>PUBLIC SPEAKING & TEACHING</h5>
            <div class="press-links">
            <?php if ( get_field('public_speaking') ) : ?>
                <?php while ( has_sub_field('public_speaking') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('public_speaking_link'); ?>" target="_blank"><?php the_sub_field('public_speaking_title'); ?></a>
                      <?php if ( get_sub_field('public_speaking_role') ): ?>
                        <span>&nbsp|&nbsp<?php the_sub_field('public_speaking_role'); ?></span>
                      <?php endif; ?>
                    </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>WEBSITE FEATURES & INTERVIEWS</h5>
            <div class="press-links">
              <?php if ( get_field('interviews') ) : ?>
                  <?php while ( has_sub_field('interviews') ) : ?>
                    <div class="media-item">
                      <a href="<?php the_sub_field('website_link'); ?>" target="_blank"><?php the_sub_field('website_name'); ?></a>
                      <?php if ( get_sub_field('article') ) : ?>
                        <span>&nbsp|&nbsp</span>
                        <ul>
                        <?php while ( has_sub_field('article') ) : ?>
                          <li><a href="<?php the_sub_field('artilce_link'); ?>" target="_blank"><?php the_sub_field('article_title'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                      <?php endif; ?>
                    </div>
                  <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>PRINT MAGAZINE FEATURES</h5>
            <div class="press-links">
              <?php if ( get_field('magazine') ) : ?>
                  <?php while ( has_sub_field('magazine') ) : ?>
                      <div class="media-item">
                        <p><?php the_sub_field('magazine_name'); ?>
                        <?php if ( get_sub_field('magazine_article') ): ?>
                        <span>&nbsp|&nbsp<?php the_sub_field('magazine_article'); ?></span>
                        <?php endif; ?>
                        </p>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
          </div>
          <div class="press-group">
            <h5>TELEVISION & PODCASTS</h5>
            <div class="press-links">
              <?php if ( get_field('shows') ) : ?>
                  <?php while ( has_sub_field('shows') ) : ?>
                      <div class="media-item">
                        <p><?php the_sub_field('show_name'); ?>
                          <?php if ( get_sub_field('episode_name') ): ?>
                          <span>&nbsp|&nbsp<?php the_sub_field('episode_name'); ?></span>
                          <?php endif; ?>
                      </p>
                      </div>
                  <?php endwhile; ?>
                <?php endif; ?>
            </div>
          </div>
        </section>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>