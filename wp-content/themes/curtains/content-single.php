<?php
/**
 * @package curtains
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">
	<div class="post-thumb blog-thumb">
		<?php
			$single_featured_image = get_theme_mod( 'single_featured_image',true );
			$single_featured_image_size = get_theme_mod ('single_featured_image_size','1');
			if( $single_featured_image ) : ?>
				<?php if( $single_featured_image_size == '1' ) :
					    if( has_post_thumbnail() && ! post_password_required() ) :   
							the_post_thumbnail('curtains-blog-large-width');   
						else :
							echo '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" />';	
						endif;
					else:
						if( has_post_thumbnail() && ! post_password_required() ) :   
							the_post_thumbnail('curtains-small-featured-image-width');
						else :
							echo '<img src="' . get_template_directory_uri()  . '/images/no-image-small-featured-image-width.png" />';
						endif;
						 
					endif;
				?>
				<span class="date-structure posted-on">				
					<span class="dd"><?php the_time('j'); ?></span>    
					<span class="mm"><?php the_time('M'); ?></span>
				</span>

			<?php else: ?>
				<span class="date-structure posted-on top-date">				
					<span class="dd"><?php the_time('j'); ?></span>
					<span class="mm"><?php the_time('M'); ?></span>
				</span>
			<?php endif; ?>
	</div>

	<header class="entry-header">
			<h3 class="entry-title"><?php the_title( '','' ); ?></h3>
	        <div class="entry-meta">
				<?php curtains_author(); ?>
				<?php curtains_comments_meta(); ?>   
				<?php curtains_edit(); ?> 
			</div><!-- .entry-meta -->	
	</header><!-- .entry-header -->	

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'curtains' ),
				'after'  => '</div>',
			) );
		?>


	<footer class="entry-footer">
		<?php curtains_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php curtains_post_nav(); ?>
</div><!-- .entry-content -->
</article><!-- #post-## -->
