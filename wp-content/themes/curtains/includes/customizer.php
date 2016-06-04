<?php
/**
 * curtains Theme Customizer
 *
 * @package curtains
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function curtains_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}  
add_action( 'customize_register', 'curtains_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function curtains_customize_preview_js() {
	wp_enqueue_script( 'curtains_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'curtains_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );      

		function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#3c5895'); ?>

	
		<style type="text/css">  

button:focus,
input[type="button"]:focus,     
input[type="reset"]:focus,
input[type="submit"]:focus,
button:active,
input[type="button"]:active,
input[type="reset"]:active,
input[type="submit"]:active,.tabs-container div,.widget_image-box-widget .image-box img,.ui-accordion .ui-accordion-content,.circle-icon-box .circle-icon-wrapper .fa-stack i:after,.toggle .toggle-content,.flex-direction-nav a:hover:before,.flex-direction-nav a:hover:after
				{
					border-color: <?php echo $primary_color?>;
				}
.toggle-polygon .toggle-title
		  {
				border-bottom-color: <?php  echo $primary_color; ?>;
		  }

li.ui-tabs-active:before,.sep:after,.tabs-container.center div,.widget.widget_ourteam-widget .team-social li a:hover
				{
					border-top-color: <?php  echo $primary_color; ?>;
				}

.faq-acc .ui-accordion-header-active:after,.toggle-normal .toggle-title,.tabs-container ul.tabs,.ui-accordion .ui-accordion-header-active{
					border-right-color: <?php  echo $primary_color; ?>;
				}

.faq-acc .ui-accordion-header-active:before,.toggle-normal .toggle-title,.tabs-container div:before,.ui-accordion .ui-accordion-header-active {
					border-left-color: <?php  echo $primary_color; ?>;
				}
.main-navigation .current_page_item,.woocommerce #content table.cart a.remove,.widget_testimonial-widget ul li p.client,
.widget_recent-work-widget .portfolioeffects .content-details h3 a:hover,.widget_recent-work-widget .work .content-details h3 a:hover,
.breadcrumb-wrap .breadcrumb a:hover,.breadcrumb-wrap .breadcrumb a:hover i,.site-info a:hover,
.main-navigation .sub-menu li a:hover,.main-navigation .children li a:hover,.toggle-polygon .toggle-title:hover,.toggle-normal .toggle-title span.icn .fa,.widget-area .widget_rss a,.site-footer .footer-widgets a:hover,.site-footer .footer-widgets .widget_calendar a,.site-footer .footer-widgets .widget_calendar td#today,
.main-navigation .current-menu-item,.widget_testimonial-widget ul li p.client,.flexslider .flex-caption a:hover,
.main-navigation .current_page_ancestor,.circle-icon-box .circle-icon-wrapper .link-icon:hover,.main-navigation .current_page_item > a,.order-total .amount,
.cart-subtotal .amount,.widget.widget_ourteam-widget .team-social li a:hover,.widget.widget_skill-widget .skill-container .fa-stack,
.main-navigation .current-menu-item > a,ul#portfolio li h3 a:hover,.circle-icon-box:hover a.link-title,.circle-icon-box:hover a.link-title h4,.circle-icon-box:hover .link-title h4,.circle-icon-box:hover a.more-button,
.main-navigation .current_page_ancestor > a,.main-navigation .sub-menu .current_page_item,.recent-post .rp-content h4 a:hover,
.main-navigation .sub-menu .current-menu-item,ul.filter-options li a:hover,.icon-polygon:hover .circle-icon-wrapper .fa,.icon-polygon:hover .link-icon i,.icon-polygon:hover .link-title h4,.callout-widget .cta-link a:hover,
.main-navigation .sub-menu .current_page_ancestor,.ui-accordion h3 span.fa,.recent-post .rp-content h4:hover,
.main-navigation .children .current_page_item,.widget_recent-work-widget ul.filter-options li a:hover,.portfolioeffects .content-details h3 a:hover,
.main-navigation .children-menu .current-menu-item,.free-home .post-wrapper .latest-posts .latest-post-thumb:hover h4,.widget-area ul li a:hover,#secondary #recentcomments a,.widget_calendar table th a,.widget_calendar table td a,
.main-navigation .children-menu .current_page_ancestor,.main-navigation .sub-menu .current_page_item > a,
.main-navigation .sub-menu .current-menu-item > a,.free-home .services-wrapper .service:hover h6,.free-home .services-wrapper .service:hover h5,.free-home .services-wrapper .service:hover h4,.free-home .services-wrapper .service:hover h3,.free-home .services-wrapper .service:hover h2,.free-home .services-wrapper .service:hover h1,
.main-navigation .sub-menu .current_page_ancestor > a,.page-links a,.page-template-blog-fullwidth .site-main .entry-body h1 a:hover,
.page-template-blog-large .site-main .entry-body h1 a:hover,.blog .site-main .entry-body h1 a:hover,.page-template-blog-small .site-main .entry-body h1 a:hover,
.main-navigation .children .current_page_item > a,.widget_list-widget ul li .fa,.widget_list-widget ol li .fa,ol.comment-list article,.comment-metadata a:hover,.hentry.post h1 a:hover,.entry-title a:hover,.site-info a:hover,.copyright p a,
.main-navigation .children .current-menu-item > a,.site-header .branding .site-branding .site-title a:hover,.top-nav ul li:hover a,ol.comment-list .reply:before,
.main-navigation .children .current_page_ancestor > a,.post-wrapper .latest-posts .latest-post-thumb:hover h4,.site-header .branding .site-branding h1.site-title a:hover,.site-footer .widget_recent-posts-widget .recent-post .rp-content h4 a:hover,.main-navigation .sub-menu li a:hover, .main-navigation .children li a:hover,.main-navigation .sub-menu li a:hover,.main-navigation .children li a:hover,.main-navigation ul.nav-menu > li a:hover,.main-navigation .sub-menu li a:hover,.main-navigation .children li a:hover,
.order-total .amount,
.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
.woocommerce table.cart a.remove,
.woocommerce-page #content table.cart a.remove,
.woocommerce-page table.cart a.remove
				{
					color: <?php echo $primary_color; ?>;

				}

				
.slicknav_menu a:hover,.widget_testimonial-widget .flex-control-nav a.flex-active,.widget_testimonial-widget .flex-control-nav a:hover,.nav-links .nav-previous .meta-nav:hover,.more-link .nav-previous .meta-nav:hover,.comment-navigation .nav-previous .meta-nav:hover,
input[type="button"],.nav-links .nav-next:hover a,.more-link .nav-next:hover a,.comment-navigation .nav-next:hover a,a.more-link:hover,.widget_tag_cloud a,.site-footer .widget_tag_cloud a,
input[type="reset"],ol.webulous_page_navi li a,.tabs-container ul.tabs,.flex-direction-nav a:hover,.notice,.share-box ul li a:hover,
input[type="submit"],.btn,.dropcap-circle,.dropcap-book,.pullright,.toggle-normal .toggle-title,.widget_recent-posts-widget .flex-control-nav li a,
.pullleft,.withtip:before,.withtip.top:after,.withtip.right:after,.withtip.bottom:after,.withtip.left:after,.page-template-blog-fullwidth .site-main .sticky .entry-content,
.page-template-blog-large .site-main .sticky .entry-content,.blog .site-main .sticky .entry-content,.page-template-blog-small .site-main .sticky .entry-content,
.pullnone,.circle-icon-box a.more-button:hover,.circle-icon-box:hover .circle-icon-wrapper .fa-stack i:after,
.dropcap-box,.icon-polygon a.more-button:hover,.wide-pattern-black .widget_testimonial-widget .flex-direction-nav a:hover,
.widget_button-widget a.btn.btn-default,.flex-direction-nav a.flex-next:hover,.nav-links .nav-previous:hover a,.more-link .nav-previous:hover a,.comment-navigation .nav-previous:hover a,.woocommerce #respond input#submit:hover,
blockquote,.widget.widget_skill-widget .skill-container .skill .skill-percentage,.ui-accordion h3,
.entry-meta,blockquote p,.ui-accordion .ui-accordion-header-active,
.entry-footer,.widget_recent-work-widget .portfolioeffects .overlay_icon a:hover,.widget_recent-work-widget .work .overlay_icon a:hover,
.portfolioeffects .overlay_icon a:hover,.portfolio-excerpt .more-link,.widget_calendar table caption,.site-footer .widget_calendar caption,
.flex-direction-nav a.flex-prev:hover,.flex-direction-nav a.flex-next:hover,
.icon-horizontal a.link-title i,.widget_recent-posts-widget .recent-post:hover a img,
  .icon-horizontal .icon-title i,.widget_image-box-widget a.more-button,
  .icon-horizontal .fa-stack i,
  .icon-vertical a.link-title i,
  .icon-vertical .icon-title i,.site-content .widget_social-networks-widget ul li a:hover, .site-content .share-box ul li a:hover,
  .icon-vertical .fa-stack i,.icon-horizontal:hover .more-button a,
.icon-vertical:hover .more-button a,
.contact-form input[type="submit"],.widget.widget_skill-widget .skill-container .skill .skill-percentage,.widget.widget_skill-widget .skill-container .skill .skill-percentage:before,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content nav.woocommerce-pagination ul li a:focus,
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce #content nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span.current

				{
					background-color: <?php echo $primary_color; ?>;
				}

.woocommerce #content input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page #content input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page input.button:hover {
	background-color: <?php echo $primary_color; ?>!important;
}
			</style>
<?php
	}
}




