<aside id="sidebar" class="grid_4 <?php if (of_get_option('blog_sidebar_pos') == "right" ) {echo "omega";} else {echo "alpha";} ?>">
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
  <div id="sidebar-search" class="widget">
  	<?php echo '<h3>' . __('Search', 'theme1599') . '</h3>'; ?>
    <?php get_search_form(); ?> <!-- outputs the default WordPress search form-->
  </div>
  
  <div id="sidebar-nav" class="widget menu">
    <?php echo '<h3>' . __('Navigation', 'theme1599') . '</h3>'; ?>
    <?php wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?> <!-- editable within the WordPress backend -->
  </div>
  
  <div id="sidebar-archives" class="widget">
    <?php echo '<h3>' . __('Archives', 'theme1599') . '</h3>'; ?>
    <ul>
      <?php wp_get_archives( 'type=monthly' ); ?>
    </ul>
  </div>

  <div id="sidebar-meta" class="widget">
    <?php echo '<h3>' . __('Meta', 'theme1599') . '</h3>'; ?>
    <ul>
      <?php wp_register(); ?>
      <li><?php wp_loginout(); ?></li>
      <?php wp_meta(); ?>
    </ul>
  </div>
	<?php endif; ?>
</aside><!--sidebar-->