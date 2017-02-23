<?php
/*
Template Name: No Sidebar
*/
?>
<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php asuplus_content(); ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
