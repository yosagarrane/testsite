<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Curtains
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if( get_theme_mod('apple_touch') ) : ?>
	<!-- For first- and second-generation iPad: -->
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_mod( 'apple_touch' ) ); ?>">
<?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'curtains' ); ?></a>
<?php	if ( get_theme_mod('page-builder' ) ) { 
			if( get_theme_mod('flexslider') ) { 
					 $flex_header= '';
			}else {
				$flex_header= 'flex-header'; 
			}
		} 
		else {

			$slider_cat = get_theme_mod( 'slider_cat', '' );
			$slider_count = get_theme_mod( 'slider_count', 5 );
			$slider_posts = array(
				'cat' => absint($slider_cat),
				'posts_per_page' => absint($slider_count)
			);

			$query = new WP_Query($slider_posts);
			if( $query->have_posts()) : ?>
				<?php while($query->have_posts()) :
					$query->the_post();
					if( has_post_thumbnail() ) : 
						$flex_header= ''; 
				    endif;
				 endwhile;
			else :
				$flex_header= 'flex-header';
		 	endif; 

		$query = null;
		wp_reset_postdata();


		} 
?>
	<header id="masthead" class="site-header <?php echo $flex_header;?>" role="banner">   
		<div class="top-nav">
			<div class="container">		
				<div class="eight columns">
					<div class="social">
						<?php if( is_active_sidebar( 'top-left' ) ) : 
							 dynamic_sidebar('top-left' ); 
						 else:
							echo '&nbsp;'; 
						 endif; ?>
					</div>
				</div>
				<div class="columns eight">
					<div class="cart">
						<?php if( is_active_sidebar('top-right' ) ) :  
							 dynamic_sidebar('top-right' );   
						else:
							echo '&nbsp;'; 
						endif; ?>
					</div>
				</div>
		
			</div>
		</div> <!-- .top-nav -->

		<div class="branding">
			<div class="container">
				<div class="five columns">
				<div class="logo-wrapper">
					<div class="site-branding logo">
					<?php 
						$logo_title = get_theme_mod( 'logo_title' );
						$logo = get_theme_mod( 'logo', '' );
						$tagline = get_theme_mod( 'tagline',true);
						if( $logo_title && $logo != '' ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>
						<?php if( $tagline ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					</div>
				</div>
				</div>
				<div class="eleven columns">
					<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'curtains' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div><!-- container -->
		</div><!-- .branding -->

		<?php if ( ! is_front_page() ) : ?>
		<div class="header-bottom">
			<div class="container">
				<div class="page-title eight columns">  
					<?php the_title('<h2>','</h2>');?>	
				</div>
				<div class="breadcrumb-wrap eight columns">
					<div class="breadcrumb">
						<?php 
							$breadcrumb = get_theme_mod( 'breadcrumb',true );
							if( $breadcrumb ) : ?>
							<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_checkout' ) ) {
		                        if ( is_woocommerce() || is_cart() || is_checkout() ) { 
                                    woocommerce_breadcrumb();
		                        }
		                    }else{
		                    	curtains_breadcrumbs();
		                    }
	                       endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</header><!-- #masthead -->

