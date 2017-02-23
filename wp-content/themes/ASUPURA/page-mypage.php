<?php
/*
Template Name: My Page
*/
?>
<?php get_header(); ?>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type='text/javascript'>
   
    $(function(){
    
        var iFrames = $('iframe');
      
    	function iResize() {
    	
    		for (var i = 0, j = iFrames.length; i < j; i++) {
    		  iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';}
    	    }
    	    
        	if ($.browser.safari || $.browser.opera) { 
        	
        	   iFrames.load(function(){
        	       setTimeout(iResize, 0);
               });
            
        	   for (var i = 0, j = iFrames.length; i < j; i++) {
        			var iSource = iFrames[i].src;
        			iFrames[i].src = '';
        			iFrames[i].src = iSource;
               }
               
        	} else {
        	   iFrames.load(function() { 
        	       this.style.height = this.contentWindow.document.body.offsetHeight + 'px';
        	   });
        	}
        
        });



//..

</script>


<?php 
if(isset($_SESSION['api_token'])) {
	$infoUser =  API::getProcess('user.json');
	$getLinkMypage = API::getProcess('getmypagelink.json');
	if($getLinkMypage['status'] == "success") {
		$linkMypage = $getLinkMypage;
		//var_dump($linkMypage);
	}
}

?>

<!-- PC -->
<?php if( wpmd_is_notdevice() ) { ?>
<main id="main_mypage-pc">
	<div class="title-page-mypage">マイページ</div>
	<div id="mypage-asupura">
		<div class="mypage-box-left">
			<div class="box-tool-link">
				<div class="tool-link-title">MEMBER INFO&nbsp;<span>会員情報</span></div>
				<a href="<?php echo $linkMypage['login_info'];?>" title="ログイン情報を変更する" target="iframe_a" id="reload_iframe1"><div class="tool-link-memb" id="link-active">ログイン情報を変更する</div></a>
				<a href="<?php echo $linkMypage['user_info'];?>" title="ユーザー情報を変更する" target="iframe_a" id="reload_iframe2"><div class="tool-link-memb">ユーザー情報を変更する</div></a>
				<a href="<?php echo $linkMypage['delivery_info'];?>" title="情報配信方法を変更する" target="iframe_a" id="reload_iframe3"><div class="tool-link-memb">情報配信方法を変更する</div></a>
				<a href="<?php echo site_url();?>/favorites" title="お気に入り記事"><div class="tool-link-memb">お気に入り記事</div></a>
				<a href="<?php echo API_URL;?>/api/twitter/authorize" title="Twitter ログイン連携" ><div class="tool-link-memb">Twitter ログイン連携</div></a>
				<a href="<?php echo API_URL;?>/api/facebook/authorize" title="Facebook ログイン連携"><div class="tool-link-memb">Facebook ログイン連携</div></a>
			</div>

			<div class="box-tool-link">
				<div class="tool-link-title">EVENT INFO&nbsp;<span>イベント情報</span></div>
				<a href="<?php echo $linkMypage['registered_event'];?>" title="予約済みイベントを確認する" target="iframe_a" id="reload_iframe"><div class="tool-link-memb">予約済みイベントを確認する</div></a>
				<a href="<?php echo $linkMypage['event_entrysheet'];?>" title="イベント参加票ダウンロード(PDF)" target="iframe_a" id="reload_iframe"><div class="tool-link-memb">イベント参加票ダウンロード(PDF)</div></a>
			</div>

			<div class="box-tool-link">
				<div class="tool-link-title">MESSAGE&nbsp;<span>メッセージ</span></div>
				<a href="<?php echo $linkMypage['message_inbox'];?>" title="受信箱" target="iframe_a" id="reload_iframe"><div class="tool-link-memb">受信箱</div></a>
				<a href="<?php echo $linkMypage['message_asupura'];?>" title="アスプラからのお知らせ" target="iframe_a" id="reload_iframe"><div class="tool-link-memb">アスプラからのお知らせ</div></a>
			</div>

			<div class="box-tool-link">
				<div class="tool-link-title">OTHERS&nbsp;<span>その他</span></div>
				<a href="<?php echo $linkMypage['withdrawal'];?>" title="退会申請" target="iframe_a" id="reload_iframe"><div class="tool-link-memb">退会申請</div></a>
			</div>
		</div>
		<div class="mypage-box-right">
			<div class="main-mypage-content">
			  <iframe src="<?php echo $linkMypage['login_info'];?>" name="iframe_a" width="100%" class="iframe" id="iframe-main" scrolling="yes" frameborder="0" style="min-height: 870px;"></iframe>
			</div>
		</div>
	</div>
</main>
<?php } ?>



<!-- SP -->
<?php //if( wpmd_is_device() ) { ?>
<div id="main_mypage">
	<!-- COL TITLE -->
	<a id="link-mypage1">
		<div class="tab-menu-col" >
		    <div class="tab-menu-col-text">会員情報</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" id="image_up"></span>
		</div>
	</a>
	<!-- END COL TITLE -->
	
	<div id="show-sub-mypage1">
	<!-- SUB TITLE -->
	<a href="<?php echo $linkMypage['login_info'];?>" title="ログイン情報を変更する" target="iframe_b" id="show-iframe-sp">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">ログイン情報を変更する</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->

	<!-- SUB TITLE -->
	<a href="<?php echo $linkMypage['user_info'];?>" title="ユーザー情報を変更する" target="iframe_b" id="show-iframe-sp1">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">ユーザー情報を変更する</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->

	<!-- SUB TITLE -->
	<a href="<?php echo $linkMypage['delivery_info'];?>" title="情報配信方法を変更する" target="iframe_b" id="show-iframe-sp2">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">情報配信方法を変更する</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->

	<!-- SUB TITLE -->
	<a href="<?php echo site_url();?>/favorites">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">お気に入り記事</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->

	<!-- SUB TITLE -->
	<a href="<?php echo API_URL;?>/twitter/authorize" title="Twitter ログイン連携">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">Twitter ログイン連携</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->

	<!-- SUB TITLE -->
	<a href="<?php echo API_URL;?>/facebook/authorize" title="Facebook ログイン連携">
		<div class="tab-menu-col" id="sub-title-mypage">
		    <div class="tab-menu-col-text">Facebook ログイン連携</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END SUB TITLE -->
	</div>

	<!-- COL TITLE -->
	<a id="link-mypage2">
		<div class="tab-menu-col" >
		    <div class="tab-menu-col-text">イベント情報</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END COL TITLE -->

	<div id="show-sub-mypage2" style="display: none;">
		<!-- SUB TITLE -->
		<a href="<?php echo $linkMypage['registered_event'];?>" title="予約済みイベントを確認する" target="iframe_b" id="show-iframe-sp3">
			<div class="tab-menu-col" id="sub-title-mypage">
			    <div class="tab-menu-col-text">予約済みイベントを確認する</div>
			    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
			</div>
		</a>
		<!-- END SUB TITLE -->
		
		<!-- SUB TITLE -->
		<a href="<?php echo $linkMypage['event_entrysheet'];?>" title="イベント参加票ダウンロード(PDF)" target="iframe_b" id="show-iframe-sp4">
			<div class="tab-menu-col" id="sub-title-mypage">
			    <div class="tab-menu-col-text">イベント参加票ダウンロード(PDF)</div>
			    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
			</div>
		</a>
		<!-- END SUB TITLE -->
	</div>

	<!-- COL TITLE -->
	<a id="link-mypage3">
		<div class="tab-menu-col" >
		    <div class="tab-menu-col-text">メッセージ</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END COL TITLE -->
	<div id="show-sub-mypage3" style="display: none;">
		<!-- SUB TITLE -->
		<a href="<?php echo $linkMypage['message_inbox'];?>" title="受信箱" target="iframe_b" id="show-iframe-sp5">
			<div class="tab-menu-col" id="sub-title-mypage">
			    <div class="tab-menu-col-text">受信箱</div>
			    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
			</div>
		</a>
		<!-- END SUB TITLE -->

		<!-- SUB TITLE -->
		<a href="<?php echo $linkMypage['message_asupura'];?>" title="アスプラからのお知らせ" target="iframe_b" id="show-iframe-sp6">
			<div class="tab-menu-col" id="sub-title-mypage">
			    <div class="tab-menu-col-text">アスプラからのお知らせ</div>
			    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
			</div>
		</a>
		<!-- END SUB TITLE -->
	</div>
	<!-- COL TITLE -->
	<a id="link-mypage4">
		<div class="tab-menu-col" >
		    <div class="tab-menu-col-text">その他</div>
		    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
		</div>
	</a>
	<!-- END COL TITLE -->
	<div id="show-sub-mypage4" style="display: none;">
		<!-- SUB TITLE -->
		<a href="<?php echo $linkMypage['withdrawal'];?>" title="退会申請" target="iframe_b" id="show-iframe-sp7">
			<div class="tab-menu-col" id="sub-title-mypage">
			    <div class="tab-menu-col-text">退会申請</div>
			    <span><img src="<?php echo site_url(); ?>/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images"></span>
			</div>
		</a>
		<!-- END SUB TITLE -->
	</div>
</div>

<div class="box-page-sp">
<div id="container-mypage-sp">
	<iframe src="<?php echo $linkMypage['login_info'];?>" width="100%" name="iframe_b" id="iframe_id_sp" ></iframe>
	<div class="event-pagination box-page-sp" id="icon-back-mypage">
		<div class="event-pagination-btn1">
			<a href="<?php echo site_url();?>/mypage" class="sp-btn-pagination">
			<img src="https://asupura.com/asupura_cms/wp-content/themes/ASUPURA/images/event_pagination_pre.png" alt="">戻る</a>
		</div>
	</div>
</div>
</div>
<?php //} ?>
<input type="hidden" name="inputUrl_name_web" id="inputUrl_name_web" value="<?php echo site_url();?>">
<script type="text/javascript">
	$(document).ready(function() {
		var imagehide1 = true;
		var host = $('#inputUrl_name_web').val();
		$("#click_id_hide").click(function(){
		    $("#show_id_1").slideToggle("slow");
		    if(imagehide1) { 
			    $("#click_id_hide span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-plus.png" alt="Images" width="20" height="20">');
				imagehide1 = false;
				return;
			}
			$("#click_id_hide span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" width="20">');
			imagehide1 = true;
		});

		$('#show_id_2').css('display', 'none');
		var imagehide2 = true;
		$("#click_id_hide2").click(function(){
		    $("#show_id_2").slideToggle("slow");
		    if(imagehide2) { 
		    	$("#click_id_hide2 span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" width="20">');
			    
				imagehide2 = false;
				return;
			}
			$("#click_id_hide2 span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-plus.png" alt="Images" width="20" height="20">');
			imagehide2 = true;
		});

		$('#show_id_3').css('display', 'none');
		var imagehide3 = true;
		$("#click_id_hide3").click(function(){
		    $("#show_id_3").slideToggle("slow");
		    if(imagehide3) { 
		    	$("#click_id_hide3 span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" width="20">');
				imagehide3 = false;
				return;
			}
			 $("#click_id_hide3 span").html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-plus.png" alt="Images" width="20" height="20">');
			imagehide3 = true;
		});




		// link menu sp
		var menuSp1 = true;
		var host = $('#inputUrl_name_web').val();
		$("#link-mypage1").click(function(){
		    $("#show-sub-mypage1").slideToggle("slow", "linear");
		    if(menuSp1) { 
			    $("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images" id="frm-my-img"> ');
				menuSp1 = false;
				return;
			}
			$("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" id="image_up">');
			menuSp1 = true;
		});


		//2
		var menuSp2 = true;
		var host = $('#inputUrl_name_web').val();
		$("#link-mypage2").click(function(){
		    $("#show-sub-mypage2").slideToggle("slow", "linear");
		    if(menuSp2) { 
			    $("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" id="image_up"> ');
				menuSp2 = false;
				return;
			}
			$("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images" id="frm-my-img">');
			menuSp2 = true;
		});


		//3
		var menuSp3 = true;
		var host = $('#inputUrl_name_web').val();
		$("#link-mypage3").click(function(){
		    $("#show-sub-mypage3").slideToggle("slow", "linear");
		    if(menuSp3) { 
			    $("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" id="image_up"> ');
				menuSp3 = false;
				return;
			}
			$("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images" id="frm-my-img">');
			menuSp3 = true;
		});


		//4
		var menuSp4 = true;
		var host = $('#inputUrl_name_web').val();
		$("#link-mypage4").click(function(){
		    $("#show-sub-mypage4").slideToggle("slow", "linear");
		    if(menuSp4) { 
			    $("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp_menu_up.png" alt="Images" id="image_up"> ');
				menuSp4 = false;
				return;
			}
			$("span", this).html('<img src="'+host+'/wp-content/themes/ASUPURA/images/sp-menu-arrow.png" alt="Images" id="frm-my-img">');
			menuSp4 = true;
		});


		for (var i = 0; i < 8; i++) {
			$('#show-iframe-sp'+i).click(function(){
				$('#main_mypage').hide();
				$('#container-mypage-sp').show();
			});
		};



		// reload iframe
		for (var i = 1; i < 4; i++) {
			$('#reload_iframe'+i).click(function() {
		        $('#iframe-main')[0].contentWindow.location.reload(true);
		    });
	    };

	});
</script>

<?php get_footer(); ?>