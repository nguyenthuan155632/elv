<?php
/*
Template Name: Site Map
*/
?> 
<?php get_header(); ?>
<?php if ( is_active_sidebar( 'sitemap-sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'sitemap-sidebar' ); ?>
<?php endif; ?>
<script type="text/javascript">
	$(".sitemap-table-title").hover(function(){
		var textCate = $(this).text();
		var colorHover = '#FFF';
		if(textCate == 'スキルアップ') {
			colorHover = '#9b26af';
		} else if(textCate == '組織・チーム') {
			colorHover = '#673ab6';
		} else if(textCate == '仕事研究会') {
			colorHover = '#3f51b4';
		} else if(textCate == 'マネー') {
			colorHover = '#01bbd3';
		} else if(textCate == 'モチベーション') {
			colorHover = '#009487';
		} else if(textCate == 'センパイ') {
			colorHover = '#f34336';
		} else if(textCate == '特集') {
			colorHover = '#e81d63';
		} else {
			colorHover = '#FFF';
		} 
		$(this).css("color", '#FFF');
		$(this).css("transition", 'all 1800ms ease');
		$(this).css("background-color", colorHover);
		}, function(){
			var textCate = $(this).text();
		var colorHover = '#FFF';
		if(textCate == 'スキルアップ') {
			colorHover = '#9b26af';
		} else if(textCate == '組織・チーム') {
			colorHover = '#673ab6';
		} else if(textCate == '仕事研究会') {
			colorHover = '#3f51b4';
		} else if(textCate == 'マネー') {
			colorHover = '#01bbd3';
		} else if(textCate == 'モチベーション') {
			colorHover = '#009487';
		} else if(textCate == 'センパイ') {
			colorHover = '#f34336';
		} else if(textCate == '特集') {
			colorHover = '#e81d63';
		} else {
			colorHover = '#FFF';
		} 
		$(this).css("color", colorHover);
		$(this).css("transition", 'all 1200ms ease');
    	$(this).css("background-color", "#FFF");
	});

</script>
<?php get_footer();?>