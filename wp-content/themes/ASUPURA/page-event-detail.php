<?php
/*
Template Name: Event Detail
*/
?>
<?php
if(!isset($_SESSION['api_token'])) {
    wp_redirect( home_url().'/login' ); exit; 
}
?>
<?php get_header(); ?>
<!-- MAIN -->
<?php
	if(isset($_SESSION['api_token']) and isset($_GET['event_id'])) {
		$event_id = $_GET['event_id'];
		$array = array(
            'event_id' => $event_id,
		);
		$array_pickup = array(
            'pickup_flg' => '1',
		);
		$eventDetailPickup = API::getProcess('getevent.json', $array_pickup);
		$eventDetailDay = API::getProcess('geteventdate.json', $array);
		$eventDetail = API::getProcess('getevent.json', $array);

		// if($_SESSION['day_id'] == $eventDetail['data'][0]['day_id'] || !isset($_SESSION['day_id'])) {
		$registerDay = $eventDetail['data'][0]['day_id'];
		// }
		// else {
// 
		// }

		$date = explode('-', $eventDetail['data'][0]['date']);
		$date_bot = $date[0].'/'.$date[1] .'/'.$date[2] .'(金)';

		$date_title = $date[1].'月'.$date[2] .'日（金）';

?>
<?php

	// Registration Event 
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST['submit_regis_event'])) {
			/*if(isset($_POST['day_id_registration'])) {
				$register = $_POST['day_id_registration'];
			}
			else {
				$register = $registerDay;
			}*/
			$register = $_POST['day_id_registration'];

			if($register != "") {
				// $registerDay
				$array = array(
					'event_id' => $_GET['event_id'],
					'day_id' => $register,
				);
				//echo $register;
				$registration = API::postProcess('eventresistration.json', $array);

				if($registration['status'] == 'success') {
					// redirect page thanks
					$url = 'https://' . $_SERVER['HTTP_HOST'];            // Get the server
					$url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // Get the current directory
					$url .= '/events/event-thank';            // <-- Your relative path
					/*/
					/header('Location: ' . $url, true, 301);              // Use either 301 or 302
					header( 'Location: http://www.yoursite.com/new_page.html' ) ;
					*/
					?>
					<script>
					    window.location.href = "<?php echo $url;?>"
					</script>
					<?php
				}
				else {
					$message = 'イベント申し込み受付に失敗しました。<br/>同じイベントに重複して申し込むことはできません。<br/>お心当たりのない方は、ページ下部の「お問い合わせ」よりご連絡ください。';
				}	
			} else {
				$message = '参加日程を選択してください';
			}
			
		}
	}
?>


<div class="event-container">
	<?php
	if($eventDetail['data'][0]['category'] == "勉強会・その他") { 
        $category_name = 'イベント';
        $color = '#3f51b4';
    } elseif($eventDetail['data'][0]['category'] == "アスリート就職セミナー") {
        $category_name = 'セミナー';
        $color = '#9b26af';
    }
    elseif ($eventDetail['data'][0]['category'] == "企業説明会" || $data['category'] == '合同企業説明会') {
        $category_name = '会社説明会';
        $color = '#009487';
    }
    else {
        $category_name = $eventDetail['data'][0]['category'];
        $color = '#01bbd3';
    }
	?>
	<div class="event-title"><?php echo $eventDetail['data'][0]['name']; ?> </div>
	<div class="event-moment"><span style="background-color: <?php echo $color; ?>"><?php echo $category_name; ?></span>
	<?php echo $eventDetail['data'][0]['name'];?><?php echo $eventDetail['data'][0]['area'];?>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php 
	$ddate_def = $eventDetail['data'][0]['date'];
	$date_def = explode('-', $ddate_def);
	$date_title_def = $date[1].'月'.$date[2] .'日（'.returnDay($ddate_def).'）';
	?>
	<?php if(isset($_POST['submit-date'])) { 
		$arrDate = explode('-', $_POST['getDateReg'])[0];
		// $_SESSION['day_id'] = explode('-', $_POST['getDateReg'])[1];
		$ddate = $eventDetailDay['day'][$arrDate]['date'];

		$date = explode('-', $eventDetailDay['day'][$arrDate]['date']);
		$date_title = $date[1].'月'.$date[2] .'日（'.returnDay($ddate).'）';
		echo  $date_title;
		?>
	<?php } else { echo $date_title_def; } ?>
	</div>
	<div class="event-moment-sp"><span style="background-color: <?php echo $color; ?>"><?php echo $category_name; ?></span>
	<?php if(isset($_POST['submit-date'])) { 
		$arrDate = explode('-', $_POST['getDateReg'])[0];
		// $_SESSION['day_id'] = explode('-', $_POST['getDateReg'])[1];
		$ddate = $eventDetailDay['day'][$arrDate]['date'];
		$date = explode('-', $eventDetailDay['day'][$arrDate]['date']);
		$date_title = $date[1].'月'.$date[2] .'日（'.returnDay($ddate).'）';
		echo  $date_title;
		?>
	<?php } else { echo $date_title_def; } ?>
	 
	<br> <br><?php echo $eventDetail['data'][0]['name'];?><?php echo $eventDetail['data'][0]['area'];?>　</div>
	<?php if(isset($eventDetail['data'][0]['photo'])) { ?>
	<div class="img-baner"><img src="<?php echo $eventDetail['data'][0]['photo']; ?>" alt="Image"></div>
	<?php } ?>
	<div class="event-checkbox"> 
		<a href="#check-comment1" title=""><span>このイベントについて <img src="<?php bloginfo('template_directory'); ?>/images/icon_event_detail_down.png" alt=""></span></a>
		<a href="#check-comment2" title=""><span>担当スタッフから一言 <img src="<?php bloginfo('template_directory'); ?>/images/icon_event_detail_down.png" alt=""></span></a>
		<a href="#check-comment3" title=""><span>開催概要 <img src="<?php bloginfo('template_directory'); ?>/images/icon_event_detail_down.png" alt=""></span></a>
	</div>
	<div class="btn-sp-reg-margin30">
		<a href="#map" title="参加お申込みはこちら">
		<div class="btn-sp-reg">
			<img src="<?php bloginfo('template_directory'); ?>/sass/images/arrow_2.png"> 参加お申込みはこちら
		</div>
		</a>
	</div>

	<div class="content-textbooks" id="check-comment1">
		<div class="textbooks-title"><?php echo $eventDetail['data'][0]['title1'];?></div>
		<div class="textbooks-title-sp"><?php echo $eventDetail['data'][0]['title1'];?></div>
		<div class="content-textbooks-detail">
			<?php echo str_replace("\r\n", "<br />", $eventDetail['data'][0]['comment1']); ?>
		</div>
	</div>

	<!-- Text 2 -->
	<div class="content-textbooks" id="check-comment2">
		<div class="textbooks-title">担当者スタッフから一言</div>
		<div class="textbooks-title-sp">担当者スタッフから一言</div>
		<div class="content-textbooks-detail"> 
			<div class="content-textbooks-detail-left">
				<!-- <span class="textbooks-detail-left-img"></span> -->
				<div class="img-gray">
				<?php if(isset($eventDetail['data'][0]['photo2'])) { ?>
				<img src="<?php echo $eventDetail['data'][0]['photo2'];?>" alt="">
				<?php } ?>
				</div>
				<?php //Insert Photo : echo $eventDetail['photo1'];?>
			</div>
			<div class="content-textbooks-detail-right">
				<?php echo str_replace("\r\n", "<br />", $eventDetail['data'][0]['comment2']); ?>
			</div>
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
	</div>
	<!-- End text 2 -->
	<!-- Text 3 -->
	<div class="content-textbooks" id="check-comment3">
		<div class="textbooks-title"  id="ed-title-date"><?php echo $eventDetail['data'][0]['title3'];?></div>
		<div class="textbooks-title-sp"><?php echo $eventDetail['data'][0]['title3'];?></div>
		<div class="content-textbooks-detail map-padding">
			<div>
				<strong>■開催日時</strong><br>
				<?php
				$ddate_def = $eventDetail['data'][0]['date'];
							
				$date_def = explode('-', $eventDetail['data'][0]['date']); 
				$date_bot_def = $date_def[0].'/'.$date_def[1] .'/'.$date_def[2] .'('.returnDay($ddate_def).')';
				if(isset($_POST['submit-date'])) { 
					
					$arrDate = explode('-', $_POST['getDateReg'])[0];
					// $_SESSION['day_id'] = explode('-', $_POST['getDateReg'])[1];
					$ddate = $eventDetailDay['day'][$arrDate]['date'];
							
					$date = explode('-', $eventDetailDay['day'][$arrDate]['date']);
					$date_bot = $date[0].'/'.$date[1] .'/'.$date[2] .'('.returnDay($ddate).')';
					?>
					<?php echo $date_bot;?>　<?php echo ($eventDetailDay['day'][$arrDate]['start_time']);?>～<?php echo ($eventDetailDay['day'][$arrDate]['end_time']);?><br><br>
				<?php } else { ?>

				<?php echo $date_bot_def;?>　<?php echo ($eventDetail['data'][0]['start_time']);?>～<?php echo ($eventDetail['data'][0]['end_time']);?><br><br>
				
				<?php } ?>

				<strong>■場所／住所</strong><br>
				<?php echo $eventDetail['data'][0]['place'];?>　<br><br> 

				<strong>■アクセス</strong><br>
				・<?php echo $eventDetail['data'][0]['access'];?><br><br>
			</div>
			<div class="event-map" id="map">
			</div>
			<div class="text-right">
				<span><img id="zoom-map-event" src="<?php bloginfo('template_directory'); ?>/images/map_btn.png" alt=""></span>
			</div>
		
			<div class="text-center">
			<?php
			for ($i=0; $i < count($eventDetailDay['day']); $i++) { 
				if($eventDetailDay['day'][$i]['date'] >= date('Y-m-d')) {
					$dateFromNow[$i] = $eventDetailDay['day'][$i];
				}
			}
			if(count($dateFromNow) != 0) {
			?>
				<form action="" method="post" id="frmGetDate">
				<select name="getDateReg" id="getDateReg" class="button-white detail-button-date"  onchange="this.form.submit()">
					<option value="">参加日程を選択してください</option>
					<?php 
						
						for ($i=0; $i < count($eventDetailDay['day']); $i++) { 
							$ddate = $eventDetailDay['day'][$i]['date'];
							
							$date = explode('-', $eventDetailDay['day'][$i]['date']);
							$day_id = $eventDetailDay['day'][$i]['day_id'];
							
							if($eventDetailDay['day'][$i]['date'] < date('Y-m-d')) {
								continue;
							}
							$date_bot = $date[0].'/'.$date[1] .'/'.$date[2] .'('.returnDay($ddate).')';
							$time_bot = $eventDetailDay['day'][$i]['start_time'].'～'.$eventDetailDay['day'][$i]['end_time'];
							// $day_id_select = $eventDetail['data'][0]['day'][$i]['day_id'];
					?>

					<option value="<?php echo $i."-".$day_id;?>"><?php echo $date_bot.'&nbsp;&nbsp;'.$time_bot; ?></option>
					
					<?php } ?>
				</select>
				<input type="hidden" name="submit-date" >
				</form>
				<?php } else { echo '<div id="message-box" class="log-message">お申込み出来る日程がありません</div>'; } ?>
			<?php //else { echo 'お申込み出来る日程がありません'; } ?>
			</div>
			<div class="text-center frm-btn-regis-event">
			<?php //regis ?>
				<?php
					$ddate_def = $eventDetail['data'][0]['date'];
								
					$date_def = explode('-', $eventDetail['data'][0]['date']); 
					$date_bot_def = $date_def[0].'/'.$date_def[1] .'/'.$date_def[2] .'('.returnDay($ddate_def).')';
					if(isset($_POST['submit-date'])) { 
						
						$arrDate = explode('-', $_POST['getDateReg'])[0];
						$ddate = $eventDetailDay['day'][$arrDate]['date'];
								
						$date = explode('-', $eventDetailDay['day'][$arrDate]['date']);
						$date_bot = $date[0].'/'.$date[1] .'/'.$date[2] .'('.returnDay($ddate).')'; 
						$dayConfirm = $date_bot . ' ' . ($eventDetailDay['day'][$arrDate]['start_time']) . '～' . ($eventDetailDay['day'][$arrDate]['end_time']);
					}
					$nameConfirmEvent = $eventDetail['data'][0]['name'];
				?>


			<form action="" method="post">
				<input type="hidden" id="get_dayid" name="name_get_dayid">

				<?php
					if(isset($_POST['submit-date'])) { 
						$getDay = explode('-', $_POST['getDateReg'])[1];
						?><input type="hidden" name="day_id_registration" value="<?php echo $getDay; ?>" ><?php
					}
				?>
				<?php if(count($dateFromNow) != 0) { ?>
				<?php if(wpmd_is_notdevice()) { ?>
				<button type="submit" class="button" name="submit_regis_event" style="border: 0px;" <?php if(isset($dayConfirm)) { ?>onClick="return confirm('以下のイべントに申し込みます．よろしいですか？ \n&#9679; イベント名：<?php echo $nameConfirmEvent; ?> \n&#9679; 選択日時：<?php echo $dayConfirm;?>');" <?php } ?>>上記日程で申し込む</button>
				<?php } ?>
				<?php //if( wpmd_is_device() ) { ?>
				<div class="box-page-sp">
				<button type="submit" class="button-sp btn-regis-event" name="submit_regis_event" style="border: 0px;" <?php if(isset($dayConfirm)) { ?>onClick="return confirm('以下のイべントに申し込みます．よろしいですか？ \n&#9679; イベント名：<?php echo $nameConfirmEvent; ?> \n&#9679; 選択日時：<?php echo $dayConfirm;?>');" <?php } ?>>上記日程で申し込む</button>
				</div>
				<?php } //} ?>
			</form>
			<div id="message-box" class="log-error">
			<?php if(isset($message)) { echo $message;}?>
			</div>
			<div id="message-box" class="log-success">
			<?php if(isset($message_sucess)) { echo $message_sucess;}?>
			</div>
			</div>
		</div>
	</div>
	<!-- End text 3 -->
	<input type="hidden" id="inputAddress" value="<?php echo $eventDetail['data'][0]['address']; ?>">
	<!-- PICK UP EVENT -->
	<div class="pick-up-event">
		<div class="pick-up-event-title"><div class="text-right"><i>PICK UP EVENT</i></div>
			注目されているイベント情報
			
		</div>
		<div class="pick-up-event-title-sp"><div class="text-left">PICK UP</div>注目されているイベント情報</div>
		<div class="pick-up-event-list">
			<ul>
				<?php

				// unset($eventDetail['data'][0]);
				$sorted = uasort($eventDetailPickup['data'], function($a, $b) {
					return ($a['date'].' '.$a['start_time'] > $b['date'].' '.$b['start_time']);
				});
				date_default_timezone_set('Asia/Tokyo');
				//$filtered = $eventDetailPickup['data'];
				$filtered = array_filter($eventDetailPickup['data'], function($var) {
					return(($var['date'].' '.$var['start_time']) > date('Y-m-d H:i'));
				});

				$filtered = array_values($filtered);
		// 		echo '<pre>';
		// print_r($filtered);
		// echo '</pre>';
				$count_pickup = 0;
				if(count($filtered) > 4) {
					$count_pickup = 4;
				}
				else {
					$count_pickup = count($filtered);
				}
				for($i = 0; $i < $count_pickup; $i++) {
					$date = explode('-', $filtered[$i]['date']);
					$date_bot = $date[1] .'/'.$date[2];
					$time_bot = $filtered[$i]['start_time'].'～'.$filtered[$i]['end_time'];

					$ddate = $filtered[$i]['date'];
					
					if($filtered[$i]['category'] == "勉強会・その他") { 
		                $color = '#3f51b4';
		            } elseif($filtered[$i]['category'] == "アスリート就職セミナー") {
		                $color = '#9b26af';
		            }
		            elseif ($filtered[$i]['category'] == "企業説明会" || $data['category'] == '合同企業説明会') {
		                $color = '#009487';
		            }
		            else {
		                $color = '#01bbd3';
		            }

            		mb_internal_encoding("UTF-8");
					?>
						<li>
							<div class="pick-up-event-list-content">
								<span class="category" style="background-color: <?php echo $color; ?>"><?php echo $filtered[$i]['category']; ?></span>
								<a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $filtered[$i]['id'] ?>"><img src="<?php if($filtered[$i]['photo'] == "") { echo "https://upload.wikimedia.org/wikipedia/en/0/0d/Null.png"; } else { echo $filtered[$i]['photo']; } ?>" alt=""></a>
								<div class="time"><span><?php echo $filtered[$i]['area']; ?>　</span><?php echo $date_bot; ?>&nbsp;（<?php echo returnDay($ddate); ?>）&nbsp;&nbsp;<?php echo $time_bot; ?></div>
								<div class="title"><a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $filtered[$i]['id'] ?>"><?php if(mb_strlen($filtered[$i]['name']) > 21) { echo mb_substr($filtered[$i]['name'], 0, 21).'...'; } else { echo $filtered[$i]['name']; }?></a></div>
							</div>
						</li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>


<?php } ?>

<!-- END MAIN -->
<?php get_footer();?>

<!-- Map -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript"> 

// initialize
function initialize(zoom) {

	//get latitude and get longitude
	var geocoder = new google.maps.Geocoder();
	var getAddress = $('#inputAddress').val();


	geocoder.geocode( { 'address': getAddress}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {
		    var latitude = results[0].geometry.location.lat();
		    var longitude = results[0].geometry.location.lng();
		   	var myLatLng = {lat: latitude, lng: longitude};
		   // view maps	
			var mapProp = {
				center:new google.maps.LatLng(latitude, longitude),
			    zoom:zoom,
			    mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("map"),mapProp);
			var marker = new google.maps.Marker({
			    position: myLatLng,
			    map: map,
			    title: 'Hello World!'
			  });
		} 
	});
}

google.maps.event.addDomListener(window, 'load', initialize(12));

var i = 12;
$('#zoom-map-event').click(function() {
	i++;
	google.maps.event.addDomListener(window, 'load', initialize(i));
});

$(document).ready(function(){
	<?php if(isset($arrDate) ) { ?>
	var num = <?php echo $arrDate; ?>;
	
	$('.detail-button-date option').each(function() {
		var optionValue = $(this).val();
		optionValue = optionValue.split('-')[0];
		if(optionValue == num) {
			$(this).prop('selected', true);
		}
	});
	
	$("html, body").animate({ scrollTop: $("#ed-title-date").offset().top }, "slow");
	
	<?php }?>
	/*var getDateConfirm = $("#getDateReg option:selected").text();
	$('#setDayConfirm').val(getDateConfirm);*/
	$('#get_dayid').val($('#set_dayid').val());
});

$(document).ready(function(){
	<?php if(isset($message)) { ?>
		$("html, body").animate({ scrollTop: $("#zoom-map-event").offset().top }, 0);
	<?php } ?>
});

</script>