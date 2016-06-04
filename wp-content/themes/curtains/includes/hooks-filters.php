<?php

	function curtains_footer_credits() {
		printf( __('<p>Powered by <a href="%1$s">WordPress</a>', 'curtains'), esc_url( 'http://wordpress.org/') );
		printf( '<span class="sep"> .</span>' );
		printf( __( 'Theme: Curtains by <a href="%1$s" rel="designer">Webulous Themes</a></p>', 'curtains' ), esc_url('http://www.webulousthemes.com/') );
	}
	
	add_action('curtains_credits','curtains_footer_credits'); 

	function curtains_before_branding_widgets() {
?>
	<?php if( is_active_sidebar('top-left') || is_active_sidebar('top-right')) :?>
		<div class="top-nav">
			<div class="container">
				<div class="cart eight columns">	
					<?php if( is_active_sidebar( 'top-left') ) {
						dynamic_sidebar( 'top-left' ); 
					} else {
						echo '&nbsp;';
					}
					?>				
				</div>
			
				<div class="eight columns social">
					<?php if( is_active_sidebar( 'top-right' ) ) {
						dynamic_sidebar( 'top-right' ); 
					} else {
						echo '&nbsp;';
					} ?>
				</div>

			</div>
		</div>
	<?php endif; ?>
<?php
	}

	add_action('curtains_before_branding','curtains_before_branding_widgets');