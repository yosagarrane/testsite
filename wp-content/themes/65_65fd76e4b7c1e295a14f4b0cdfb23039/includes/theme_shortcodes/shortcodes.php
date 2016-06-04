<?php
// Grid Columns
function grid_column($atts, $content=null, $shortcodename ="")
{	
	$alpha = '';
	$omega = '';
	if (isset($atts[0]) && trim($atts[0]) == 'alpha') $alpha = ' alpha';
	if (isset($atts[0]) && trim($atts[0]) == 'omega') $omega = ' omega';
	if (isset($atts[0]) && trim($atts[0]) == 'alpha-omega') {
	$alpha = ' alpha';
	$omega = ' omega';
	} 
	
	//remove wrong nested <p>
	$content = remove_invalid_tags($content, array('p'));

	// add divs to the content
	$return .= '<div class="'.$shortcodename.' '.$alpha.$omega.'">';
	$return .= do_shortcode($content);
	$return .= '</div>';

	return $return;
}
add_shortcode('grid_1', 'grid_column');
add_shortcode('grid_2', 'grid_column');
add_shortcode('grid_3', 'grid_column');
add_shortcode('grid_4', 'grid_column');
add_shortcode('grid_5', 'grid_column');
add_shortcode('grid_6', 'grid_column');
add_shortcode('grid_7', 'grid_column');
add_shortcode('grid_8', 'grid_column');
add_shortcode('grid_9', 'grid_column');
add_shortcode('grid_10', 'grid_column');
add_shortcode('grid_11', 'grid_column');
add_shortcode('grid_12', 'grid_column');
add_shortcode('grid_13', 'grid_column');
add_shortcode('grid_14', 'grid_column');
add_shortcode('grid_15', 'grid_column');
add_shortcode('grid_16', 'grid_column');
add_shortcode('grid_17', 'grid_column');
add_shortcode('grid_18', 'grid_column');
add_shortcode('grid_19', 'grid_column');
add_shortcode('grid_20', 'grid_column');
add_shortcode('grid_21', 'grid_column');
add_shortcode('grid_22', 'grid_column');
add_shortcode('grid_23', 'grid_column');
add_shortcode('grid_24', 'grid_column');




// Fluid Columns
function fluid_column($atts, $content=null, $shortcodename ="")
{	
	$last = '';
	if (isset($atts[0]) && trim($atts[0]) == 'last')  $last = 'last';
	
	//remove wrong nested <p>
	$content = remove_invalid_tags($content, array('p'));


	// add divs to the content
	$return .= '<div class="'.$shortcodename.' '.$last.'">';
	$return .= do_shortcode($content);
	$return .= '</div>';
	
	if($last != '') $return .= '<div class="clear"></div>';

	return $return;
}
add_shortcode('one_half', 'fluid_column');
add_shortcode('one_third', 'fluid_column');
add_shortcode('two_third', 'fluid_column');
add_shortcode('one_fourth', 'fluid_column');
add_shortcode('three_fourth', 'fluid_column');
add_shortcode('one_fifth', 'fluid_column');
add_shortcode('two_fifth', 'fluid_column');
add_shortcode('three_fifth', 'fluid_column');
add_shortcode('four_fifth', 'fluid_column');
add_shortcode('one_sixth', 'fluid_column');
add_shortcode('five_sixth', 'fluid_column');

	
	
	
	
//Recent Posts
function shortcode_recent_posts($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'type' => 'post',											 
				'category' => '',
				'custom_category' => '',
				'num' => '5',
				'meta' => 'true',
				'thumb' => 'true',
				'thumb_size' => 'post-thumbnail',
				'more_text_single' => '',
				'excerpt_count' => '0',
				'custom_class' => '',
				'more_link' => '',
				'more_text' => ''
		), $atts));

		$output = '<ul class="recent-posts '.$custom_class.'">';

		global $post;
		global $my_string_limit_words;

		$latest = get_posts('post_type='.$type.'&category_name='.$category.'&'.$type.'_category='.$custom_category.'&orderby=post_date&order=desc&numberposts='.$num);
		
		foreach($latest as $post) {
				setup_postdata($post);
				$excerpt = get_the_excerpt();

				$output .= '<li class="entry">';
				
				if ($thumb == 'true') {
					if ( has_post_thumbnail($post->ID) ){
							$output .= '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'"><div class="thumb-wrap">';
							$output .= get_the_post_thumbnail($post->ID, "$thumb_size", array( "class" => "thumb" ));
							$output .= '</div></a>';
					}
				}
						$output .= '<h5><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= get_the_title($post->ID);
						$output .= '</a></h5>';
						if($meta == 'true'){
								$output .= '<span class="meta">';
										$output .= __('Posted on ', 'theme1599');
										$output .= get_the_time( get_option( 'date_format' ) );
								$output .= '</span>';
						}
				if($excerpt_count >= 1){
					$output .= '<div class="excerpt">';
						$output .= my_string_limit_words($excerpt,$excerpt_count);
					$output .= '</div>';
				}
				if($more_text_single!=""){
					$output .= '<a href="'.get_permalink($post->ID).'" class="button" title="'.get_the_title($post->ID).'">';
					$output .= $more_text_single;
					$output .= '</a>';
				}
				$output .= '<div class="clear"></div>';
				$output .= '</li><!-- .entry (end) -->';

		}
		$output .= '</ul><!-- .recent-posts (end) -->';
		if($more_link!=""){
			$output .= '<a href="';
				$output .= $more_link;
			$output .= '" class="button">'. $more_text .'</a>';
		}
		return $output;
		
}

add_shortcode('recent_posts', 'shortcode_recent_posts');
	
	
	

// Recent Comments

function shortcode_recent_comments($atts, $content = null) {

    extract(shortcode_atts(array(
        'num' => '5'
    ), $atts));

    global $wpdb;
    $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
    comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
    comment_type,comment_author_url,
    SUBSTRING(comment_content,1,50) AS com_excerpt
    FROM $wpdb->comments
    LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
    $wpdb->posts.ID)
    WHERE comment_approved = '1' AND comment_type = '' AND
    post_password = ''
    ORDER BY comment_date_gmt DESC LIMIT ".$num;

    $comments = $wpdb->get_results($sql);

    $output = '<ul class="recent-comments">';

    foreach ($comments as $comment) {

        $output .= '<li>';
            $output .= '<a href="'.get_permalink($comment->ID).'#comment-'.$comment->comment_ID.'" title="on '.$comment->post_title.'">';
                 $output .= strip_tags($comment->comment_author).' : '.strip_tags($comment->com_excerpt).'...';
            $output .= '</a>';
        $output .= '</li>';

    }

    $output .= '</ul>';

    return $output;

}

add_shortcode('recent_comments', 'shortcode_recent_comments');
	
	
	
	
	
//Popular Posts

function shortcode_popular_posts($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '5'
		), $atts));

		$popular = get_posts('orderby=comment_count&numberposts='.$num);

		$output = '<ul>';

		foreach($popular as $post){
				
				setup_postdata($post);

				$output .= '<li>';
						$output .= '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= get_the_title($post->ID);
						$output .= '</a>';
				$output .= '</li>';

		}

		$output .= '</ul>';

		return $output;

}

add_shortcode('popular_posts', 'shortcode_popular_posts');



//Recent Testimonials

function shortcode_recenttesti($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '5',
				'thumb' => 'true',
				'excerpt_count' => '30'
		), $atts));

		$testi = get_posts('post_type=testi&orderby=post_date&numberposts='.$num);

		$output = '<div class="testimonials">';
		
		global $post;
		global $my_string_limit_words;

		foreach($testi as $post){
				setup_postdata($post);
				$excerpt = get_the_excerpt($post->ID);
				$custom = get_post_custom($post->ID);
				$testiname = $custom["testimonial-name"][0];
				$testiurl = $custom["testimonial-url"][0];

				$output .= '<div class="testi_item">';
						if ($thumb == 'true') {
							if ( has_post_thumbnail($post->ID) ){
									$output .= get_the_post_thumbnail($post->ID, 'small-post-thumbnail', array( "class" => "thumb" ));
							}
						}
						$output .= '<blockquote>';
							$output .= '<a href="'.get_permalink($post->ID).'">';
								$output .= my_string_limit_words($excerpt,$excerpt_count);
							$output .= '</a>';
						$output .= '</blockquote>';
						
						$output .= '<div class="name-testi">';
							$output .= '<span class="user">';
								$output .= $testiname;
							$output .= '</span>, ';
							
							$output .= '<a href="'.$testiurl.'">';
								$output .= $testiurl;
							$output .= '</a>';
							
						$output .= '</div>';
						
				$output .= '</div>';

		}

		$output .= '</div>';

		return $output;

}

add_shortcode('recenttesti', 'shortcode_recenttesti');
	
	
	
	
//Tag Cloud

function shortcode_tags($atts, $content = null) {

		$output = '<div class="tags-cloud clearfix">';

		$tags = wp_tag_cloud('smallest=8&largest=8&format=array');

		foreach($tags as $tag){
				$output .= $tag.' ';
		}

		$output .= '</div><!-- .tags-cloud (end) -->';

		return $output;

}

add_shortcode('tags', 'shortcode_tags');




// Audio Player

function shortcode_audio($atts, $content = null) {
		
    extract(shortcode_atts(array(
        'file' => '',
				'desc' => ''
    ), $atts));
    
    $template_url = get_template_directory_uri();
    $id = mt_rand();
    $mp3 = strpos($file, ".mp3");

    $output  = '<div class="audio-wrapper"><audio src="';

    if($mp3 !== false){
        
        $output .= $file;

    } else {

        _e("The URL you entered is not a .mp3 file.", "theme1599");

    }

    $output  .= '"preload="auto"></audio>';
		$output  .= '<div class="audio-desc">';
			$output  .= $desc;
		$output  .= '</div></div>';

    return $output;

}

add_shortcode('audio', 'shortcode_audio');




// Video Player

function shortcode_video($atts, $content = null) {

    extract(shortcode_atts(array(
        'file' => '',
        'image' => '',
        'width' => '560',
        'height' => '349',
        'color' => 'black'
    ), $atts));

    $template_url = get_template_directory_uri();

    $video_url = $file;

    //Check for video format
    $vimeo = strpos($video_url, "vimeo");
    $youtube = strpos($video_url, "youtube");
    $flv = strpos($video_url, ".flv");

    $output = '<div class="video-wrap">';

    //Display video
    if($vimeo !== false){

        //Get ID from video url
        $video_id = str_replace( 'http://vimeo.com/', '', $video_url );
        $video_id = str_replace( 'http://www.vimeo.com/', '', $video_id );

        //Display Vimeo video
        $output .= '<iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';

    } elseif($youtube !== false){

        //Get ID from video url
        $video_id = str_replace( 'http://youtube.com/watch?v=', '', $video_url );
        $video_id = str_replace( 'http://www.youtube.com/watch?v=', '', $video_id );
        $video_id = str_replace( '&feature=channel', '', $video_id );
        $video_id = str_replace( '&feature=channel', '', $video_id );

        $output .= '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0"></iframe>';

    } elseif($flv !== false){

        $output .= mytheme_video($video_url, $image, $width, $height, $color);

    } else {

        _e("You entered a video URL that isn't compatible with this shortcode.", "theme1599");

    }

    $output .= '</div><!-- .video-wrap (end) -->';

    return $output;

}

add_shortcode('video', 'shortcode_video');




add_action( 'after_setup_theme', 'my_setup' );
?>