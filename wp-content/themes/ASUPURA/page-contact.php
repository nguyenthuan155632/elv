<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<style>
.hidden_input {
	visibility: hidden;
}
</style>
<main>
	<div id="contact-asu">
	<div class="ad-contact-title">お問い合わせ</div>
	<div class="big-text">下記フォームにご記入のうえ、ご送信ください。※全て必須項目</div>
	<div class="small-text">会員情報の変更・退会申請は<a href="#">マイページ</a>から</div>
	<div class="small-text-sp"><a href="#">就活情報の配信停止をご希望の方はこちら</a></div>
	<div class="ad-contact-content">
		<?php echo do_shortcode('[contact-form-7 id="463" title="お問い合わせ"]');?>
	</div>
</div> 
</main>
<script type="text/javascript">
	$("form").submit(function(){
    	var phone1 = $("#phone1").val();
    	var phone2 = $("#phone2").val();
    	var phone3 = $("#phone3").val();
    	var email_name = $("#email_name").val();
    	var email_domail = $("#email_domail").val();
    	var last_name = $("#last_name").val();
    	var first_name = $("#first_name").val();

    	var spell_last_name = $("#spell_last_name").val();
    	var spell_first_name = $("#spell_first_name").val();

    	$("#phone").val(phone1 + '-' + phone2 + '-' +phone3);
    	$("#mail").val(email_name + '@' + email_domail);
    	$("#full_name").val(last_name + ' ' + first_name);
    	$("#spelling_name").val(spell_last_name + ' ' + spell_first_name);
	});
</script>
<?php get_footer(); ?>