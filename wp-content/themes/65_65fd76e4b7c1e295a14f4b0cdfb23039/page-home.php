<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

    <div class="wrapper">
    	
        <div class="grid_6 alpha">
			<?php if ( ! dynamic_sidebar( 'Content Area 1' ) ) : ?>
                <!--Widgetized Content-->
            <?php endif ?>
        </div>
        
        <div class="grid_6 omega">
			<?php if ( ! dynamic_sidebar( 'Content Area 2' ) ) : ?>
                <!--Widgetized Content-->
            <?php endif ?>
        </div>
        
    </div>
    
<?php get_footer(); ?>