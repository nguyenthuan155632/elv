<?php 

class ASUPlus_Widget_Login extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_login', 
          'ASUPURA Login',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title1' => 'LOG IN',
            'title2' => ' Member Login',
            'placeholder1' => 'User ID',
            'placeholder2' => 'Password',
            'forgot' => 'Forgot your password?',
            'login' => 'Login',
            // 'sns' => 'SNSのIDでログイン',
            // 'sns_a' => site_url().'/snslogin',
            'registry1' => 'Create an free account!',
            'registry2' => 'Registry',
            'forgot_a' => 'https://asupura.com/members/users/set_pass',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title1 = esc_attr( $instance['title1'] );
        $title2 = esc_attr( $instance['title2'] );
        $placeholder1 = esc_attr( $instance['placeholder1'] );
        $placeholder2 = esc_attr( $instance['placeholder2'] );
        $forgot = esc_attr( $instance['forgot'] );
        $login = esc_attr( $instance['login'] );
        // $sns = esc_attr( $instance['sns'] );
        // $sns_a = esc_attr( $instance['sns_a'] );
        $registry1 = esc_attr( $instance['registry1'] );
        $registry2 = esc_attr( $instance['registry2'] );
        $forgot_a = esc_attr( $instance['forgot_a'] );
        
        echo 'Import Login:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title1").'" value="'.$title1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title2").'" value="'.$title2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("placeholder1").'" value="'.$placeholder1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("placeholder2").'" value="'.$placeholder2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("forgot").'" value="'.$forgot.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("forgot_a").'" value="'.$forgot_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("login").'" value="'.$login.'" /><br/><br/>';
        // echo '<input class="widefat" type="text" name="'.$this->get_field_name("sns").'" value="'.$sns.'" /><br/><br/>';
        // echo '<input class="widefat" type="text" name="'.$this->get_field_name("sns_a").'" value="'.$sns_a.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("registry1").'" value="'.$registry1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("registry2").'" value="'.$registry2.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['title2'] = strip_tags($new_instance['title2']);
        $instance['placeholder1'] = strip_tags($new_instance['placeholder1']);
        $instance['placeholder2'] = strip_tags($new_instance['placeholder2']);
        $instance['forgot'] = strip_tags($new_instance['forgot']);
        $instance['forgot_a'] = strip_tags($new_instance['forgot_a']);
        $instance['login'] = strip_tags($new_instance['login']);
        // $instance['sns'] = strip_tags($new_instance['sns']);
        // $instance['sns_a'] = strip_tags($new_instance['sns_a']);
        $instance['registry1'] = strip_tags($new_instance['registry1']);
        $instance['registry2'] = strip_tags($new_instance['registry2']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title1 = $instance['title1'];
        $title2 = $instance['title2'];
        $placeholder1 = $instance['placeholder1'];
        $placeholder2 = $instance['placeholder2'];
        $forgot = $instance['forgot'];
        $forgot_a = $instance['forgot_a'];
        $login = $instance['login'];
        // $sns = $instance['sns'];
        // $sns_a = $instance['sns_a'];
        $registry1 = $instance['registry1'];
        $registry2 = $instance['registry2'];

        
        if(isset($_SESSION['api_token'])) {
             
        }
        else {

            ?>
            <div class="login-sidebar">
                <div class="login-title">       
                    <span><?php echo $title1; ?></span>&nbsp;&nbsp;&nbsp;<?php echo $title2; ?>
                </div>
                <div class="login-content log-pc-format">
                    <form method="POST" action="https://asupura.com/api/login" role="form">
                    <input type="text" required class="login-username login-input" name="user_id" placeholder="<?php echo $placeholder1; ?>" />
                    <input type="password" required class="login-password login-input" name="password" placeholder="<?php echo $placeholder2; ?>" /><br/>
                    <a target="_blank" id="login-forgot-pwd" href="<?php echo $forgot_a; ?>"><?php echo $forgot; ?></a>
                    <?php if(isset($_SESSION['message_login'])) { ?>
                    <div class="form-group" style="color: red;margin-left: 0px;margin-top: 20px">
                    <?php echo $_SESSION['message_login'];?>
                    </div>
                    <?php } ?>
                    <div class="button-login-new">
                        <input id="button-login-new-login" type="submit" name="login-submit" value="<?php echo $login; ?>">
                    </div>
                    <!-- <div class="button-login-new btn-sns-author">
                        <a href="<?php echo API_URL;?>/twitter/authorize" title="">
                        <div class="btn-sns-twitter">
                        <span class="font-white-color">Twitterで<br>ログイン</span>
                        </div>
                        </a>
                        <a href="<?php echo API_URL;?>/facebook/authorize" title="">
                            <div class="btn-sns-facebook">
                            <span class="font-white-color">Facebookで<br>ログイン</span>
                            </div>
                        </a>
                    </div> -->
                    </form>

                    <hr/>
                    <span id="login-registry"><?php echo $registry1; ?></span>
                    <a href="" id="format_link_a">
                    <div id="button-registry">
                        <span class="font-white-color"><?php echo $registry2; ?></span>
                    </div>
                    </a>
                    
                </div>
            </div>

            <?php
        }
    }
    
}
