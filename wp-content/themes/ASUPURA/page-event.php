<?php
/*
Template Name: Event
*/
?>
<?php
if(!isset($_SESSION['api_token'])) {
    $_SESSION['historyLink'] = 'events';
    wp_redirect( home_url().'/login' ); exit; 
}
?>

<?php get_header(); ?>
<!-- MAIN -->
<?php
    include 'core/pagination.php';
    if(isset($_SESSION['api_token'])) {
        $page_event = 1;

        $limit = 32;
        if(wpmd_is_notdevice()) { 
            $limit = 32;
        } else {
            $limit = 8;
        }
        
        $offset = 0;
        $cate = 0;
        $area = 0;
        
        if(isset($_GET['pg'])) {
            $offset = ($_GET['pg'] - 1) * $limit;
        }

        if(isset($_GET['cate'])) {
            $cate = $_GET['cate'];
        }

        if(isset($_GET['area'])) {
            $area = $_GET['area'];
        }

        $current_year = date('Y');
        $current_month = date('m');
        $date = $current_year.$current_month;

        if(isset($_GET['date']) && $_GET['date'] != '0') {
            $date = $_GET['date'];
            $array = array(
                'offset' => $offset,
                'limit' => 32,
                'filter_category' => $cate,
                'filter_month' => $date,
                'area' => $area,
            );
        }
        else {
            $array = array(
                'offset' => $offset,
                'limit' => 32,
                'filter_category' => $cate,
                'area' => $area,
            );
        }
        

        $eventList = API::getProcess('getevent.json', $array);

        // echo '<pre>';
        // print_r($eventList);
        // echo '</pre>';

        $sorted = uasort($eventList['data'], function($a, $b) {
            return ($a['date'].' '.$a['start_time'] > $b['date'].' '.$b['start_time']);
        });

        $eventList['data'] = array_values($eventList['data']);
        $total_record_per_page = $eventList['total_count'];
        $total_record = $eventList['all_total_count'];
        $total_Page = ceil($total_record / $limit);
        if(isset($_GET['pg'])) {
            $page_event = $_GET['pg'];
            $total_record = $eventList['all_total_count'];
            $total_Page = ceil($total_record / $limit);
        }
    }
?>
<?php if ( is_active_sidebar( 'event-sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'event-sidebar' ); ?>
<?php endif; ?>
<div class="event-container">
    <div class="event-content-top box-page-pc">
        <span class="event-btn-category-title-top">種類でしぼり込みできます</span>
        <a onclick="function_click('cate', 0)" title="全て"><span class="event-btn-category-name-top">全て</span></a>
        <a onclick="function_click('cate', 1)"  title="イベント"><span class="event-btn-category-name-top2">イベント</span></a>
        <a onclick="function_click('cate', 2)"  title="セミナー"><span class="event-btn-category-name-top3">セミナー</span></a>
        <a onclick="function_click('cate', 3)" title="会社説明会"><span class="event-btn-category-name-top4">会社説明会</span></a>
        <span class="event-checklist-date">
            <select name="valArea" id="valArea" onChange="function_click('area', this.value)">
                <option value="">地域から絞り込む</option>
                <option value="0">すべて</option>
                <option value="1">関東</option>
                <option value="2">関西</option>
                <option value="3">東海</option>
                <option value="4">九州</option>
                <option value="9">その他</option>
            </select>
        </span>
        <span class="event-checklist-date">
            <select name="" id="mySelect" onChange="function_click('date', this.value)">
                <option value="">開催月から絞り込む</option>
                <option value="0">すべて</option>
            </select>
        </span>
    </div>
    <div class="event-content-top box-page-sp">
        <div class="pc-event-category-title-top"><span class="event-btn-category-title-top">種類でしぼり込みできます</span></div>
        <div class="pc-event-category-name-top">
        <a onclick="function_click('cate', 0)" title="全て"><span class="event-btn-category-name-top">全て</span></a>
        <a onclick="function_click('cate', 1)" title="イベント"><span class="event-btn-category-name-top2">イベント</span></a>
        <a onclick="function_click('cate', 2)" title="セミナー"><span class="event-btn-category-name-top3">セミナー</span></a>
        <a onclick="function_click('cate', 3)" title="会社説明会"><span class="event-btn-category-name-top4">会社説明会</span></a>
        </div>
        <div class="pc-event-category-select-top">
            <div class="event-checklist-date">
                <select name="valArea" id="valArea_sp" onChange="function_click('area', this.value)">
                    <option value="">地域から絞り込む</option>
                    <option value="0">すべて</option>
                    <option value="1">関東</option>
                    <option value="2">関西</option>
                    <option value="3">東海</option>
                    <option value="4">九州</option>
                    <option value="9">その他</option>
                </select>
            </div>
            <br>
            <div class="event-checklist-date">
                <select name="" id="mySelect_sp" onChange="function_click('date', this.value)">
                    <option value="">開催月から絞り込む</option>
                    <option value="0">すべて</option>
                </select>
            </div>
        </div>
    </div>
    <?php if(wpmd_is_notdevice()) { ?>
    <div class="event-content-list clearfix box-page-pc">
        <!-- LIST -->
        <?php 
        
        if($limit > $total_record_per_page) {
            $legPageEvent = $total_record_per_page;
        } else {
             $legPageEvent = $limit;
        }

        for($i = 0; $i < $legPageEvent; $i++) {
            $data = $eventList['data'][$i];
            $date = explode('-', $data['date']);
            $date = $date[1].'/'.$date[2];

            $ddate = $data['date'];

            if($data['category'] == "勉強会・その他") { 
                $category_name = 'イベント';
                $color = '#3f51b4';
            } elseif($data['category'] == "アスリート就職セミナー") {
                $category_name = 'セミナー';
                $color = '#9b26af';
            }
            elseif ($data['category'] == "企業説明会" || $data['category'] == '合同企業説明会') {
                $category_name = '会社説明会';
                $color = '#009487';
            }
            else {
                $category_name = $data['category'];
                $color = '#01bbd3';
            }
            mb_internal_encoding("UTF-8");
            ?>
                <div class="event-list-post">
                    <span class="event-list-category" style="background-color: <?php echo $color; ?>;"><?php echo $category_name; ?></span>
                    <div class="event-list-images"><a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $data['id'] ?>" title=""><img src="<?php if($data['photo'] == "") { echo "https://upload.wikimedia.org/wikipedia/en/0/0d/Null.png"; } else { echo $data['photo']; } ?>" alt=""></a></div>
                    <div class="event-list-title"><?php echo $data['area']; ?>　<?php echo $date; ?>（<?php echo returnDay($ddate); ?>）<?php echo $data['start_time']; ?>～<?php echo $data['end_time']; ?></div>
                    <div class="event-list-des"><a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $data['id'] ?>" title=""><?php if(mb_strlen($data['name']) > 21) { echo mb_substr($data['name'], 0, 21).'...'; } else { echo $data['name']; }?></a></div>
                </div>
            <?php
        }


        $link_full = $_SERVER[ 'QUERY_STRING' ];
        $link_full = preg_replace('/&pg=\d*/',"",$link_full);
        $config = array(
            'current_page'  => isset($_GET['pg']) ? $_GET['pg'] : 1,
            'total_record'  => $total_record,
            'limit'         => $limit,
            'link_full'     => '?'.$link_full .'&pg={page}',
            'range'         => 5
        );
        $paging = new Pagination();
        $paging->init($config);

        ?>
        <!-- // END LIST -->
    </div>
    <?php } ?>
    <!-- SP -->
    <?php //if( wpmd_is_device() ) { ?>
    <div class="event-list-table box-page-sp">
        <!-- LIST -->
        <?php 
        $limit = 8;
        
        if($limit > $total_record_per_page) {
            $legPageEvent = $total_record_per_page;
        } else {
             $legPageEvent = $limit;
        }

        for($i = 0; $i < $legPageEvent; $i++) {
            $data = $eventList['data'][$i];
            $date = explode('-', $data['date']);
            $date = $date[1].'/'.$date[2];

            $ddate = $data['date'];

            if($data['category'] == "勉強会・その他") { 
                $category_name = 'イベント';
                $color = '#3f51b4';
            } elseif($data['category'] == "アスリート就職セミナー") {
                $category_name = 'セミナー';
                $color = '#9b26af';
            }
            elseif ($data['category'] == "企業説明会" || $data['category'] == '合同企業説明会') {
                $category_name = '会社説明会';
                $color = '#009487';
            }
            else {
                $category_name = $data['category'];
                $color = '#01bbd3';
            }
            ?>
            <div class="sp-pickup-content">
                <div class="table-inline table-sp-pickup">
                    <div class="table-sp-pickup-img table-sp-events-img"><a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $data['id'] ?>" title=""><img src="<?php if($data['photo'] == "") { echo "https://upload.wikimedia.org/wikipedia/en/0/0d/Null.png"; } else { echo $data['photo']; } ?>" alt=""></a></div>
                    <div class="table-sp-pickup-text">
                        <div class="pickup-text-date">
                            <?php echo $data['area']; ?>　<?php echo $date; ?>（<?php echo returnDay($ddate); ?>）<?php echo $data['start_time']; ?>～<?php echo $data['end_time']; ?>
                        </div>
                        <div class="pickup-text-content"><a href="<?php echo site_url().'/event-detail/'; ?>?event_id=<?php echo $data['id'] ?>" title=""><?php if(mb_strlen($data['name']) > 21) { echo mb_substr($data['name'], 0, 21).'...'; } else { echo $data['name']; } ?></a></div>
                        <div class="pickup-text-cate"><a style="color: <?php echo $color; ?>;" href="#"><?php echo $category_name; ?></a></div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- END LIST -->

    </div>
    <?php //} ?> 
    <!-- // SP -->
        <?php 
        if($total_record < $limit) {
            $return_pg = $total_record;
        }
        else {
            $return_pg = $limit;
        }

        if(isset($_GET['pg'])) {
        $num_pg = $_GET['pg'];
        $limit_pg = $limit;
        $max_pagi = $total_record / $limit_pg;
        $return_pg = 0;
            if($num_pg > $max_pagi) {
                $return_pg = $total_record;
            } else {
                $return_pg = $num_pg*$limit_pg;
            }
        }
        ?>
    <div style="margin-bottom: 10px;" class="event-pagination-title">全 <?php echo $total_record;?> 件中 <?php if($total_record < $limit) { echo $total_record; } else { echo $limit; } ?> 件表示（<?php echo $return_pg;?>/<?php echo $total_record;?>）</div>

    <?php
    $link_full = $_SERVER[ 'QUERY_STRING' ];
        $link_full = preg_replace('/&pg=\d*/',"",$link_full);
        $config = array(
            'current_page'  => isset($_GET['pg']) ? $_GET['pg'] : 1,
            'total_record'  => $total_record,
            'limit'         => $limit,
            'link_full'     => '?'.$link_full .'&pg={page}',
            'range'         => 5
        );
        $paging = new Pagination();
        $paging->init($config); 

        echo $paging->html_sp();
    ?>
</div>
<!-- END MAIN -->
<?php if(wpmd_is_notdevice()) { ?>
<div class="pagination-event box-page-pc">
<?php
    echo ($paging->html());
?>
</div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function(){
        var getDate = new Date();
        var getYear = getDate.getFullYear();
        var getMonthPresent = getDate.getMonth() + 1;
        var getMonth = getMonthPresent + 11;
        var getMonthAfter = getMonth-12;
        // check month > 12
        for (var i = getMonthPresent; i <= getMonth; i++) {
            if(i == 1 ) { i = '01';}
            else if(i == 2 ) { i = '02';}
            else if(i == 3 ) { i = '03';}
            else if(i == 4 ) { i = '04';}
            else if(i == 5 ) { i = '05';}
            else if(i == 6 ) { i = '06';}
            else if(i == 7 ) { i = '07';}
            else if(i == 8 ) { i = '08';}
            else if(i == 9 ) { i = '09';}
            
            if(i <= 12) {
                $('#mySelect').append('<option value="' + getYear + i + '">' + getYear + '&nbsp;年&nbsp;' + i + '&nbsp;月&nbsp;' +'</option>');
                $('#mySelect_sp').append('<option value="' + getYear + i + '">' + getYear + '&nbsp;年&nbsp;' + i + '&nbsp;月&nbsp;' +'</option>');
            } else {
                getYear += 1;
                for (var j = 1; j <= getMonthAfter; j++) {
                    if(j == 1 ) { j = '01';}
                    else if(j == 2 ) { j = '02';}
                    else if(j == 3 ) { j = '03';}
                    else if(j == 4 ) { j = '04';}
                    else if(j == 5 ) { j = '05';}
                    else if(j == 6 ) { j = '06';}
                    else if(j == 7 ) { j = '07';}
                    else if(j == 8 ) { j = '08';}
                    else if(j == 9 ) { j = '09';}
                    $('#mySelect').append('<option value="' + getYear + j + '">' + getYear + '&nbsp;年&nbsp;' + j + '&nbsp;月&nbsp;' +'</option>');
                    $('#mySelect_sp').append('<option value="' + getYear + j + '">' + getYear + '&nbsp;年&nbsp;' + j + '&nbsp;月&nbsp;' +'</option>');
                }
                break;
            }

        }
    });
</script>

 <?php
    if (isset($_GET['date']) || isset($_GET['area'])) { 
        $month_page = '0';
        $area_page = '0';
        if(isset($_GET['date'])) {
            $month_page = $_GET['date'];
        }

        if(isset($_GET['area'])) {
            $area_page = $_GET['area'];
        }
        // $month_page = $_GET['date']; $area_page = $_GET['area']; 
        ?>
        <script>
            jQuery(document).ready(function(){
                jQuery('#mySelect option').removeAttr('selected').filter('[value=<?php echo $month_page; ?>]').prop('selected', true);
                jQuery('#mySelect_sp option').removeAttr('selected').filter('[value=<?php echo $month_page; ?>]').prop('selected', true);
                jQuery('#valArea option').removeAttr('selected').filter('[value=<?php echo $area_page; ?>]').prop('selected', true);
                jQuery('#valArea_sp option').removeAttr('selected').filter('[value=<?php echo $area_page; ?>]').prop('selected', true);
            });
        </script>
        <?php
    }
?>

<?php get_footer();?>