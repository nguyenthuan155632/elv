<?php 

class ASUPlus_Widget_Latest extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_latest', 
          'ASUPURA Latest',
          array(
              'description' => 'General Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        //$title = esc_attr( $instance['title'] );
        
        //echo 'Import Pick Up title:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        //$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    
  
    
    function widget($args, $instance) {
        extract( $args );
        //$title = $instance['title'];
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $custom_args = array(
            'posts_per_page' => 9,
            'paged' => $paged,
            'order' => 'DESC'
        );

        $the_query = new WP_Query( $custom_args ); 
        
        ?>

        <?php //if( wpmd_is_notdevice() ) { ?>
        
        <div class="latest-content">
            <ul>
                <?php
                $i = 0;
                if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
                $i++;
                if($i == 1) {
                    $content = get_the_excerpt();
                }
                else {
                    $content = "";
                }
                ?>
                <li>

                    <div class="latest-list">
                    <?php 
                        mb_internal_encoding("UTF-8");
                        $category = get_the_category();
                        
                        $color = '';
                        if($category[0]->name == "Báo động - Báo cháy") {
                            $color = '#9b26af';
                        }
                        elseif($category[0]->name == "Camera quan sát") {
                            $color = '#673ab6';
                        }
                        elseif($category[0]->name == "Cơ điện") {
                            $color = '#3f51b4';
                        }
                        elseif($category[0]->name == "Mạng - Tổng đài") {
                            $color = '#01bbd3';
                        }
                        elseif($category[0]->name == "Thiết bị tin học") {
                            $color = '#009487';
                        }
                        ?>
                    <span style="background-color: <?php echo $color; ?>" class="latest-category"><a href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->name; ?></a></span> 
                        <?php

                        $url = get_the_permalink();

                        // リクエストURL
                        $request_url = "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ" ;
                        $request_url_bm = 'http://api.b.st-hatena.com/entry.count?url=' . rawurlencode( $url ) ;
                        $request_url_fb = 'http://graph.facebook.com/?id=' . rawurlencode( $url ) ;

                        //Google
                        $curl = curl_init() ;
                        curl_setopt( $curl, CURLOPT_URL, $request_url ) ;
                        curl_setopt( $curl, CURLOPT_POST, 1 ) ;
                        curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' ) ;
                        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json;charset=utf-8' ) ) ;
                        curl_setopt( $curl, CURLOPT_HEADER, 1 ) ;                       // ヘッダーを取得する
                        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false ) ;           // 証明書の検証を行わない
                        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ) ;            // curl_execの結果を文字列で返す
                        curl_setopt( $curl, CURLOPT_FOLLOWLOCATION , true ) ;           // リダイレクト先を追跡するか？
                        curl_setopt( $curl, CURLOPT_MAXREDIRS, 5 ) ;                    // 追跡する回数
                        curl_setopt( $curl, CURLOPT_TIMEOUT, 15 ) ;                     // タイムアウトの秒数
                        $res1 = curl_exec( $curl ) ;
                        $res2 = curl_getinfo( $curl ) ;
                        curl_close( $curl ) ;

                        // 取得したデータの整理
                        $json = substr( $res1, $res2['header_size'] ) ;    
                                  // 取得したデータ(JSONなど)
                        $header = substr( $res1, 0, $res2['header_size'] ) ;            // レスポンスヘッダー (検証に利用したい場合にどうぞ)

                        // JSONデータからカウント数を取得
                        $array = json_decode( $json, true ) ;

                        // カウント(データが存在しない場合は0扱い)
                        if( isset($array[0]['result']['metadata']['globalCounts']['count']) ) {
                            $count = (int)$array[0]['result']['metadata']['globalCounts']['count'] ;

                        } else {
                            $count = 0 ;

                        }

                        

                        //Bookmark
                        $curl_bm = curl_init() ;
                        curl_setopt( $curl_bm, CURLOPT_URL, $request_url_bm ) ;
                        curl_setopt( $curl_bm, CURLOPT_HEADER, 1 ) ;                       // ヘッダーを取得する
                        curl_setopt( $curl_bm, CURLOPT_SSL_VERIFYPEER, false ) ;           // 証明書の検証を行わない
                        curl_setopt( $curl_bm, CURLOPT_RETURNTRANSFER, true ) ;            // curl_execの結果を文字列で返す
                        curl_setopt( $curl_bm, CURLOPT_TIMEOUT, 15 ) ;                     // タイムアウトの秒数
                        curl_setopt( $curl_bm, CURLOPT_FOLLOWLOCATION , true ) ;           // リダイレクト先を追跡するか？
                        curl_setopt( $curl_bm, CURLOPT_MAXREDIRS, 5 ) ;                    // 追跡する回数
                        $res1_bm = curl_exec( $curl_bm ) ;
                        $res2_bm = curl_getinfo( $curl_bm ) ;
                        curl_close( $curl_bm ) ;
                        $count_bm = substr( $res1, $res2['header_size'] ) ;                // 取得したデータ(JSONなど)
                        $count_bm = json_decode($count_bm)[0]->result->metadata->globalCounts->count;


                        //Facebook
                        $curl_fb = curl_init() ;
                        curl_setopt( $curl_fb, CURLOPT_URL, $request_url_fb ) ;
                        curl_setopt( $curl_fb, CURLOPT_HEADER, 1 ) ;                       // ヘッダーを取得する
                        curl_setopt( $curl_fb, CURLOPT_SSL_VERIFYPEER, false ) ;           // 証明書の検証を行わない
                        curl_setopt( $curl_fb, CURLOPT_RETURNTRANSFER, true ) ;            // curl_execの結果を文字列で返す
                        curl_setopt( $curl_fb, CURLOPT_TIMEOUT, 15 ) ;                 // タイムアウトの秒数
                        curl_setopt( $curl_fb, CURLOPT_FOLLOWLOCATION , true ) ;           // リダイレクト先を追跡するか？
                        curl_setopt( $curl_fb, CURLOPT_MAXREDIRS, 5 ) ;                    // 追跡する回数
                        $res1_fb = curl_exec( $curl_fb ) ;
                        $res2_fb = curl_getinfo( $curl_fb ) ;
                        curl_close( $curl_fb ) ;

                        // 取得したデータの整理
                        $json_fb = substr( $res1_fb, $res2_fb['header_size'] ) ;                 // 取得したデータ(JSONなど)

                        // JSONデータを連想配列に直す
                        $array_fb = json_decode( $json_fb , true ) ;

                        // カウントプロパティが存在する場合
                        if( isset($array_fb['shares']) ) {
                            $count_fb = $array_fb['shares'] ;

                        // カウントプロパティが存在しない場合は0扱い
                        } else {
                            $count_fb = 0 ;

                        }

                        $k++;
                        if($i == 1) {
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <div style="display: none;height: 255px;" class="latest-hover">
                                    <p style="top: 100px;">続きを読む</p>
                                </div>
                            </a>
                                
                                
                            <?php
                        }
                        else {
                            ?>
                                <a href="<?php the_permalink(); ?>">
                                <div style="display: none;" class="latest-hover">
                                    <p>続きを読む</p>
                                    <div class="latest-social-hover">
                                        <div class="latest-sns-img"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-hover.png" alt=""><span class="facebook-no-hover"><?php echo $count_fb; ?></span></div>
                                        <div class="latest-sns-img"><img src="<?php bloginfo('template_directory'); ?>/images/google-hover.png" alt=""><span class="google-no-hover"><?php echo $count; ?></span></div>
                                        <div class="latest-sns-img"><img src="<?php bloginfo('template_directory'); ?>/images/bookmark-hover.png" alt=""><span class="bookmark-no-hover"><?php echo $count_bm; ?></span></div>
                                        <div class="latest-sns-img"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-hover.png" alt=""><!-- <span class="twitter-no-hover"></span> --></div>
                                        <div class="latest-sns-img"><img src="<?php bloginfo('template_directory'); ?>/images/line-hover.png" alt=""><!-- <span class="line-no-hover">0</span> --></div>
                                    </div>
                                </div>
                                </a>
                                
                                
                            <?php
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>">
                        <div class="latest-img">
                        <?php
                        if($i == 1) {
                            ?><?php the_post_thumbnail('pickup-thumb'); ?><?php
                        }
                        else {
                            ?><?php the_post_thumbnail('latest-thumb'); ?><?php
                        }
                        ?>
                            
                        </div>
                        </a>

                        <?php 
                            if($i == 1) {
                                ?>
                                    <div class="latest-detail">
                                <?php
                            }
                            else {
                                ?>
                                    <div class="latest-detail" style="width: 100%;">
                                <?php
                            }
                        ?>
                        <div class="latest-detail">
                            <div class="date"><span><?php the_time('Y.m.d'); ?></span><?php if(newly_posted()) { ?><span class="latest-new">NEW</span><?php } ?></div> 
                            <?php
                            $lengthTitle = mb_strlen(get_the_title());
                            if($lengthTitle > 37) {
                                $title_post = mb_substr(get_the_title(), 0, 37).'...';
                            }
                            else {
                                $title_post = get_the_title();
                            }
                            ?><div class="title"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?> </a></div> <?php
                            ?>
                            <div class="content"><?php echo get_title(60);?> </div> 
                            <?php
                            ?>
                            <div class="latest-social">
                                <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" class="facebook-button" onclick="window.open(this.href,'FBwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;" title="Facebookでシェア"><img src="<?php bloginfo('template_directory'); ?>/images/v5_fb.png" alt=""></a><span class="facebook-no"><?php echo $count_fb; ?></span>
                                <a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'Gwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="googleplus-button"><img src="<?php bloginfo('template_directory'); ?>/images/v5_ggf.png" alt=""></a><span class="google-no"><?php echo $count; ?></span>
                                <a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" target="_blank" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="simple" title="このエントリーをはてなブックマークに追加"><img src="<?php bloginfo('template_directory'); ?>/images/v5_bh.png" alt=""></a><span class="bookmark-no"><?php echo $count_bm; ?></span>
                                <a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php the_permalink(); ?>" class="twitter-button" onclick="window.open(this.href, 'TWwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/v5_tw.png" alt=""></a><!-- <span class="twitter-no"></span> -->
                                <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/v5_line.png" alt=""></a><!-- <span class="line-no">0</span> -->
                            </div>
                        </div>
                        
                    </div>

                </li>
                <!--  -->
                <?php
                endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </ul>
            
            <div class="clear-both"></div>


        </div>
         <div id="pagination-toppage">
            <?php custom_pagination($the_query->max_num_pages,"",$paged); ?>
        </div>

        <?php //} ?>


        <!-- SP -->
        <?php //if( wpmd_is_device() ) { ?>

        <?php
        $args_sp = array(
            'posts_per_page' => '10',
            'order' => 'DESC'
        );
        $the_query_sp = new WP_Query($args_sp);
        ?>

        
        <?php
        if ($the_query_sp->have_posts()) : while ( $the_query_sp->have_posts() ) : $the_query_sp->the_post();
        ?>
        <div class="sp-pickup-content">
        	<div class="table-inline table-sp-pickup">
        		<div class="table-sp-pickup-img">
        			<?php
                    mb_internal_encoding("UTF-8");
                    $category = get_the_category();
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pickup-thumb');
                    ?></a>
        		</div>
        			<?php 
                    $color = '';
                    if($category[0]->name == "Báo động - Báo cháy") {
                        $color = '#9b26af';
                    }
                    elseif($category[0]->name == "Camera quan sát") {
                        $color = '#673ab6';
                    }
                    elseif($category[0]->name == "Cơ điện") {
                        $color = '#3f51b4';
                    }
                    elseif($category[0]->name == "Mạng - Tổng đài") {
                        $color = '#01bbd3';
                    }
                    elseif($category[0]->name == "Thiết bị tin học") {
                        $color = '#009487';
                    }
                    ?>
        		<div class="table-sp-pickup-text">
        			<div class="pickup-text-date">
        				<?php the_time('Y.m.d'); ?><?php if(newly_posted()) { ?><img src="<?php bloginfo('template_directory'); ?>/images/sp_new_post.png" /><?php } ?>
        			</div>
        			<?php
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 21) {
                            $title_post = mb_substr(get_the_title(), 0, 21).'...';
                        }
                        else {
                            $title_post = get_the_title();
                        }
                        ?>
        			<div class="pickup-text-content"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?></a></div>
        			<div class="pickup-text-cate"><a style="color: <?php echo $color; ?>" href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->name; ?></a></div>
        		</div>
        	</div>
        </div>
        <?php
        endwhile;
        endif;
        wp_reset_postdata();
        ?>

        <!-- pagination sp -->
        <div class="box-page-sp" id="pagination-toppage-sp">
        <?php sp_custom_pagination($the_query->max_num_pages,"",$paged); ?>
        </div>
        <!-- end pagination sp -->
        
        <?php //} ?>
        <!-- // SP -->
        <?php    

    }
    
}
