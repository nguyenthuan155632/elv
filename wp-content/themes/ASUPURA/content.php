<main>
    <?php get_sidebar(); ?>
    <div id="main-content">
        <?php
            if ( is_active_sidebar('toppage-content') ) {
                    dynamic_sidebar( 'toppage-content' );
            } else {
                    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
            }
        ?>
    </div>
</main>