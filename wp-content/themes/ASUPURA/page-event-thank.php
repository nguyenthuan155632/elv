<?php
/*
Template Name: Event Thanks
*/
?>
<?php
if(!isset($_SESSION['api_token'])) {
    wp_redirect( home_url().'/login' ); exit; 
}
?>
<?php get_header(); ?>
<!-- MAIN -->
<div class="event-container">
	<p class="event-title">会員限定イベント</p>
	<p id="content-event-thank">
	<br>
	お申込みを承りました。<br>
ご登録頂いているemail宛に登録完了のメッセージをお送りしましたので、 ご確認をお願い致します。 <br>
※メールが届いていない場合は、登録アドレスが間違っている可能性があります。<br>
　登録内容の確認をお願いします。
	</p>
</div>
<!-- END MAIN -->
<?php get_footer();?>
