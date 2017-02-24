<?php 

class ASUPlus_Widget_Footer extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_footer', 
          'ASUPURA Footer',
          array(
              'description' => 'Top Page Widget'  
          )
        ); 
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'line1' => '就職・転職をお考えの方へ、http://www.athlete-p.co.jp/student/
教育機関関係者の方へ、http://www.athlete-p.co.jp/educational_institution/
採用をお考えの企業様へ、http://www.athlete-p.co.jp/corporation/
競技団体関係者の方へ、http://www.athlete-p.co.jp/sports_association/',
            'line2' => 'ログイン、'.$host_address.'/login
ライター紹介、'.$host_address.'/author
会社概要、https://www.athlete-p.co.jp/about_us/
プライバシーポリシー、'.$host_address.'/privacy-policy
サイトマップ、'.$host_address.'/sitemap
お問い合わせ、'.$host_address.'/contact
広告掲載をお考えの企業様へ、'.$host_address.'/advertisement',
            'title' => '事業案内'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $line1 = esc_attr( $instance['line1'] );
        $line2 = esc_attr( $instance['line2'] );
        $title = esc_attr( $instance['title'] );
        
        echo 'Import title:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
        echo 'Import line 1:<br/><br/> <textarea class="widefat" rows="2" name="'.$this->get_field_name("line1").'" >'.$line1.'</textarea><br/><br/>';
        echo 'Import line 2:<br/><br/> <textarea class="widefat" rows="2" name="'.$this->get_field_name("line2").'" >'.$line2.'</textarea><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['line1'] = strip_tags($new_instance['line1']);
        $instance['line2'] = strip_tags($new_instance['line2']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $line1 = explode(PHP_EOL, $instance['line1']);
        $line2 = explode(PHP_EOL, $instance['line2']);

        for($i = 0; $i < count($line1); $i++) {
            $line1_arr[$i] = explode('、', $line1[$i]);
        }
        for($i = 0; $i < count($line2); $i++) {
            $line2_arr[$i] = explode('、', $line2[$i]);
        }
        
        ?>
        <!-- SP -->
        <?php //if( wpmd_is_device() ) { ?>

        <div class="footer-sp-asus">
            <div class="sp-footer-title"><span>SERVICE INFORMATION</span></div>
            <div class="table-sp-fooer">
               
                    <?php
                    for($i = 0; $i < count($line1); $i++) {
                        ?>
                        <a href="<?php echo $line1_arr[$i][1]; ?>" title="" id="format-link">
                        <div class="tab-menu-col format-color-menu-bot">
                            <div class="tab-menu-col-text"><?php echo $line1_arr[$i][0]; ?></div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images">
                        </div>
                        </a>
                        <?php
                    }
                    ?>



                    <div id="icon-to-top">
                        <img src="<?php bloginfo('template_directory'); ?>/images/sp-to-top-icon.png" alt="Images">
                    </div>

                    <?php
                    for($i = 0; $i < count($line2); $i++) {
                        if($i == 0 && $_SESSION['api_token']) {
                        ?>
                            <a href="<?php echo site_url().'/logout' ?>" title="" id="format-link">
                            <div class="tab-menu-col">
                                <div class="tab-menu-col-text">ログアウト</div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images">
                            </div>
                            </a>
                        <?php
                        }
                        else {
                        ?>
                            <a href="<?php echo $line2_arr[$i][1]; ?>" title="" id="format-link">
                            <div class="tab-menu-col">
                                <div class="tab-menu-col-text"><?php echo $line2_arr[$i][0]; ?></div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="Images">
                            </div>
                            </a>
                        <?php
                        }
                    }
                    ?>
               
            </div>
            <!-- FOOTER BOTTOM -->
            <div class="sp-footer-bottom">
                <div class="footer-bot-img">
                    <a href="<?php echo site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo_footer.png" alt="Images"></a>
                </div>
                <div class="footer-bot-text">
                    Copyright ©
                    <br>Athlete Planning Co.,Ltd All Rights Reserved.
                </div>
            </div>
        </div>

        <?php //} ?>
        <!-- // SP -->


        <!-- PC -->
        <?php //if( wpmd_is_notdevice() ) { ?>
        <div id="footer-sitemap">
            <div class="footer-sitemap-content">
                <div id="footer-title" class="footer-margin">
                    <span><?php echo $title; ?></span>
                </div>
                <ul id="footer-line1" class="footer-margin">
                    <?php
                    for($i = 0; $i < count($line1); $i++) {
                        ?>
                        <li><a target="_blank" href="<?php echo $line1_arr[$i][1]; ?>"><?php echo $line1_arr[$i][0]; ?></a></li>
                        <?php
                    }
                    ?>
                    <!-- <li><a href="/career-toward">就職・転職をお考えの方へ</a></li>
                    <li><a href="/educational">教育機関関係者の方へ</a></li>
                    <li><a href="/think-company">採用をお考えの企業様へ</a></li>
                    <li><a href="/toword-sports" class="footer-border-right">競技団体関係者の方へ</a></li> -->
                </ul>
                <hr />
                <ul id="footer-line2" class="footer-margin">
                    <?php
                    for($i = 0; $i < count($line2); $i++) {
                        if($i == 0 && $_SESSION['api_token']) {
                        ?>
                            <li><a href="<?php echo site_url().'/logout' ?>">ログアウト</a></li>
                        <?php
                        }
                        elseif($i == 2) {
                        ?>
                            <li><a target="_blank" href="<?php echo $line2_arr[$i][1]; ?>"><?php echo $line2_arr[$i][0]; ?></a></li>
                        <?php    
                        }
                        else {
                        ?>
                            <li><a href="<?php echo $line2_arr[$i][1]; ?>"><?php echo $line2_arr[$i][0]; ?></a></li>
                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div id="footer-logo">
            <div class="footer-logo-img">
                <div><a href="<?php echo site_url(); ?>"><img id="footer-asupura" src="<?php bloginfo('template_directory'); ?>/images/logo_footer.png" /></a></div>
                <div class="footer-copyright-img"><img id="footer-copyright" src="<?php bloginfo('template_directory'); ?>/images/copyright.png" /></div>
            </div>
        </div>
        <?php //} ?>
        <?php    

    }
    
}
