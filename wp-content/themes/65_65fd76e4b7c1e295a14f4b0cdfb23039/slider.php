<div id="slider" class="nivoSlider">
  <?php $posts_counter = 0; ?>
  <?php
		query_posts("post_type=slider&posts_per_page=-1&post_status=publish");
		while ( have_posts() ) : the_post(); $posts_counter++;
	?>
  <?php
		$custom = get_post_custom($post->ID);
		$url = get_post_custom_values("slider-url");
		$sl_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-post-thumbnail');
		$tab_title = get_post_custom_values("tab-title");
	?>
  <?php if(has_post_thumbnail( $the_ID) || $sl_thumb!=""){ ?>
  
    	
		<?php if($url!=""){ ?>
    <?php echo "<a href='" . $url[0] . "'>";
					echo "<img src='";
					echo $sl_image_url[0];
										echo "' alt='";
					echo $tab_title[0];
					echo "' title='#sliderCaption" . $posts_counter . "' />";
										echo "</a>"; ?>
    <?php }else{ ?>
    <?php echo "<img src='";
					echo $sl_image_url[0];
										echo "' alt='";
					echo $tab_title[0];
					echo "' title='#sliderCaption" . $posts_counter . "' />"; ?>
    <?php } ?>
  
  
  
  
  <?php } ?>
  <?php endwhile; ?>
  <?php wp_reset_query();?>
</div>
<?php $posts_counter = 0; ?>
<?php
	query_posts("post_type=slider&posts_per_page=-1&post_status=publish");
	while ( have_posts() ) : the_post(); $posts_counter++;
?>
<?php
	$custom = get_post_custom($post->ID);
?>
<div id="sliderCaption<?php echo $posts_counter ?>" class="nivo-html-caption">
  <?php the_content(); ?>
</div>
<?php endwhile; ?>
<?php wp_reset_query();?>