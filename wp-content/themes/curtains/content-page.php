<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package curtains
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
	   <?php if( has_post_thumbnail() && ! post_password_required() ) :   
				the_post_thumbnail('curtains-blog-large-width'); 
		 endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'curtains' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
		<?php edit_post_link( __( 'Edit', 'curtains' ), '<footer class="entry-footer"><span class="edit-link"><i class="fa fa-edit"></i>', '</span></footer>' ); ?>


</article><!-- #post-## -->
