<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'theme1599'); single_cat_title(); echo __('&quot; | ', 'theme1599'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'theme1599'); single_tag_title(); echo __('&quot; | ', 'theme1599'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'theme1599'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'theme1599').wp_specialchars($s).__('&quot; | ', 'theme1599'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'theme1599'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/colorscheme.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/grid.css" />
  <link href='http://fonts.googleapis.com/css?family=Six+Caps' rel='stylesheet' type='text/css'>
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    .border {
      behavior:url(<?php echo get_stylesheet_directory_uri(); ?>/PIE.php)
      }
  </style>
  <![endif]-->
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu)
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			// prettyphoto init
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
		});
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				slices:<?php echo of_get_option('sl_slices'); ?>,
				boxCols:<?php echo of_get_option('sl_box_columns'); ?>,
				boxRows:<?php echo of_get_option('sl_box_rows'); ?>,
				animSpeed:<?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime:<?php echo of_get_option('sl_pausetime'); ?>,
				directionNav:<?php echo of_get_option('sl_dir_nav'); ?>,
				directionNavHide:<?php echo of_get_option('sl_dir_nav_hide'); ?>,
				controlNav:<?php echo of_get_option('sl_control_nav'); ?>,
				captionOpacity:<?php $sl_caption_opacity = of_get_option('sl_caption_opacity'); if ($sl_caption_opacity != '') { echo of_get_option('sl_caption_opacity'); } else { echo '0'; } ?>
			});
		});
	</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color');
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color');
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography');
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>
<body <?php body_class(); ?>>
<div id="main"><!-- this encompasses the entire Web site -->
	<div id="main-bg">
	<header id="header">
		<div class="container_12 clearfix">
			<div class="grid_12">
                <div id="enter">
					<?php if(is_user_logged_in()) { ?>
						<b><?php wp_loginout(); ?> <?php _e('of your account', 'theme1392');?></b>
                    <?php } else { ?>
                        <b>Have an account?</b> <i><a href="<?php echo home_url(); ?>/wp-login.php?action=register"><?php _e('Sign up', 'theme1392');?></a> <?php _e('or', 'theme1392');?> <?php wp_loginout(); ?></i>
                    <?php } ?>
                </div>
                <div id="widget-header">
					<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
                </div><!--#widget-header-->
                <nav class="primary">
					<?php wp_nav_menu( array(
						'container'       => 'ul',
						'menu_class'      => 'sf-menu',
						'menu_id'         => 'topnav',
						'depth'           => 0,
						'theme_location' => 'header_menu_left'
                      ));
                    ?>
                    <div class="secondary">
						<?php wp_nav_menu( array(
                            'container'       => 'ul',
                            'menu_class'      => 'sf-menu',
                            'menu_id'         => 'topnav1',
                            'depth'           => 0,
                            'theme_location' => 'header_menu_right'
                          ));
                        ?>
                    </div>
                </nav><!--.primary-->
                <div class="logo">
					<?php if(of_get_option('logo_type') == 'text_logo'){?>
						<?php if( is_front_page() || is_home() || is_404() ) { ?>
                            <h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
                        <?php } else { ?>
                            <h2><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
                        <?php } ?>
					<?php } else { ?>
                        <?php if(of_get_option('logo_url') != ''){ ?>
                            <a href="<?php echo home_url(); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
                        <?php } else { ?>
                            <a href="<?php echo home_url(); ?>/" id="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
                        <?php } ?>
                    <?php }?>
                    <p class="tagline"><?php bloginfo('description'); ?></p>
                </div>
				<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>
                    <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                        <input type="text" name="s">
                        <input type="submit" value="<?php _e('Go!', 'theme1599'); ?>" id="submit">
                    </form>
                <?php } ?>
     		</div>
		</div>
	</header>
	<?php if( is_front_page() ) { ?>
        <section id="slider-wrapper">
            <div class="container_12 clearfix">
                <div class="grid_12">
					<?php include_once(TEMPLATEPATH . '/slider.php'); ?>
                </div>
            </div>
        </section><!--#slider-->
    <?php } ?>
    <?php if( is_front_page() ) { ?>
        <div class="before-content-area">
            <div class="container_12 clearfix">
                <div class="grid_12">
                    <div class="indent">
                        <div class="wrapper">
                            <?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
                                <!--Widgetized Content-->
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<div id="ic"><!-- HLinks --></div>
	<div class="primary_content_wrap">
    	<div class="container_12 clearfix">
        	<div class="grid_12">
            	<div class="wrapper">