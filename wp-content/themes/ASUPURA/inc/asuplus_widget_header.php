<?php 

class ASUPlus_Widget_Header extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_header',  
          'ASUPURA Header',
          array(
              'description' => 'Top Page Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'logo_img' => $host_address.'/wp-content/themes/ASUPURA/images/banner02.jpg',
            'sp_logo_img' => $host_address.'/wp-content/themes/ASUPURA/images/images_header.gif',
            'intro' => 'Extra-Low Voltage',
            'login' => 'Login',
            'favorite' => 'Favorites',
            'sitemap' => 'Sitemap',
            'mypage' => 'My page',
            'logout' => 'Logout',
            'login_a' => $host_address.'/login',
            'favorite_a' => $host_address.'/favorites',
            'sitemap_a' => $host_address.'/sitemap',
            'mypage_a' => $host_address.'/mypage',
            'logout_a' => $host_address.'/logout',
            'cate1' => 'Báo động - Báo cháy',
            'cate2' => 'Camera quan sát',
            'cate3' => 'Cơ điện',
            'cate4' => 'Mạng - Tổng đài',
            'cate5' => 'Thiết bị tin học',
            'toplink' => 'Homepage',
            'favorite_sp_a' => $host_address.'/favorites',
            'profile_sp_a' => $host_address.'/mypage',
            'event_a' => $host_address.'/events',
            'link_sp_01' => 'Login',
            'link_sp_02' => 'Latest news',
            'link_sp_03' => 'Pickup',
            // 'link_sp_04' => '注目記事ランキング',
            'link_sp_01_a' => $host_address.'/login',
            'link_sp_02_a' => $host_address.'#main-content',
            'link_sp_03_a' => $host_address.'#pickup-post',
            // 'link_sp_04_a' => '#',
            'link_sp_11' => 'Báo động - Báo cháy',
            'link_sp_12' => 'Camera quan sát',
            'link_sp_13' => 'Cơ điện',
            'link_sp_14' => 'Mạng - Tổng đài',
            'link_sp_15' => 'Thiết bị tin học',
            //'link_sp_21' => 'サービス',
            'link_sp_22' => 'Administrators',
            'link_sp_23' => 'About us',
            'link_sp_24' => 'Contact',
            'link_sp_25' => 'Privacy policy',
            //'link_sp_21_a' => '#',
            'link_sp_22_a' => $host_address.'/author',
            'link_sp_23_a' => 'https://www.athlete-p.co.jp/about_us/',
            'link_sp_24_a' => $host_address.'/contact',
            'link_sp_25_a' => $host_address.'privacy-policy',
            
        );
        $instance = wp_parse_args((array) $instance, $default);
        $logo_img = esc_attr( $instance['logo_img'] );
        $sp_logo_img = esc_attr( $instance['sp_logo_img'] );
        $intro = esc_attr( $instance['intro'] );
        $login = esc_attr( $instance['login'] );
        $logout = esc_attr( $instance['logout'] );
        $favorite = esc_attr( $instance['favorite'] );
        $sitemap = esc_attr( $instance['sitemap'] );
        $mypage = esc_attr( $instance['mypage'] );
        $login_a = esc_attr( $instance['login_a'] );
        $logout_a = esc_attr( $instance['logout_a'] );
        $favorite_a = esc_attr( $instance['favorite_a'] );
        $sitemap_a = esc_attr( $instance['sitemap_a'] );
        $mypage_a = esc_attr( $instance['mypage_a'] );
        $cate1 = esc_attr( $instance['cate1'] );
        $cate2 = esc_attr( $instance['cate2'] );
        $cate3 = esc_attr( $instance['cate3'] );
        $cate4 = esc_attr( $instance['cate4'] );
        $cate5 = esc_attr( $instance['cate5'] );
        $cate6 = esc_attr( $instance['cate6'] );
        $cate7 = esc_attr( $instance['cate7'] );
        $toplink = esc_attr( $instance['toplink'] );
        
        $favorite_sp_a = esc_attr( $instance['favorite_sp_a'] );
        $profile_sp_a = esc_attr( $instance['profile_sp_a'] );
        $event_a = esc_attr( $instance['event_a'] );
        
        $link_sp_01 = esc_attr( $instance['link_sp_01'] );
        $link_sp_02 = esc_attr( $instance['link_sp_02'] );
        $link_sp_03 = esc_attr( $instance['link_sp_03'] );
        // $link_sp_04 = esc_attr( $instance['link_sp_04'] );
        $link_sp_01_a = esc_attr( $instance['link_sp_01_a'] );
        $link_sp_02_a = esc_attr( $instance['link_sp_02_a'] );
        $link_sp_03_a = esc_attr( $instance['link_sp_03_a'] );
        // $link_sp_04_a = esc_attr( $instance['link_sp_04_a'] );
        
        $link_sp_11 = esc_attr( $instance['link_sp_11'] );
        $link_sp_12 = esc_attr( $instance['link_sp_12'] );
        $link_sp_13 = esc_attr( $instance['link_sp_13'] );
        $link_sp_14 = esc_attr( $instance['link_sp_14'] );
        $link_sp_15 = esc_attr( $instance['link_sp_15'] );
        $link_sp_16 = esc_attr( $instance['link_sp_16'] );
        $link_sp_17 = esc_attr( $instance['link_sp_17'] );
        
        //$link_sp_21 = esc_attr( $instance['link_sp_21'] );
        $link_sp_22 = esc_attr( $instance['link_sp_22'] );
        $link_sp_23 = esc_attr( $instance['link_sp_23'] );
        $link_sp_24 = esc_attr( $instance['link_sp_24'] );
        $link_sp_25 = esc_attr( $instance['link_sp_25'] );
        //$link_sp_21_a = esc_attr( $instance['link_sp_21_a'] );
        $link_sp_22_a = esc_attr( $instance['link_sp_22_a'] );
        $link_sp_23_a = esc_attr( $instance['link_sp_23_a'] );
        $link_sp_24_a = esc_attr( $instance['link_sp_24_a'] );
        $link_sp_25_a = esc_attr( $instance['link_sp_25_a'] );
        
        
        
        echo '<br/><br/>Logo : <input class="widefat" type="text" name="'.$this->get_field_name("logo_img").'" value="'.$logo_img.'" /><br/><br/>';
        echo 'PC<input class="widefat" type="text" name="'.$this->get_field_name("intro").'" value="'.$intro.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("login").'" value="'.$login.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("logout").'" value="'.$logout.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("favorite").'" value="'.$favorite.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("sitemap").'" value="'.$sitemap.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("mypage").'" value="'.$mypage.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("login_a").'" value="'.$login_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("logout_a").'" value="'.$logout_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("favorite_a").'" value="'.$favorite_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("sitemap_a").'" value="'.$sitemap_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("mypage_a").'" value="'.$mypage_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate1").'" value="'.$cate1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate2").'" value="'.$cate2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate3").'" value="'.$cate3.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate4").'" value="'.$cate4.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate5").'" value="'.$cate5.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate6").'" value="'.$cate6.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("cate7").'" value="'.$cate7.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("toplink").'" value="'.$toplink.'" /><br/><br/>';
        
        echo '<hr />Mobile:<br /><br />';
        echo 'Logo Mobile : <br/><br/><input class="widefat" type="text" name="'.$this->get_field_name("sp_logo_img").'" value="'.$sp_logo_img.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("favorite_sp_a").'" value="'.$favorite_sp_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("profile_sp_a").'" value="'.$profile_sp_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("event_a").'" value="'.$event_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_01").'" value="'.$link_sp_01.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_02").'" value="'.$link_sp_02.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_03").'" value="'.$link_sp_03.'" /><br/><br/>';
        // echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_04").'" value="'.$link_sp_04.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_01_a").'" value="'.$link_sp_01_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_02_a").'" value="'.$link_sp_02_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_03_a").'" value="'.$link_sp_03_a.'" /><br/><br/>';
        // echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_04_a").'" value="'.$link_sp_04_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_11").'" value="'.$link_sp_11.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_12").'" value="'.$link_sp_12.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_13").'" value="'.$link_sp_13.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_14").'" value="'.$link_sp_14.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_15").'" value="'.$link_sp_15.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_16").'" value="'.$link_sp_16.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_17").'" value="'.$link_sp_17.'" /><br/><br/>';
        //echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_21").'" value="'.$link_sp_21.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_22").'" value="'.$link_sp_22.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_23").'" value="'.$link_sp_23.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_24").'" value="'.$link_sp_24.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_25").'" value="'.$link_sp_25.'" /><br/><br/>';
        //echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_21_a").'" value="'.$link_sp_21_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_22_a").'" value="'.$link_sp_22_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_23_a").'" value="'.$link_sp_23_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_24_a").'" value="'.$link_sp_24_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("link_sp_25_a").'" value="'.$link_sp_25_a.'" /><br/><br/>';
        
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['logo_img'] = strip_tags($new_instance['logo_img']);
        $instance['sp_logo_img'] = strip_tags($new_instance['sp_logo_img']);
        $instance['intro'] = strip_tags($new_instance['intro']);
        $instance['login'] = strip_tags($new_instance['login']);
        $instance['logout'] = strip_tags($new_instance['logout']);
        $instance['favorite'] = strip_tags($new_instance['favorite']);
        $instance['sitemap'] = strip_tags($new_instance['sitemap']);
        $instance['mypage'] = strip_tags($new_instance['mypage']);
        $instance['login_a'] = strip_tags($new_instance['login_a']);
        $instance['logout_a'] = strip_tags($new_instance['logout_a']);
        $instance['favorite_a'] = strip_tags($new_instance['favorite_a']);
        $instance['sitemap_a'] = strip_tags($new_instance['sitemap_a']);
        $instance['mypage_a'] = strip_tags($new_instance['mypage_a']);
        $instance['cate1'] = strip_tags($new_instance['cate1']);
        $instance['cate2'] = strip_tags($new_instance['cate2']);
        $instance['cate3'] = strip_tags($new_instance['cate3']);
        $instance['cate4'] = strip_tags($new_instance['cate4']);
        $instance['cate5'] = strip_tags($new_instance['cate5']);
        $instance['cate6'] = strip_tags($new_instance['cate6']);
        $instance['cate7'] = strip_tags($new_instance['cate7']);
        $instance['toplink'] = strip_tags($new_instance['toplink']);


        $instance['favorite_sp_a'] = strip_tags($new_instance['favorite_sp_a']);
        $instance['profile_sp_a'] = strip_tags($new_instance['profile_sp_a']);
        $instance['event_a'] = strip_tags($new_instance['event_a']);
        $instance['link_sp_01'] = strip_tags($new_instance['link_sp_01']);
        $instance['link_sp_02'] = strip_tags($new_instance['link_sp_02']);
        $instance['link_sp_03'] = strip_tags($new_instance['link_sp_03']);
        // $instance['link_sp_04'] = strip_tags($new_instance['link_sp_04']);
        $instance['link_sp_01_a'] = strip_tags($new_instance['link_sp_01_a']);
        $instance['link_sp_02_a'] = strip_tags($new_instance['link_sp_02_a']);
        $instance['link_sp_03_a'] = strip_tags($new_instance['link_sp_03_a']);
        // $instance['link_sp_04_a'] = strip_tags($new_instance['link_sp_04_a']);
        $instance['link_sp_11'] = strip_tags($new_instance['link_sp_11']);
        $instance['link_sp_12'] = strip_tags($new_instance['link_sp_12']);
        $instance['link_sp_13'] = strip_tags($new_instance['link_sp_13']);
        $instance['link_sp_14'] = strip_tags($new_instance['link_sp_14']);
        $instance['link_sp_15'] = strip_tags($new_instance['link_sp_15']);
        $instance['link_sp_16'] = strip_tags($new_instance['link_sp_16']);
        $instance['link_sp_17'] = strip_tags($new_instance['link_sp_17']);
        //$instance['link_sp_21'] = strip_tags($new_instance['link_sp_21']);
        $instance['link_sp_22'] = strip_tags($new_instance['link_sp_22']);
        $instance['link_sp_23'] = strip_tags($new_instance['link_sp_23']);
        $instance['link_sp_24'] = strip_tags($new_instance['link_sp_24']);
        $instance['link_sp_25'] = strip_tags($new_instance['link_sp_25']);
        //$instance['link_sp_21_a'] = strip_tags($new_instance['link_sp_21_a']);
        $instance['link_sp_22_a'] = strip_tags($new_instance['link_sp_22_a']);
        $instance['link_sp_23_a'] = strip_tags($new_instance['link_sp_23_a']);
        $instance['link_sp_24_a'] = strip_tags($new_instance['link_sp_24_a']);
        $instance['link_sp_25_a'] = strip_tags($new_instance['link_sp_25_a']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $logo_img = $instance['logo_img'];
        $sp_logo_img = $instance['sp_logo_img'];
        $intro = $instance['intro'];
        $login = $instance['login'];
        $logout = $instance['logout'];
        $favorite = $instance['favorite'];
        $sitemap = $instance['sitemap'];
        $mypage = $instance['mypage'];
        $login_a = $instance['login_a'];
        $logout_a = $instance['logout_a'];
        $favorite_a = $instance['favorite_a'];
        $sitemap_a = $instance['sitemap_a'];
        $mypage_a = $instance['mypage_a'];
        $cate1 = $instance['cate1'];
        $cate2 = $instance['cate2'];
        $cate3 = $instance['cate3'];
        $cate4 = $instance['cate4'];
        $cate5 = $instance['cate5'];
        $cate6 = $instance['cate6'];
        $cate7 = $instance['cate7'];
        $toplink = $instance['toplink'];


        $favorite_sp_a = $instance['favorite_sp_a'];
        $profile_sp_a = $instance['profile_sp_a'];
        $event_a = $instance['event_a'];
        $link_sp_01 = $instance['link_sp_01'];
        $link_sp_02 = $instance['link_sp_02'];
        $link_sp_03 = $instance['link_sp_03'];
        // $link_sp_04 = $instance['link_sp_04'];
        $link_sp_01_a = $instance['link_sp_01_a'];
        $link_sp_02_a = $instance['link_sp_02_a'];
        $link_sp_03_a = $instance['link_sp_03_a'];
        // $link_sp_04_a = $instance['link_sp_04_a'];
        $link_sp_11 = $instance['link_sp_11'];
        $link_sp_12 = $instance['link_sp_12'];
        $link_sp_13 = $instance['link_sp_13'];
        $link_sp_14 = $instance['link_sp_14'];
        $link_sp_15 = $instance['link_sp_15'];
        $link_sp_16 = $instance['link_sp_16'];
        $link_sp_17 = $instance['link_sp_17'];
        //$link_sp_21 = $instance['link_sp_21'];
        $link_sp_22 = $instance['link_sp_22'];
        $link_sp_23 = $instance['link_sp_23'];
        $link_sp_24 = $instance['link_sp_24'];
        $link_sp_25 = $instance['link_sp_25'];
        //$link_sp_21_a = $instance['link_sp_21_a'];
        $link_sp_22_a = $instance['link_sp_22_a'];
        $link_sp_23_a = $instance['link_sp_23_a'];
        $link_sp_24_a = $instance['link_sp_24_a'];
        $link_sp_25_a = $instance['link_sp_25_a'];

        $host_address = site_url();
       

        $message_login = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['login-submit'])) {
                // API::logout();
                $id = $_POST['login-username'];
                $pw = $_POST['login-password'];
                $userLogin = API::login($id, $pw);
                if($userLogin) {
                    //$_SESSION['api_token'] = $userLogin;
                }
                else {
                    $_SESSION['message_login'] = 'ログインIDかパスワードに誤りがあります';
                }
            }   
        }

        if(is_page('logout')) {

            ?>
            <script>
            jQuery.ajax({
                url : "https://asupura.com/api/logout",
                type : "POST",
                dateType: "json",
                data: "",
                success : function (result){
                    
                },
                error: function(a,b,c){
                    var a=1;
                }
            });
            // jQuery(document).ready(function() {
            //     window.location.href = <?php echo json_encode(home_url()); ?>;
            // });
            setTimeout(function(){
                window.location.href = <?php echo json_encode(home_url()); ?>;
            }, 500);
            </script>
            <?php
        }
        else {
            $headers = getallheaders();
            foreach ($headers as $key => $value) {
                if(strpos($value, 'token') && strpos($value, 'laravel_session')) {
                    $cookie = $headers['Cookie'];
                    $cookie_arr = explode(';', $cookie);
                    for($i = 0; $i < count($cookie_arr); $i++) {
                        $arrCookie[trim(explode('=', $cookie_arr[$i])[0])] = trim(explode('=', $cookie_arr[$i])[1]);
                    }
                    //echo '<pre>';
                    
                    //echo '</pre>';

                    $_SESSION[API::API_COOKIE]['token'] = $arrCookie['token'];
                    $_SESSION[API::API_COOKIE]['laravel_session'] = $arrCookie['laravel_session'];
                   
                    
                }
            }
        }
        // var_dump($_SESSION);
        $userJson = API::getProcess('user.json');
         //echo '<pre>';
         //print_r($userJson);
         //echo '</pre>';
        if($userJson['user_id'] != '') {
            $_SESSION['api_token'] = $userJson;  
        }

        if(is_home() && !isset($_SESSION['api_token'])) {
            unset($_SESSION['historyLink']);
        }
        if(is_home() && isset($_SESSION['historyLink'])) {
            
            // $linkRed = '';
            // if($_SESSION['historyLink'] == "events") {
            //     $linkRed = "events";
            //     unset($_SESSION['historyLink']);
            // }
            // var_dump($_SESSION['historyLink']);
            ?>
            <script>
            // var linkRedirect = <?php echo 'https://www.google.com.vn'; ?>;
            var linkRedirect = '<?php echo site_url()."/".$_SESSION["historyLink"]; ?>';
            // alert(linkRedirect);
                window.location.href = linkRedirect;
            </script>
            <?php
            unset($_SESSION['historyLink']);
        }
        
        ?>

        <?php
        global $wp_query;
        $curpost = $wp_query->get_queried_object();
        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['favor_submit_sp'])) { 
                if(isset($_SESSION['api_token'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 1,
                        'key' => $curpost->ID,
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }
            elseif(isset($_POST['favor_submit_del_sp'])) {

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

        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['favor_post'])) { 
                if(isset($_SESSION['api_token'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 1,
                        'key' => $curpost->ID,
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }
            elseif(isset($_POST['favor_post_del'])) {

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

        if($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if(isset($_POST['favor_post_sp'])) { 
                if(isset($_SESSION['api_token'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 1,
                        'key' => $curpost->ID,
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }
            elseif(isset($_POST['favor_post_del_sp'])) {

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


        <?php //if( wpmd_is_device() ) { ?>

        <!-- LOGIN SP -->
            <div class="box-page-sp">
            <div class="sp-box-login">
            <div id="asuplus-sidebar">
            <div class="login-sidebar">
                <div class="login-img-clone"><img src="<?php bloginfo('template_directory'); ?>/images/clone_login_box.png" alt="Image" class="box-login-tab-clone"></div>
                <div class="login-title">       
                    <span>LOG IN</span>&nbsp;&nbsp;&nbsp;会員ログイン
                </div>
                <div class="login-content">
                    <form method="POST" action="https://asupura.com/api/login" role="form">
                    <input type="text" required class="login-username login-input" name="user_id" placeholder="ログインID" />
                    <input type="password" required class="login-password login-input" name="password" placeholder="パスワード" /><br/>
                    <a id="login-forgot-pwd" href="#">パスワードをお忘れの方はこちら</a>

                    <div class="button-login-new">
                        <input id="button-login-new-login" type="submit" name="login-submit" value="ログイン">
                    </div>   
                    </form>
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
                    <div class="table-inline btn-sns-author">
                        
                    </div>
                    <hr/>
                    <a target="_blank" id="login-registry" href="https://asupura.com/members/users/set_pass">ログインIDをお持ちでない方はこちら</a>
                    <div id="button-registry">
                        <a href="https://asupura.com/members/users/set_pass" target="_blank"><span class="font-white-color">新規会員登録</span></a>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        <?php //} ?>

        
        <!-- <form action="" method="post">
            <button type="submit" name="logout-submit">LOGOUT</button>
        </form> -->
    
        <div id="introduce">
            <div class="header-intro-title"><?php echo $intro; ?></div>
        </div>
        <?php if( wpmd_is_notdevice() ) { ?>
        <div id="box-header-event">
            <div id="main-header">
            <div id="logo">
            <?php if(is_page(array('event-detail', 'events'))) { ?>
                <a href="<?php echo $host_address; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo_tecon.png"/></a>
            <?php } else { ?>
                <a href="<?php echo $host_address; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo_tecon.png"/></a>
            <?php } ?>
            </div>
            <div id="header-tab">

                <?php if(isset($_SESSION['api_token'])) { ?>
                <div class="header-login">
                    <span id="format-head-login-light">ようこそ<?php echo $_SESSION['api_token']['user_name']; ?>さん</span>
                </div>
                <div class="header-guide">
                    <a href="<?php echo $mypage_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon-infor-write.png" /><span id="format-head-login"><?php echo $mypage; ?></span></a>
                </div>
                <div class="header-logout">
                    <a id="logout-ajax" href="<?php echo $logout_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logout.png" /><span id="format-head-login"><?php echo $logout; ?></span></a>
                </div>
                <div class="header-like">
                    <a href="<?php echo $favorite_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/star.png" /><span id="format-head-login"><?php echo $favorite; ?></span></a>
                </div>
                <?php } else { ?>
                <div class="header-login">
                    <a href="<?php echo $login_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/login.png" /><span><?php echo $login; ?></span></a>
                </div>
                <div class="header-like">
                    <a href="<?php echo $favorite_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/star.png" /><span><?php echo $favorite; ?></span></a>
                </div>
                <div class="header-guide">
                    <a href="<?php echo $sitemap_a; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/guide.png" /><span><?php echo $sitemap; ?></span></a>
                </div>

                <?php } ?>
            </div>
        </div>
        </div>
        <?php } ?>
        <div id="main-nav">
            <!-- SP -->
            <div class="egmenu table-inline">
            <div class="icon-logo"><a href="<?php echo $host_address; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo_tecon.png" alt="Logo" width="150"></a></div>
            <a href="<?php echo $favorite_sp_a; ?>" class="tab-box-center" id="icon-star"><img src="<?php bloginfo('template_directory'); ?>/images/star.png" alt="Image"></a>
            <?php if(isset($_SESSION['api_token'])) { ?>
            <a href="<?php echo $mypage_a; ?>" class="tab-box-center" id="icon-logic"><img src="<?php bloginfo('template_directory'); ?>/images/icon-infor-write.png" alt="Image" id="img-infog-mypage"></a>
            <?php } else { ?>
            <a class="tab-box-center box-login-tab" id="icon-logic"><img src="<?php bloginfo('template_directory'); ?>/images/login.png" alt="Image"></a>
            <?php } ?>
            <button class="dl-trigger">Open Menu</button>
            </div>
            <!-- // SP -->
            <?php
            $marginTop = '0px';
            if(is_user_logged_in()) {
                $marginTop = '0px';
            }
            ?>
            <div id="nav-fixed" class="nav-fixed-default" style="top: <?php echo $marginTop; ?>">
            <ul>
                <li id="asu-nav-category1"><a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>"><span><?php echo $cate1; ?></span></a></li>
                <li id="asu-nav-category2"><a href="<?php echo get_category_link(get_category_by_slug( 'camera' )->cat_ID); ?>"><span><?php echo $cate2; ?></span></a></li>
                <li id="asu-nav-category3"><a href="<?php echo get_category_link(get_category_by_slug( 'co-dien' )->cat_ID); ?>"><span><?php echo $cate3; ?></span></a></li>
                <li id="asu-nav-category4"><a href="<?php echo get_category_link(get_category_by_slug( 'mang-tong-dai' )->cat_ID); ?>"><span><?php echo $cate4; ?></span></a></li>
                <li id="asu-nav-category5"><a href="<?php echo get_category_link(get_category_by_slug( 'tin-hoc' )->cat_ID); ?>"><span><?php echo $cate5; ?></span></a></li>
            </ul>
            </div>
        </div>
        <?php if( wpmd_is_notdevice() ) { ?>
        <?php 
        global $wp_query;
        if(is_home()) {
            ?>
            <div id="image_banner">
                <img src="<?php echo $logo_img;?>" />
            </div>
            <?php
        }
        elseif(is_category()) {
            $curcate = $wp_query->get_queried_object();
            ?>
            <div id="category-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a>　<span><?php echo $curcate->name; ?>の記事一覧</span></div>
            <?php
        }
        elseif(is_page('author')) {
            ?>
            <div id="writer-list-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a>　<span>ライター一覧</span></div>
            <?php
        }
        elseif(is_page('event-detail')) {
            global $wp_query;
            $curpage = $wp_query->get_queried_object();
            ?>
            <div id="event-detail-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a>　<a href="<?php echo site_url().'/events'; ?>">&nbsp;&nbsp;&nbsp;体育会限定イベント　＞</a> <span>&nbsp;&nbsp;<?php echo $curpage->post_title; ?></span></div>
            <?php
        }
        elseif(is_author()) {
            $curauth = $wp_query->get_queried_object();
            // echo '<pre>';
            // print_r($curauth->data->display_name);
            // echo '</pre>';
            ?>
            <div id="writer-detail-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a>　<span><?php echo $curauth->data->display_name; ?></span></div>
            <?php
        }
        elseif(is_single()) {
            global $wp_query;
            $curpost = $wp_query->get_queried_object();
            $category = get_the_category($curpost->ID);
            ?>
            <div id="article-post-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a> <a href="<?php echo site_url().'/category/'.$category[0]->slug; ?>">&nbsp;&nbsp;&nbsp;記事一覧　＞</a> <span>&nbsp;&nbsp;<?php echo $curpost->post_title; ?></span></div>
            <?php
        }
        elseif(is_page()) {
            global $wp_query;
            $curpage = $wp_query->get_queried_object();
            ?>
            <div id="other-page-path"><a href="<?php echo site_url(); ?>"><?php echo $toplink; ?>　＞</a>　<span><?php echo $curpage->post_title; ?></span></div>
            <?php
        }
        ?>
        
        <?php //if(isset($_SESSION['api_token'])) { ?>
            <?php if(!is_page( array('events' , 'event-detail'))) { ?>
            <div id="event-image">
                <a href="<?php echo site_url();?>/events" title=""><img src="<?php bloginfo('template_directory'); ?>/images/event-image.png" alt="Event"></a>
            </div>
            <?php } ?>
        
        <?php } ?>
 
        <!-- SP -->
        <?php //if( wpmd_is_device() ) { ?>
        <!-- BOX MENU  -->
        <div class="box-page-sp">
        <div class="box-sp-menu" id="pop-box-menu">
            <div class="sp-menu-title">
                <span>MENU</span>
                <a href="#" id="pop-menu-close"><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-close.png" alt="Images" width="20"></a>
            </div>
            <div class="table-sp-menu">

                <!-- COL -->
                <?php if(!isset($_SESSION['api_token'])) { ?>
                    <a href="<?php echo $link_sp_01_a; ?>" title="" id="format-link">
                    <div class="tab-menu-col" id="tab-menu-img-pop">
                        <div class="tab-menu-col-text"><?php echo $link_sp_01; ?></div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-plus.png" alt="Images">
                    </div>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo $logout_a; ?>" title="" id="format-link">
                    <div class="tab-menu-col" id="tab-menu-img-pop">
                        <div class="tab-menu-col-text"><?php echo $logout; ?></div>
                        <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-plus.png" alt="Images">
                    </div>
                    </a>
                <?php } ?>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo $link_sp_02_a; ?>" title="" id="format-link">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_02; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo $link_sp_03_a; ?>" title="" id="format-link">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_03; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images">
                </div>
                </a>
                <!-- // COL -->


                <!-- MENU MIDDLE -->
                <div class="tab-menu-col sp-menu-sub-middle">
                    記事ジャンル
                </div>

                <!-- mid -->
                <div class="table-inline sp-menu-middle">
                    <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>" class="table-col-50 sp-tab-menu-middle sp-menu-border-left">
                        <?php echo $link_sp_11; ?>
                    </a>
                    <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>" class="table-col-50 sp-tab-menu-middle">
                        <?php echo $link_sp_15; ?>
                    </a>
                </div>
                <!-- mid -->

                <!-- mid -->
                <div class="table-inline sp-menu-middle">
                    <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>" class="table-col-50 sp-tab-menu-middle sp-menu-border-left">
                        <?php echo $link_sp_12; ?>
                    </a>
                    <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>" class="table-col-50 sp-tab-menu-middle">
                        <?php echo $link_sp_16; ?>
                    </a>
                </div>
                <!-- mid -->

                <!-- mid -->
                <div class="table-inline sp-menu-middle">
                    <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>" class="table-col-50 sp-tab-menu-middle sp-menu-border-left">
                        <?php echo $link_sp_13; ?>
                    </a>
                    <div class="table-col-50 sp-tab-menu-middle">
                    
                    </div>
                </div>
                <!-- mid -->
                <!-- MENU BOTTOM -->

                <!-- COL -->
                <a href="<?php echo $link_sp_22_a; ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_22; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo $link_sp_23_a; ?>" title="" id="format-link">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_23; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images">
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo $link_sp_24_a; ?>" title="" id="format-link">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_24; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo $link_sp_25_a; ?>" title="" id="format-link">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_25; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->
                <!-- END MENU BOTTOM -->
            </div>
        </div>
        </div>

        <!-- END MENU -->

        <div class="box-btn-header table-column">
            <div class="table-col-100 table-inline">
                <div class="table-col-20 box-head-arrow" id="trigger-category">
                    <div class="icon-sp-arrow"><img src="<?php bloginfo('template_directory'); ?>/images/icon_sp_arrow.png" alt="Images" width="18"></div>
                    <div class="text-sp-arrow">ジャンル</div>
                </div>
                <div class="table-col-40 box-head-note">
                    <img src="<?php bloginfo('template_directory'); ?>/images/icon_sp_note.png" alt="Images" width="14"><span>マガジン</span>
                </div> 
                <?php if(isset($_SESSION['api_token'])) { ?>
                <div class="table-col-40 box-head-note login-box-head-key" id="sp-box-menu-mypage">
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp_login_key_icon.png" alt="Images" width="14"><span>イベント</span>
                </div> 
                <?php } else { ?>
                <a href="<?php echo $event_a;?>" title="event" class="table-col-40 box-head-key" style="text-decoration: none;">
                <div>
                    <div class="images-sp-free"><img src="<?php bloginfo('template_directory'); ?>/images/icon_sp_free.png" alt="Images" width="35"></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/icon_sp_key.png" alt="Images" width="9">会員限定
                </div>
                </a>
                <?php } ?>
            </div>
        </div>

        <!-- BOX CATEGORY  -->
        <div class="box-page-sp">
        <div class="box-sp-menu" id="pop-box-category">
            <div class="sp-menu-title">
                <span>記事ジャンル</span>
                <a href="#" id="pop-category-close"><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-close.png" alt="Images" width="20"></a>
            </div>
            <div class="table-sp-menu">

                <!-- COL -->
                <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_11; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow1.png" alt="Images">
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_12; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow2.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_13; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow3.png" alt="Images">
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_14; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow4.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->

                <!-- COL -->
                <a href="<?php echo get_category_link(get_category_by_slug( 'bao-dong' )->cat_ID); ?>">
                <div class="tab-menu-col">
                    <div class="tab-menu-col-text"><?php echo $link_sp_15; ?></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow5.png" alt="Images" >
                </div>
                </a>
                <!-- // COL -->
            </div>
        </div>
        </div>

        <!-- END CATEGORY -->
        <?php if(isset($_SESSION['api_token'])) { ?>
        <div class="login-sp-banner-title">ようこそ<?php echo $_SESSION['api_token']['user_name']; ?>さん</div>
        <?php } ?>


        <?php 
        if(is_home()) {
            ?>
            <div class="sp-image-banner">
                <a href="<?php echo $host_address; ?>"><img src="<?php echo $sp_logo_img;?>" /></a>
            </div>
            <?php
        }
        elseif(is_category()) {
            ?>
            <div class="sp-banner-title">CATEGORY</div>
            <?php
        }
        elseif(is_page('author')) {
            ?>
            <div class="sp-banner-title">WRITTER LIST</div>
            <?php
        }
        elseif(is_page('privacy-policy')) {
            ?>
            <div class="sp-banner-title">PRIVACY POLICY</div>
            <?php
        }
        elseif(is_page('sitemap')) {
            ?>
            <div class="sp-banner-title">SITE MAP</div>
            <?php
        }
        elseif(is_page('favorites')) {
            ?>
            <div class="sp-banner-title">FAVORITE POST</div>
            <div id="fav-pickup-post">
            <div id="pickup-post" style="margin-top: 20px;">
            <div class="pickup-title sp-pickup-title">
                <span id="pickup-text">FAVORITE POST</span><span id="pickup-text-3">&nbsp;&nbsp;&nbsp;&nbsp;お気に入り一覧</span>
            </div>
            </div>
            </div>
            <?php
        }
        elseif(is_page(array('events' , 'event-detail'))) {
            ?>
            <div class=""></div>
            <?php
        }
        elseif(is_page(array('advertisement' , 'contact'))) {
            ?>
            <div class=""></div>
            <?php
        }
        elseif(is_author()) {
            ?>
            <div class="sp-banner-title">WRITTER</div>
            <?php
        }
        elseif(is_single()) {
            ?>
            <div class="sp-banner-title">ARTICLES</div>
            <?php
        }
        elseif(is_page()) {
            global $wp_query;
            $curpage = $wp_query->get_queried_object();
            ?>
            <div class="sp-banner-title"><?php echo $curpage->post_title; ?></div>
            <?php
        }
        ?>

        
        <!-- // SP -->
        <?php //} 
        
    }
    
}
