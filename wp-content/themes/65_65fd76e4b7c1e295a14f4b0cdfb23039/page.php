<?php get_header(); ?>

<div id="content" class="grid_8 <?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "alpha";} else {echo "omega";} ?> <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right";} else {echo "indent-left";} ?>">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
      <article class="post-holder">
        <h1><?php the_title(); ?></h1>
        <div id="page-content">
          <?php the_content(); ?>
          <div class="pagination">
            <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
          </div><!--.pagination-->
        </div><!--#pageContent -->
      </article>
    </div><!--#post-# .post-->

  <?php endwhile; ?>
  
   </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>