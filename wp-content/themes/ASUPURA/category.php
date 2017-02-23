<?php get_header(); ?>
<main>
	<div id="detail-cate">
		<?php
            if ( is_active_sidebar('category-content') ) {
                    dynamic_sidebar( 'category-content' );
            } else {
                    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
            }
        ?>
	</div>
    <?php get_sidebar(); ?>
    <div id="main-content">
        <?php
            if ( is_active_sidebar('general-content') ) {
                    dynamic_sidebar( 'general-content' );
            } else {
                    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
            }
        ?>
    </div>
</main>
<?php get_footer(); ?>