<?php get_header(); ?>
<div id="content" class="grid_8 <?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "alpha";} else {echo "omega";} ?> <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right-1";} else {echo "indent-left-1";} ?>">

  <h1><?php printf( __( 'Tag Archives: %s', 'theme1599' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
  <!-- displays the tag's description from the WordPress admin -->
  <?php echo tag_description(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
      
      	<div class="post-header">
        	<strong><?php the_title(); ?></strong>
            <b><?php _e('Posted on', 'theme1599'); ?> <?php the_time('F j, Y'); ?>, <?php _e('by', 'theme1599'); ?> <?php the_author_posts_link() ?></b>
        </div>
        
        <div class="post-content">
      
        <?php $post_image_size = of_get_option('post_image_size'); ?>
				<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail"><span class="img-wrap"><a href="'; the_permalink(); echo '">';
            echo the_post_thumbnail();
            echo '</a></span></figure>';
            }
          ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) {
            echo '<figure class="featured-thumbnail large"><span class="img-wrap clearfix"><span class="f-thumb-wrap"><a href="'; the_permalink(); echo '">';
            echo the_post_thumbnail('post-thumbnail-xl');
            echo '</a></span></span></figure>';
            }
          ?>
        <?php } ?>
        
          <?php $post_excerpt = of_get_option('post_excerpt'); ?>
      		<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
            <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></div>
          <?php } ?>
        </div>
        
        <div class="post-footer">
            <a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'theme1599'); ?></a>
            <em><?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comments-link', 'Comments are closed'); ?></em>
        </div>
        
    </article>
    
  <?php endwhile; else: ?>
    <div class="no-results">
    	<?php echo '<p><strong>' . __('There has been an error.', 'theme1599') . '</strong></p>'; ?>
      <p><?php _e('We apologize for any inconvenience, please', 'theme1599'); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1599'); ?></a> <?php _e('or use the search form below.', 'theme1599'); ?></p>
      <?php get_search_form(); /* outputs the default WordPress search form */ ?>
    </div><!--no-results-->
  <?php endif; ?>
    
    <?php if(function_exists('wp_pagenavi')) : ?>
			<?php wp_pagenavi(); ?>
    <?php else : ?>
      <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="oldernewer">
          <div class="older">
            <?php next_posts_link( __('&laquo; Older Entries', 'theme1599')) ?>
          </div><!--.older-->
          <div class="newer">
            <?php previous_posts_link(__('Newer Entries &raquo;', 'theme1599')) ?>
          </div><!--.newer-->
        </nav><!--.oldernewer-->
      <?php endif; ?>
    <?php endif; ?>
    <!-- Page navigation -->
   
   </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>