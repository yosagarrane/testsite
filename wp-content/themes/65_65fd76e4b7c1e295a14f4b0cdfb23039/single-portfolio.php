<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  	<?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="single-post">
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
        <div class="post-content wrapper">
        <?php if($lightbox!=""){ ?>
          <figure class="featured-thumbnail"><a class="image-wrap" href="<?php echo $lightbox;?>" rel="prettyPhoto" title="<?php the_title();?>"><?php the_post_thumbnail( 'portfolio-post-thumbnail' ); ?></a></figure>
        <?php }else{ ?>
          <div class="featured-thumbnail"><?php the_post_thumbnail( 'portfolio-post-thumbnail' ); ?></div>
          <?php } ?>
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>
    </div><!-- #post-## -->
    
    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>

<?php get_footer(); ?>