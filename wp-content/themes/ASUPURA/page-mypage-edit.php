<?php
/*
Template Name: My Page Edit
*/
?>
<?php get_header(); ?>
<!-- SP -->
<?php //if( wpmd_is_device() ) { ?>
<div id="main-mypage-edit">
	<div class="box-myedit-top">
		<a href="" title=""><button type="button" id="btn-edit">ログインID・パスワード<br>の設定</button></a>
		<div class="box-edit-top-content">
			▼ログインID（半角）<br>
			asupura_login_id
		</div>
	</div>
	<div class="box-myedit-middle">
		<ul>
			<li>▼パスワード</li>
			<li><input type="text" name="" id="" placeholder=""></li>
			<li>（半角英数字8～50文字以内）</li>
			<li><input type="text" name="" id="" placeholder=""></li>
			<li>（確認のためパスワードをもう一度入力してください）</li>
		</ul>
		<div id="hr-mypage">
			<button type="button" id="btn-edit">氏名</button>
		</div>
		
		<div class="box-myedit-change">
			<div>▼氏名</div>

			<div class="table-inline table-change">
				<div class="table-col-50 pad-10-mypage"><span>氏</span><input type="text" name="" id="" placeholder=""></li></div>
				<div class="table-col-50 pad-10-mypage"><span>名</span><input type="text" name="" id="" placeholder=""></li></div>
			</div>
			<span id="mypage-span-bot">（例）体育　太郎</span>
		</div>
	</div>
	<div class="box-myedit-bot">
		<div class="box-myedit-change">
			<div>▼フリガナ（全角カタカナ）</div>

			<div class="table-inline table-change">
				<div class="table-col-50 pad-10-mypage"><span>シ</span><input type="text" name="" id="" placeholder=""></li></div>
				<div class="table-col-50 pad-10-mypage"><span>メイ</span><input type="text" name="" id="" placeholder=""></li></div>
			</div>
			<span id="mypage-span-bot">（例）タイイク　タロウ</span>
		</div>
	</div>
</div>
<?php //} ?>
<?php get_footer(); ?>