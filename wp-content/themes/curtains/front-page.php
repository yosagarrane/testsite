<?php
/**
 * The front page template file.
 *
 *
 * @package Curtains
 */
?>
<?php 
	if( 'posts' == get_option( 'show_on_front' ) ) {
	    include( get_home_template() );
	} else {

get_header(); 
	if ( get_theme_mod('page-builder' ) ) { 
		if( get_theme_mod('flexslider') ) {   
			echo do_shortcode( get_theme_mod('flexslider'));
		} ?>
	<div id="content" class="site-content container">
			<div id="primary" class="content-area sixteen columns">
				<main id="main" class="site-main" role="main">
					<?php
						while ( have_posts() ) : the_post();    
							the_content();
						endwhile;
					?>
					
			     </main><!-- #main -->
		     </div><!-- #primary -->
<?php	} else {

			$slider_cat = get_theme_mod( 'slider_cat', '' );
			$slider_count = get_theme_mod( 'slider_count', 5 );
			$slider_posts = array(
				'cat' => absint($slider_cat),
				'posts_per_page' => absint($slider_count)
			);
			
			if ( $slider_cat ) {

			$query = new WP_Query($slider_posts);
			if( $query->have_posts()) : ?>
				<div class="flexslider">
					<ul class="slides">
			<?php while($query->have_posts()) :
					$query->the_post();
					if( has_post_thumbnail() ) : ?>
					    <li>
					    	<div class="flex-image">
					    		<?php the_post_thumbnail('full'); ?>
					    	</div>
					    	<div class="flex-caption">
					    		<?php the_content(); ?>
					    	</div>
					    </li>
					<?php endif; ?>
			<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php  
			$query = null;
			wp_reset_postdata();
		}else{?>
			 <div class="flexslider">  
				<ul class="slides">	          
					<li>   	
						<div class="flex-image">
							<?php echo '<img src="' . get_template_directory_uri() . '/images/slider.jpg" alt="" >';?>	
						</div>
						<?php	$slide_description = sprintf( __('<h1> Slider Setting </h1><p>You haven\'t created any slider yet. Create a post, set your slider image as Post\'s featured image ( Recommended image size 1280*650 ) ). Go to Customizer and click Colorist Options => Home and select Slider Post Category and No.of Sliders.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'curtains'),  admin_url('customize.php') );?>
						<div class="flex-caption"> <?php echo $slide_description;?></div>
					</li>
				</ul>
			</div><!-- flex-slider end -->	
	<?php }
		?>
		<div id="content" class="site-content free-home">
			<div class="container">		
		<div id="primary" class="content-area sixteen columns">
			<main id="main" class="site-main" role="main">

			<?php
				$service_page1 = absint(get_theme_mod('service_1'));
				$service_page2 = absint(get_theme_mod('service_2'));
				$service_page3 = absint(get_theme_mod('service_3'));
				$service_page4 = absint(get_theme_mod('service_4'));
				$service_page5 = absint(get_theme_mod('service_5'));
				$service_page6 = absint(get_theme_mod('service_6'));

				if( $service_page1 || $service_page2 || $service_page3 || $service_page4 || $service_page5 || $service_page6 ) {
					$service_pages = array($service_page1,$service_page2,$service_page3,$service_page4,$service_page5,$service_page6);
					$args = array(
						'post_type' => 'page',
						'post__in' => $service_pages,  
						'posts_per_page' => -1 ,
						'orderby' => 'post__in'
					);
				} 	else {?>
				    <div class="services-wrapper row">
					    <div class="eight service columns odd">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-1','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #1 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   				 <div class="eight service columns even">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-2','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #2 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   				<div class="eight service columns odd">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-3','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #3 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   				 <div class="eight service columns even">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-4','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #4 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   				<div class="eight service columns odd">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-5','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #5 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   				 <div class="eight service columns even">
				    		<div class="page-thumb demo-thumb">
				    			<i class="fa fa-thumb-tack fa-4x"></i>	
				    		</div>
		    				<div class="page-content">
		    					<h2><?php _e('Service Page-6','curtains');?></h2>
							     <p><?php printf( __('You haven\'t created any service page yet. Create Page. Go to <a href="%1$s"target="_blank"> Customizer </a> and click Colorist Options => Home => Service Section #6 and select page from  dropdown page list.','curtains'), admin_url('customize.php') ) ;?></p>	
					    	</div>
		   				</div> <!-- .service odd -->
		   			</div>			
			<?php }

if( isset($args) ) :
			$query = new WP_Query($args);
			if( $query->have_posts()) : ?>
				<div class="services-wrapper row">
					<?php $count=1; ?>

				<?php while($query->have_posts()) :
					$query->the_post(); ?>
					<?php if ($count % 2 == 0 ):?>
					    <div class="eight service columns <?php echo "even";?>">
					<?php else : ?>
					    <div class="eight service columns <?php echo "odd";?>">
					<?php endif; ?>
					   
					    	<?php if( has_post_thumbnail() ) : ?>
					    		<div class="page-thumb">
					    			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_post_thumbnail('curtains_home_page_img'); ?></a>
					    		</div>
					    	<?php endif; ?>
					    	<div class="page-content">
					    		<?php the_content('Read More','curtains'); ?>  
					    	</div>
					    </div>
					 <?php $count++; ?>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php  
				$query = null;
				wp_reset_postdata();
				endif;
			?>
			
			<?php curtains_recent_posts(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->
<?php
}
get_footer(); 
}
?>
