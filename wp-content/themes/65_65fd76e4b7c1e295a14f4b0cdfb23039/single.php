<?php get_header(); ?>
<div id="content" class="grid_8 <?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "alpha";} else {echo "omega";} ?> <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right";} else {echo "indent-left";} ?>">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="post-holder single-post">
      
      	<div class="post-header">
        	<strong><?php the_title(); ?></strong>
            <b><?php _e('Posted on', 'theme1599'); ?> <?php the_time('F j, Y'); ?>, <?php _e('by', 'theme1599'); ?> <?php the_author_posts_link() ?></b>
        </div>
      
        <?php $single_image_size = of_get_option('single_image_size'); ?>
				<?php if($single_image_size=='' || $single_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail"><span class="img-wrap">'; the_post_thumbnail(); echo '</span></figure>';
            }
          ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail large"><span class="img-wrap"><span class="f-thumb-wrap">'; the_post_thumbnail('post-thumbnail-xl'); echo '</span></span></figure>';
            }
          ?>
        <?php } ?>
        <div class="post-content">
          <?php the_content(); ?>
		  <?php the_tags(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>

        

			<?php /* If a user fills out their bio info, it's included here */ ?>
      <div id="post-author">
        <h3><?php _e('Written by', 'theme1599'); ?> <?php the_author_posts_link() ?></h3>
        <p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('user_email'), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
        <div id="author-description">
          <?php the_author_meta('description') ?> 
          <div id="author-link">
            <p><?php _e('View all posts by:', 'theme1599'); ?> <?php the_author_posts_link() ?></p>
          </div><!--#author-link-->
        </div><!--#author-description -->
      </div><!--#post-author-->

    </div><!-- #post-## -->
    
    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', __('&laquo; Previous post', 'theme1599')) ?>
      </div><!--.older-->
      <div class="newer">
        <?php next_post_link('%link', __('Next Post &raquo;', 'theme1599')) ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->

    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
  
  </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>