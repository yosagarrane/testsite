<?php
/**
 * @package curtains
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
<div class="thumb blog-thumb">
		<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    $featured_image_size = get_theme_mod ('featured_image_size','1');
		if( $featured_image ) : 
		        if ( $featured_image_size == '1' ) :?>	  	
						
						  <?php	if( $featured_image && has_post_thumbnail() ) : 
								    the_post_thumbnail('curtains-blog-full-width');
								    else :
										echo '<img src="' . get_template_directory_uri()  . '/images/no-image-blog-full-width.png" />';	
			                         endif;?>
			                    
			             <?php
		                  else: ?>
		 	          
                    <?php if( has_post_thumbnail() && ! post_password_required() ) :   
	                   the_post_thumbnail('curtains-small-featured-image-width');
		               else :
							echo '<img src="' . get_template_directory_uri()  . '/images/no-image-small-featured-image-width.png" />';
					   endif;?>
								
			               <?php 				
	                endif;?>
	            <span class="date-structure posted-on top-date">				
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

		

	<div class="entry-body">
	    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1> 
		<div class="entry-meta">
			<?php curtains_author(); ?>
			<?php curtains_comments_meta(); ?>   
			<?php curtains_edit(); ?> 
		</div><!-- .entry-meta -->	
		<?php echo the_content(__('Read More','curtains')); ?>
		<footer class="entry-footer">
		<?php curtains_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	</div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'curtains' ),
				'after'  => '</div>',
			) );
		?>
		<br class="clear" />
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->