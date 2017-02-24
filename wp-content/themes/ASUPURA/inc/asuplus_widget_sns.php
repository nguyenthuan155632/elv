<?php 

class ASUPlus_Widget_SNS extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_sns', 
          'ASUPURA SNS',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title1' => 'CONTACT US!!',
            'title2' => 'Contact to EL-VOL Administrator',
            'facebook' => 'https://www.facebook.com/',
            // 'twitter' => 'https://twitter.com/',
            'google' => 'tienelv@gmail.com',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title1 = esc_attr( $instance['title1'] );
        $title2 = esc_attr( $instance['title2'] );
        $facebook = esc_attr( $instance['facebook'] );
        // $twitter = esc_attr( $instance['twitter'] );
        $google = esc_attr( $instance['google'] );
        
        echo '<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title1").'" value="'.$title1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title2").'" value="'.$title2.'" /><br/><br/>';
        echo 'Follow Facebook:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("facebook").'" value="'.$facebook.'" /><br/><br/>';
        // echo 'Follow Twitter:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("twitter").'" value="'.$twitter.'" /><br/><br/>';
        echo 'Follow Google+:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("google").'" value="'.$google.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['title2'] = strip_tags($new_instance['title2']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        // $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['google'] = strip_tags($new_instance['google']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title1 = $instance['title1'];
        $title2 = $instance['title2'];
        $facebook = $instance['facebook'];
        // $twitter = $instance['twitter'];
        $google = $instance['google'];
        
        ?>
        <?php if( wpmd_is_notdevice() ) { ?>
        
        <div class="sns-sidebar">
            <span id="follow-us"><?php echo $title1; ?></span>
            <span id="note-follow"><?php echo $title2; ?></span>
            <ul id="icon-sns">
                <li><a href="<?php echo $facebook; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_icon.png" alt=""></a></li>
                <!-- <li><a href="<?php echo $twitter; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter_icon.png" alt=""></a></li> -->
                <li><a href="mailto: <?php echo $google; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/google_icon.png" alt=""></a></li>
            </ul>
        </div>

        <?php } ?>
        
        <?php    

    }
    
}
