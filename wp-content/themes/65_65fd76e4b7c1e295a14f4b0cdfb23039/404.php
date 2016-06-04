<?php get_header(); ?>

    <div id="error404" class="clearfix">
        <div class="error404-num">404</div>
        <?php echo '<h1>' . __('Sorry!', 'theme1599') . '</h1>'; ?>
        <?php echo '<h2>' . __('Page Not Found', 'theme1599') . '</h2>'; ?>
        <?php echo '<h6>' . __('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'theme1599') . '</h6>'; ?>
        <?php echo '<p>' . __('Please try using our search box below to look for information on the internet.', 'theme1599') . '</p>'; ?>
        <?php get_search_form(); /* outputs the default WordPress search form */ ?>
    </div><!--#error404 .post-->

<?php get_footer(); ?>