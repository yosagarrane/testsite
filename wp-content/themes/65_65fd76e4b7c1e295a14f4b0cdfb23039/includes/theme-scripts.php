<?php
function my_script() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri().'/js/jquery-1.6.4.min.js', false, '1.6.4');
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.js', array('jquery'), '2.0.6');
		wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), '1.4.8');
		wp_enqueue_script('easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery'), '1.3');
		wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.3');
		wp_enqueue_script('nivo', get_template_directory_uri().'/js/jquery.nivo.slider.js', array('jquery'), '2.5.2');
		wp_enqueue_script('tools', get_template_directory_uri().'/js/jquery.tools.min.js', array('jquery'), '1.2.6');
		wp_enqueue_script('loader', get_template_directory_uri().'/js/jquery.loader.js', array('jquery'), '1.0');
		wp_enqueue_script('swfobject', home_url().'/wp-includes/js/swfobject.js', array('jquery'), '2.2');
		wp_enqueue_script('cycleAll', get_template_directory_uri().'/js/jquery.cycle.all.js', array('jquery'), '2.99');
		wp_enqueue_script('twitter', get_template_directory_uri().'/js/jquery.twitter.js', array('jquery'), '1.0');
		wp_enqueue_script('flickr', get_template_directory_uri().'/js/jquery.flickrush.js', array('jquery'), '1.0');
		wp_enqueue_script('audiojs', get_template_directory_uri().'/js/audiojs/audio.js', array('jquery'), '1.0');
		wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.0');
	}
}
add_action('init', 'my_script');
?>



