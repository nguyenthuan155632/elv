<?php
/*
Template Name: Login
*/

?>

<?php
// if(!isset($_SESSION['api_token'])) {
//     wp_redirect( home_url().'/login' ); exit; 
// }
$message_login = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST['button-login'])) {
		$username = $_POST['usename'];
		$password = $_POST['password'];
		$userLogin = API::login($username, $password);

        if($userLogin != false) {
        	if(isset($_SESSION['historyLink'])) {
	        	$myVarValue = $_SESSION['historyLink'];
	        	?>
	        	<script type="text/javascript">
					var myHome = <?php echo json_encode($myVarValue); ?>;
			      	document.location.href = myHome;
				</script>
	        	<?php
        	}
        	else {
        		$myVarValue = site_url();
	        	?>
	        	<script type="text/javascript">
					var myHome = <?php echo json_encode($myVarValue); ?>;
			      	document.location.href = myHome;
				</script>
	        	<?php
        	}
        }
        else {
             $message_login = 'ログインIDかパスワードに誤りがあります';
        }
	} 
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST['sp-button-login'])) {
		$username = $_POST['sp_username'];
		$password = $_POST['sp_password'];
		$userLogin = API::login($username, $password);
        if($userLogin != false) {
      		if(isset($_SESSION['historyLink'])) {
	        	$myVarValue = $_SESSION['historyLink'];
	        	?>
	        	<script type="text/javascript">
					var myHome = <?php echo json_encode($myVarValue); ?>;
			      	document.location.href = myHome;
				</script>
	        	<?php
        	}else {
        		$myVarValue = site_url();
	        	?>
	        	<script type="text/javascript">
					var myHome = <?php echo json_encode($myVarValue); ?>;
			      	document.location.href = myHome;
				</script>
	        	<?php
        	}
        }
        else {
             $message_login = 'ログインIDかパスワードに誤りがあります';
        }
	} 
}
?>

<?php

// logout
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// 	if(isset($_POST['button-logout'])) {
// 		API::logout();
// 		if (isset($_SESSION['api_token'])) {
// 			unset($_SESSION['api_token']);
// 		}
// 	}
// } 
?>
<?php get_header(); ?>
<style type="text/css" media="screen">
	.page-login {
		width: 50%;
	    max-width: 600px;
	    background-color: #FFF;
	    font-size: 14px;
	    float: left;
	}
	.page-logout-right {
		width: 50%;
		float: left;
		font-size: 14px;
	}
	.page-logout-padding {
		padding-left: 50px;
		margin-top: 10px;
	}
	.page-login legend, .page-logout-right legend {
	    width: 100%;
	    font-weight: 700;
	    font-size: 18px;
	    margin-bottom: 20px;
	    margin-top: 20px;
	}
	legend span {
		padding-left: 20px;
		border-left: 2px solid #263238;
	}
	.page-login .form-group {
	    padding: 10px 0px 10px 25px;
    	margin: 15px 0px;
	}
	.page-logout-right .form-group {
	    padding: 10px 0px 10px 0px;
    	margin: 10px 0px;
	}
	.page-login input {
		border: 0px;
    	width: 280px;
    	float: right;
    	margin-right: 23%;
    	height: 30px;
    	padding-left: 10px;
    	background-color: #ebeef0;
    	box-shadow: 0px -1px 0px #cfcfcf;
    	height: -moz-calc(32px);
	}
	.page-login a {
		color: #0090e9;
		text-decoration: none;
	    border-bottom: 1px solid;
	    padding-bottom: 5px;
	}
	.page-login label {
		line-height: 2;
		font-weight: 700;
	}
	.page-login .btn-logout, .btn-logout-sns, .btn-logout-red {
		width: 310px;
	    font: 700 14px NotoSansCJKjp;
	    color: #ffffff;
	    text-align: center;
	    background-color: #00bbd3;
	    padding: 15px 0px;
	    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 0px rgba(0, 0, 0, 0.1) inset;
	    margin-left: 15px;
	    cursor: pointer;
	    border: 0px;
	    margin-left: 60px;
	    margin-top: 15px;
	}
	.btn-logout-sns {
		box-shadow: 0px;
	    background-color: #3e4eb7;
	    margin-top: 10px;
	}
	.btn-logout-red {
		background-color: #ff5252;
		box-shadow: 0px;
		margin-top: 35px;
	}
	.logout-or {
		border-top: 1px solid;
		margin-right: 25%;
		text-align: center;
		margin-top: 20px;
	}
	.page-logout-right .logout-or {
		border-top: 0px;
		margin-right: 25%;
		text-align: center;
		margin-top: 20px;
	}
	.margin-top-10 {
		margin-top: -10px;
	}
	.margin-top-10 span {
		background-color: #fff;
    	padding: 10px;
	}
	.page-logout-right ul {
		list-style-type: decimal;
		padding-left: 20px;
		margin-top: 0px;
	}
	.logout-page .title {
		background-color: #263238;
		color: #fff;
		font-weight: both;
		font-size: 14px;
		padding: 5px 10px;
		margin-top: -25px;
	}
	.margin-bottom25 {
		margin-bottom: 25px !important;
	}

	#button-logout-ajax {
		text-decoration: none;
		border: medium none;
		display: block;
		width: 200px;
		height: 40px;
		text-align: center;
		background: rgb(224, 224, 224) none repeat scroll 0% 0%;
		border-radius: 2px;
		line-height: 40px;
		color: #263238;
		margin-top: 10px;
	}
	@media only screen and (max-width: 768px) {
		.page-login {
			width: 90%;
    		margin: 20px auto;
    		min-width: 300px;
    		max-width: 500px;
		}

		.page-login .form-group {
		    margin: 0px;
    		padding: 0px 10px;
		}

		.page-login input {
			margin-right: 10px;
			width: 55%;
			height: 20px;
		}

		.page-login label {
		    line-height: 50px;
		}

		.page-login .btn-login {
			width: 40%;
		    margin-left: 30%;	
		    padding: 7px;
		    margin-top: 20px;
		}
	}
</style>


<!-- PC -->

<?php if( wpmd_is_notdevice() ) { ?>
<main id="main_mypage-pc">

<div class="logout-page">
	<div class="title">ログイン画面</div>
	<div class="page-login">
		<div class="page-logout-padding">
			<?php if(isset($_SESSION['api_token'])) { 
				echo 'ログインを完了しました。';
				?>
				<!-- <form action="http://asupura.com/api/logout/" method="POST" role="form"> -->
				<br>
					<a href="<?php echo site_url().'/logout'; ?>" id="button-logout-ajax" class="button-login" >ログアウト</a>
					<div id="result-ajax-logout"></div>
				<!-- </form> -->
				<?php
			} else { ?>
			<form action="https://asupura.com/api/login" method="POST" role="form">
				<legend><span>アスプラ会員ログイン</span></legend>
				<div class="form-group margin-bottom25">登録済みのログインIDとパスワードを入力してください。</div>
				<div class="form-group" style="color: red;margin-left: 80px;">
				<?php if(isset($message_login)) { echo $message_login; } ?>
				</div>
				<div class="form-group">
					<label for="">ID </label>
					<input type="text" class="form-control" name="user_id" placeholder="ログインID ... " required>
				</div>

				<div class="form-group">
					<label for="">パスワード </label>
					<input type="password" class="form-control" name="password" placeholder="パスワード ... " required>
				</div>
				<div class="form-group"><a target="_blank" href="https://asupura.com/members/users/set_pass">ID・パスワードを忘れた方　＞</a></div>
				

				<button type="submit" name="button-login" class="btn-logout">ログイン</button>
				<div class="form-group">
					<div class="logout-or">
					<div class="margin-top-10"><span>または</span></div>
					</div>
				</div>
				<a href="https://asupura.com/api/twitter/authorize " title="" id="frm_login_a"><p class="btn-logout-sns btn-login-twitter">Twitterでログイン</p></a>
				<a href="https://asupura.com/api/facebook/authorize" title="" id="frm_login_a"><p class="btn-logout-sns btn-login-facebook">Facebookでログイン</p></a>
				
			</form>
			<?php } ?>
		</div>
	</div>
	<div class="page-logout-right">
		<legend><span>まだアスプラ会員に登録されていない方</span></legend>
		<div class="form-group">ログインIDをお持ちでない方はこちらよりご登録ください。</div>
		<div class="form-group">会員になると、お得な特典や、便利な機能もご利用いただけます。</div>
		<ul>
			<li>体育会向けの記事が読める</li>
			<li>各ライターに直接質問ができる</li>
			<li>記事をブックマークできる</li>
			<li>体育会限定のイベントに参加できる</li>
			<li>体育会人材が得をする非公開情報が届く </li>
		</ul>
		<div class="logout-or">
			<button type="button" name="button-login" class="btn-logout-red">新規会員登録</button>
		</div>
	</div>
</div>
</main>
<?php } ?>



<!-- SP -->
<?php //if( wpmd_is_device() ) { ?>

<main class="box-page-sp">
<?php if(isset($_SESSION['api_token'])) { 
				echo 'ログインを完了しました。';
				?>
				<form action="" method="POST" role="form">
				<br>
					<button type="submit" name="button-logout" class="button-login">LOGOUT</button>
				</form>
				<?php
			} else { ?>
	<div class="sp-box-login sp-box-login-page">
            <div id="asuplus-sidebar">
            <div class="login-sidebar">
                <div class="login-title">       
                    <span>LOG IN</span>&nbsp;&nbsp;&nbsp;会員ログイン
                </div>
                <div class="login-content">
                    <form method="POST" action="https://asupura.com/api/login">
                    <input type="text" required class="login-username login-input" name="user_id" placeholder="ログインID" />
                    <input type="password" required class="login-password login-input" name="password" placeholder="パスワード" /><br/>
                    <a target="_blank" id="login-forgot-pwd" href="https://asupura.com/members/users/set_pass">パスワードをお忘れの方はこちら</a>
                    <?php if(isset($message_login)) { echo '<div style="color: red; margin-bottom: 5px; margin-top: 20px">'.$message_login.'<div>'; } ?>
                    <div class="button-login-new">
                        <input id="button-login-new-login" type="submit" name="sp-button-login" value="ログイン">
                    </div>
                    <div class="button-login-new btn-sns-author">
                        <a href="<?php echo API_URL;?>/twitter/authorize" title="">
                        <div class="btn-sns-twitter">
                        <span class="font-white-color">Twitterで<br>ログイン</span>
                        </div>
                        </a>
                        <a href="<?php echo API_URL;?>/api/facebook/authorize" title="">
                            <div class="btn-sns-facebook">
                            <span class="font-white-color">Facebookで<br>ログイン</span>
                            </div>
                        </a>
                    </div>
                    </form>


                    <hr/>
                    <span id="login-registry">ログインIDをお持ちでない方はこちら</span>
                    <div id="button-registry">
                        <span class="font-white-color">新規会員登録</span>
                    </div>
                </div>
            </div>
            </div>
            </div>
</main>
<?php } //} ?>


<?php get_footer(); ?>