<?php

class Quill_Employees extends WP_Widget {

// constructor
    function quill_employees() {
		$widget_ops = array('classname' => 'quill_employees_widget', 'description' => __( 'Display your team members in a stylish way.', 'quill') );
        parent::WP_Widget(false, $name = __('Quill FP: Employees', 'quill'), $widget_ops);
		$this->alt_option_name = 'quill_employees_widget';
		
		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );		
    }
	
	// widget form creation
	function form($instance) {

	// Check values
		$title     	= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$desc 		= isset( $instance['desc'] ) ? esc_textarea( $instance['desc'] ) : '';	
		$image_uri 	= isset( $instance['image_uri'] ) ? esc_url_raw( $instance['image_uri'] ) : '';
	?>

	<p><?php _e('In order to display this widget, you must first add some employees from the dashboard.', 'quill'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'quill'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Enter a short description for this block', 'quill'); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $desc; ?></textarea>
	</p>	

    <?php
        if ( $image_uri != '' ) :
           echo '<p><img class="custom_media_image" src="' . $image_uri . '" style="max-width:100px;" /></p>';
        endif;
    ?>
    <p><label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Upload an image for the background if you want. It will get a parallax effect.', 'quill'); ?></label></p> 
    <p><input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" /></p>
	<p><input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'image_uri' ); ?>" name="<?php echo $this->get_field_name( 'image_uri' ); ?>" type="text" value="<?php echo $image_uri; ?>" size="3" /></p>
	
	<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['desc'] = strip_tags($new_instance['desc']);
	    $instance['image_uri'] = esc_url_raw( $new_instance['image_uri'] );	
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['quill_employees']) )
			delete_option('quill_employees');		  
		  
		return $instance;
	}
	
	function flush_widget_cache() {
		wp_cache_delete('quill_employees', 'widget');
	}
	
	// display widget
	function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'quill_employees', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Our Employees', 'quill' );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$desc = isset( $instance['desc'] ) ? esc_textarea($instance['desc']) : '';
		$image_uri = isset( $instance['image_uri'] ) ? esc_url($instance['image_uri']) : '';

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'employees',
			'posts_per_page'	  => 3
		) ) );

		if ($r->have_posts()) :
?>

		<section id="employees" class="employees-area">
			<div class="container">
				<?php if ( $title ) echo $before_title . '<span class="wow fadeInRight">' . $title . '</span>' . $after_title; ?>
				<?php if ($desc != '') : ?>
					<div class="section-desc">
						<?php echo esc_textarea($desc); ?>
					</div>
				<?php endif; ?>
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<?php //Get the custom field values
						$position = get_post_meta( get_the_ID(), 'wpcf-position', true );
						$facebook = get_post_meta( get_the_ID(), 'wpcf-facebook', true );
						$twitter = get_post_meta( get_the_ID(), 'wpcf-twitter', true );
						$google = get_post_meta( get_the_ID(), 'wpcf-google-plus', true );
						$linkedin = get_post_meta( get_the_ID(), 'wpcf-linkedin', true ); 
					?>
					<div class="employee col-md-4 col-sm-6 col-xs-6 wow fadeInUp">
						<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail('employee-thumb'); ?>
						<?php endif; ?>
						<h4 class="employee-name"><?php the_title(); ?></h4>
						<?php if ($position != '') : ?>
							<span class="employee-position"><?php echo esc_html($position); ?></span>
						<?php endif; ?>
						<?php if ( ($facebook != '') || ($twitter != '') || ($google != '') || ($linkedin != '') ) : ?>
							<div class="employee-social">
								<?php if ($facebook != '') : ?>
									<a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>
								<?php if ($twitter != '') : ?>
									<a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>
								<?php if ($google != '') : ?>
									<a href="<?php echo esc_url($google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>											
								<?php if ($linkedin != '') : ?>
									<a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<a class="read-more buttons" href="<?php the_permalink(); ?>"><?php echo __('See bio', 'quill'); ?></a>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
		<?php if ($image_uri != '') : ?>
			<style type="text/css">
				.employees-area {
				    display: block;			    
					background: url(<?php echo $image_uri; ?>) no-repeat;
					background-position: center top;
					background-attachment: fixed;
					background-size: cover;
					z-index: -1;
				}
				.employee {
					background-color: rgba(0,0,0,0.6);
					border-right: 1px solid #5E5E5E;
				}
				.employee:nth-of-type(3),
				.employee:nth-of-type(6),
				.employee:nth-of-type(7) {
					border-right: 0;
				}	
			</style>
		<?php endif; ?>		
		
	<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'quill_employees', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
	
}