<?php
/*
Template Name: Writer
*/
?>

<?php get_header(); ?>
<main>
	<div id="writer-list-content">
		<?php
            if ( is_active_sidebar('writer-list-content') ) {
                    dynamic_sidebar( 'writer-list-content' );
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