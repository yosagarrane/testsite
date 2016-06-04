<?php
/**
 * Template Name: Fullwidth Page
 */

get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<?php the_content(); ?>
            <div class="pagination">
				<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
            </div><!--.pagination-->
        </div><!--#post-# .post-->
    <?php endwhile; ?>

<?php get_footer(); ?>