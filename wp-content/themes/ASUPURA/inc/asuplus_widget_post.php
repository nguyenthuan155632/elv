<?php 

class ASUPlus_Widget_Post extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_post', 
          'ASUPURA Post',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'profile' => 'プロフィールを見る',
            'button' => 'このライターに質問する',
            'name1' => 'ニックネーム',
            'name2' => '（例）松井秀喜',
            'email1' => 'メールアドレス',
            'email2' => '（例）matsui@athlete.com',
            'comment1' => '質問内容',
            'comment2' => '（例）日体大にて野球をしております。どうしたら、もっと球速が出るのか教えて下さい。',
            'policy1' => '個人情報取扱い同意書',
            'policy2' => 'に同意する',
            'send' => '送信する',
            'favor' => 'お気に入りに登録する',
            'favor_del' => 'お気に入りからはずす',
            'remind' => 'ログインすれば、どの端末からもお気に入り記事をご覧になれます！',
            'share' => 'この記事をシェアする',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $profile = esc_attr( $instance['profile'] );
        $button = esc_attr( $instance['button'] );
        $name1 = esc_attr( $instance['name1'] );
        $name2 = esc_attr( $instance['name2'] );
        $email1 = esc_attr( $instance['email1'] );
        $email2 = esc_attr( $instance['email2'] );
        $comment1 = esc_attr( $instance['comment1'] );
        $comment2 = esc_attr( $instance['comment2'] );
        $policy1 = esc_attr( $instance['policy1'] );
        $policy2 = esc_attr( $instance['policy2'] );
        $send = esc_attr( $instance['send'] );
        $favor = esc_attr( $instance['favor'] );
        $favor_del = esc_attr( $instance['favor_del'] );
        $remind = esc_attr( $instance['remind'] );
        $share = esc_attr( $instance['share'] );
        
        echo '<br/><br/><input class="widefat" type="text" name="'.$this->get_field_name("profile").'" value="'.$profile.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("button").'" value="'.$button.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("name1").'" value="'.$name1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("name2").'" value="'.$name2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("email1").'" value="'.$email1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("email2").'" value="'.$email2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("comment1").'" value="'.$comment1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("comment2").'" value="'.$comment2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("policy1").'" value="'.$policy1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("policy2").'" value="'.$policy2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("send").'" value="'.$send.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("favor").'" value="'.$favor.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("favor_del").'" value="'.$favor_del.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("remind").'" value="'.$remind.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("share").'" value="'.$share.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['profile'] = strip_tags($new_instance['profile']);
        $instance['button'] = strip_tags($new_instance['button']);
        $instance['name1'] = strip_tags($new_instance['name1']);
        $instance['name2'] = strip_tags($new_instance['name2']);
        $instance['email1'] = strip_tags($new_instance['email1']);
        $instance['email2'] = strip_tags($new_instance['email2']);
        $instance['comment1'] = strip_tags($new_instance['comment1']);
        $instance['comment2'] = strip_tags($new_instance['comment2']);
        $instance['policy1'] = strip_tags($new_instance['policy1']);
        $instance['policy2'] = strip_tags($new_instance['policy2']);
        $instance['send'] = strip_tags($new_instance['send']);
        $instance['favor'] = strip_tags($new_instance['favor']);
        $instance['favor_del'] = strip_tags($new_instance['favor_del']);
        $instance['remind'] = strip_tags($new_instance['remind']);
        $instance['share'] = strip_tags($new_instance['share']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $profile = $instance['profile'];
        $button = $instance['button'];
        $name1 = $instance['name1'];
        $name2 = $instance['name2'];
        $email1 = $instance['email1'];
        $email2 = $instance['email2'];
        $comment1 = $instance['comment1'];
        $comment2 = $instance['comment2'];
        $policy1 = $instance['policy1'];
        $policy2 = $instance['policy2'];
        $send = $instance['send'];
        $favor = $instance['favor'];
        $favor_del = $instance['favor_del'];
        $remind = $instance['remind'];
        $share = $instance['share'];
        
        ?>

        <?php if( wpmd_is_notdevice() ) { ?>
        <?php
            if(is_user_logged_in()) {
                echo '<input type="hidden" id="profileTop" value="85">';
            } else {
                echo '<input type="hidden" id="profileTop" value="53">';
            }
            ?>
        <div class="article-post-write-pc">
        <?php

        global $wp_query;
        $curpost = $wp_query->get_queried_object();
        $author_id = $curpost->post_author;
        // echo '<pre>';
        // print_r($curpost);
        // echo '</pre>';
        ?>
        <?php
        $urlAuth = the_author_image_url($author->ID);
        
        if (strpos($urlAuth, 'png') !== false) {
            $urlAuth = str_replace('.png', '_sp.png', $urlAuth);
        }
        elseif(strpos($urlAuth, 'jpg') !== false) {
            $urlAuth = str_replace('.jpg', '_sp.jpg', $urlAuth);
        }
        ?>
<!--            <div class="entry_author_image">
                <img alt="" src="<?php ?>">
           </div> -->
        <div class="article-post-box-wall">
            <div class="pc-table-inline">
                <div class="article-post-avatar">
                <?php echo get_simple_local_avatar($author_id); ?>
                </div>
                <div class="article-post-avater-content">
                    <div class="article-post-avater-title">
                    <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
                    </div>
                    <div class="article-post-avater-des">
                    <?php echo get_the_author_meta('sem_aboutme_page', $author_id); ?>
                    </div>
                    <div class="class-post-avatar-link">
                        <a href="" title="IMG"><?php echo $profile; ?></a>
                    </div>
                    
                </div>
            </div>
            <div class="article-post-description">
            <?php //echo get_the_author_meta('description', $author_id); ?>
            </div>
        </div>

        <div id="pc-link-write-detail">
            <div class="tab-menu-col-text" id="sp-wri-btn-form"><?php echo $button; ?></div>
            <span id="link-write-detail-img"><img src="<?php bloginfo('template_directory'); ?>/images/icon_form_sp_arrow_off.png" alt="Images"></span>
        </div>

        <!-- form -->
        <div class="pc-article-form-writer">
            <form action="" name="myForm" method="POST" role="form" onsubmit="return checkCheckBoxes(this);">

                <div class="form-group">
                    <div class=""><?php echo $name1; ?></div>
                    <input type="text" class="form-control" id="vv-name" name="vv-name" placeholder="<?php echo $name2; ?>">
                </div>

                <div class="form-group">
                    <div class=""><?php echo $email1; ?></div>
                    <input type="text" class="form-control" id="vv-email" name="vv-email" placeholder="<?php echo $email2; ?>">
                </div>

                <div class="form-group">
                    <div class=""><?php echo $comment1; ?></div>
                    <textarea name="vv-comment" id="vv-comment" style="max-width: 190px;" class="form-control" rows="3" placeholder="<?php echo $comment2; ?>"></textarea>
                </div>

                <div class="form-group format-checkbox-form" id="form-checkbox">
                    <label class="myCheckbox">
                        <input type="checkbox" name="check_detail" id="check_detail" value="ok" class="form-control">
                        <span for="check_detail"></span>
                        <a href="<?php echo site_url();?>/privacy-policy"><?php echo $policy1; ?></a><?php echo $policy2; ?>
                    </label>
                    
                </div>
            
                <button type="submit" name="comment-submit" id="comment-submit" class="btn btn-primary" >&nbsp;&nbsp;&nbsp;<?php echo $send; ?></button>
            </form>
        </div>

        <!-- end form -->
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['comment-submit'])) {
                $array = array(
                    '_vv_name' => $_POST['vv-name'],
                    '_vv_email' => $_POST['vv-email'],
                    '_vv_comment' => $_POST['vv-comment']
                    );
                $json = json_encode($array, JSON_UNESCAPED_UNICODE);
                add_user_meta($author_id, '_vv_question', $json);

                $to = adminEmail();
                $subject = 'Comment from '.site_url().' - '.get_the_author_meta('display_name', $author_id);
                $message = $_POST['vv-comment'];
                $headers = 'From: '.$_POST['vv-name'].' <'.$_POST['vv-email'].'>' . "\r\n";

                wp_mail($to, $subject, $message, $headers);

                $headers_customer = 'From: ASUPURA Administrator <'.adminEmail().'>' . "\r\n";
                wp_mail($_POST['vv-email'], 'お問い合わせいただき、ありがとうございます。', 'お問い合わせいただき、ありがとうございました。別途、担当からご連絡申し上げます。', $headers_customer);

                echo '<div class="success-inform">送信完了しました。</div>';
            }
        }

        ?>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['favor_submit'])) { 
                if(isset($_SESSION['api_token'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 1,
                        'key' => $curpost->ID,
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }
            elseif(isset($_POST['favor_submit_del'])) {
                if(isset($_SESSION['api_token'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 2,
                        'key' => $curpost->ID,
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }
        } 
        ?>
        <div class="pc-article-writer-bot">
            <form action="" method="post">
            <?php

            $isFavorited = false;
            if(isset($_SESSION['api_token'])) {
                $arr = array(
                    'category' => 1,
                    );
                $listFavor = API::getProcess('getwishlist.json', $arr);
                for($i = 0; $i < count($listFavor['data']); $i++) {
                    if($curpost->ID == $listFavor['data'][$i]['key']) {
                        $isFavorited = true;
                        break;
                    }
                    else {
                        $isFavorited = false;
                    }
                }
                if($isFavorited) {
                    ?><input type="submit" id="delete-favorite" name="favor_submit_del" value="<?php echo $favor_del; ?>"><?php
                }
                else {
                    ?><input type="submit" id="add-favorite" name="favor_submit" value="★&nbsp;&nbsp;<?php echo $favor; ?>"><?php
                }
            }
            else {
                ?><input type="submit" id="add-favorite" name="favor_submit" value="★&nbsp;&nbsp;<?php echo $favor; ?>"><?php
            }

            ?>
            </form>
            
            <div class="pc-article-bot-note">
            <?php echo $remind; ?>
            </div>
        </div> 
        <div class="pc-article-writer-bot2">
            <div class="pc-article-bot-title">
            <?php echo $share; ?>
            </div>
            <?php 
            $url = get_the_permalink();

            // リクエストURL
            $request_url = "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ" ;
            $request_url_bm = 'http://api.b.st-hatena.com/entry.count?url=' . rawurlencode( $url ) ;
            $request_url_fb = 'http://graph.facebook.com/?id=' . rawurlencode( $url ) ;

            // データをJSON形式で取得する (cURLを使用)
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
            $json = substr( $res1, $res2['header_size'] ) ;                 // 取得したデータ(JSONなど)
            $header = substr( $res1, 0, $res2['header_size'] ) ;            // レスポンスヘッダー (検証に利用したい場合にどうぞ)

            // JSONデータからカウント数を取得
            $array = json_decode( $json, true ) ;

            // カウント(データが存在しない場合は0扱い)
            if( isset($array[0]['result']['metadata']['globalCounts']['count']) ) {
                $count = (int)$array[0]['result']['metadata']['globalCounts']['count'] ;

            } else {
                $count = 0 ;

            }

            // // URLを表示用に整形 (検証用)
            // foreach( array( 'url', 'request_url' ) as $variable_name ) {
            //     ${ $variable_name } = htmlspecialchars( ${ $variable_name } , ENT_QUOTES , 'UTF-8' ) ;
            // }

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
            // echo '<pre>';
            // print_r(json_decode($count_bm)[0]->result->metadata->globalCounts->count);
            // echo '</pre>';

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
            ?>
            <div class="latest-social">
                <div class="pc-latest-social-top">
                    <div class="pc-social-list"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" class="facebook-button" onclick="window.open(this.href,'FBwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;" title="Facebookでシェア"><img src="<?php bloginfo('template_directory'); ?>/images/pc-icon-face.png" alt=""></a><div class="social-num-artitle facebook-number"><?php echo $count_fb; ?></div></div>
                    <div class="pc-social-list"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="window.open(this.href, 'Gwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="googleplus-button"><img src="<?php bloginfo('template_directory'); ?>/images/pc-icon-google.png" alt=""></a><div class="social-num-artitle google-number"><?php echo $count; ?></div></div>
                    <div class="pc-social-list"><a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" target="_blank" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="simple" title="このエントリーをはてなブックマークに追加"><img src="<?php bloginfo('template_directory'); ?>/images/pc-icon-b_line.png" alt=""></a><div class="social-num-artitle bookmark-number"><?php echo $count_bm; ?></div></div>
                </div>
                <div class="pc-latest-social-bot social-bot-format">
                    <div class="pc-social-list"><a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php the_permalink(); ?>" class="twitter-button" onclick="window.open(this.href, 'TWwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?php bloginfo('template_directory'); ?>/images/pc-icon-twice.png" alt=""></a></div>
                    <div class="pc-social-list"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/pc-icon-line.png" alt=""></a></div>
                </div>
            </div>
        </div> 
        </div>
        <?php } ?>
        <input type="hidden" id="inputUrl_name_web" value="<?php echo SITE_URL;?>">
        <?php    
            
    }
    
}
