
	
</div><!-- #container -->

<footer id="colophon" role="contentinfo">
		<div id="site-generator">

			<?php echo __('&copy; ', 'attorney') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'attorney'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'attorney' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'attorney' ); ?>"><?php _e('WordPress' ,'attorney'); ?></a>
			<?php _e(' and ', 'attorney'); ?><a href="<?php echo esc_url( __( 'http://wpattorney.org/', 'attorney' ) ); ?>"><?php _e('WP Attorney', 'attorney'); ?></a>
            <?php endif; ?>
            <?php attorney_footer_nav(); ?>
            
		</div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>