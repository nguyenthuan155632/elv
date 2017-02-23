<?php
/*
Template Name: Advertisement
*/
?>
<?php get_header(); ?>
<style>
.hidden_input {
	visibility: hidden;
}
</style>
<!-- <main> -->
<div id="ad-contact">
	<div class="ad-contact-title">広告掲載をお考えの企業様へ</div>
	<div class="big-text">下記フォームにご記入のうえ、ご送信ください。※全て必須項目</div>
<!--     <div class="small-text">広告掲載についての詳細は<a href="#">「アスプラ　広告掲載について」</a>（PDFファイル　◯KB）をご確認ください。</div>
<div class="small-text-sp">広告掲載についての詳細は<br><a href="#">「アスプラ　広告掲載について」</a><br>（PDFファイル　◯KB）をご確認ください。</div> -->
	<div class="ad-contact-content">
		<?php echo do_shortcode('[contact-form-7 id="448" title="広告掲載をお考えの企業様へ"]');?>
	</div>
</div>
<!-- </main> -->
<script type="text/javascript">
	$("form").submit(function(){
    	var phone1 = $("#phone1").val();
    	var phone2 = $("#phone2").val();
    	var phone3 = $("#phone3").val();
    	var email_name = $("#email_name").val();
    	var email_domail = $("#email_domail").val();
    	var last_curator = $("#last_curator").val();
    	var first_curator = $("#first_curator").val();

    	var spell_last_curator = $("#spell_last_curator").val();
    	var spell_first_curator = $("#spell_first_curator").val();

    	$("#phone").val(phone1 + '-' + phone2 + '-' +phone3);
    	$("#mail").val(email_name + '@' + email_domail);
    	$("#curator_full_name").val(last_curator + ' ' + first_curator);
    	$("#spelling_name").val(spell_last_curator + ' ' + spell_first_curator);
	});
</script>
<?php get_footer(); ?>