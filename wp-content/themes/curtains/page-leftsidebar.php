<?php
/**
 * Template Name: Sidebar Left
 */

get_header(); ?>

<div id="content" class="site-content">
		<div class="container">
		
	<?php get_sidebar('left'); ?>
 	

    <div id="primary" class="content-area  eleven columns">
			
			<main id="main" class="site-main" role="main">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;
		?>
	
		<?php get_footer(); ?>