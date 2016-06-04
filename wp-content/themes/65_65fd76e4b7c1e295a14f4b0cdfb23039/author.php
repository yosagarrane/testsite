<?php get_header(); ?>
<div id="content" class="grid_8 <?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "alpha";} else {echo "omega";} ?> <?php echo of_get_option('blog_sidebar_pos') ?>">
	<div class="<?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "indent-right-1";} else {echo "indent-left-1";} ?>">

	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div class="author-info">
    <h1><?php _e('About:', 'theme1599'); ?> <?php echo $curauth->display_name; ?></h1>
    <p class="avatar">
      <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '120' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
    </p>
    
    <?php if($curauth->description !="") { /* Displays the author's description from their WordPress profile */ ?>
      <p><?php echo $curauth->description; ?></p>
    <?php } ?>
  </div><!--.author-->
  <div id="recent-author-posts">
    <h3><?php _e('Recent Posts by', 'theme1599'); ?> <?php echo $curauth->display_name; ?></h3>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
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
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          <?php _e('No posts by', 'theme1599'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1599'); ?>
        </p>
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
  </div><!--#recentPosts-->
  <div id="recent-author-comments">
    <h3><?php _e('Recent Comments by', 'theme1599'); ?> <?php echo $curauth->display_name; ?></h3>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s', 'theme1599'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    <?php _e('No comments by', 'theme1599'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1599'); ?>
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

   </div>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>