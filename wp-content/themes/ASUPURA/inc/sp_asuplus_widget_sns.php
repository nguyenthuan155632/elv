<?php 

class SP_ASUPlus_Widget_SNS extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'sp_asuplus_widget_sns', 
          'SP ASUPURA SNS',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
     
    function form($instance) {
        $host_address = site_url();
        $events_image = 
        $default = array(
            'title1' => 'FOLLOW US',
            'title2' => 'オフィシャルSNS',
            'title3' => 'アスプラをフォローして最新情報ゲット！',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'google' => 'https://plus.google.com/',
            'events' => get_template_directory_uri().'/images/sp_banner_img.png',
            'events_a' => site_url().'/events',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title1 = esc_attr( $instance['title1'] );
        $title2 = esc_attr( $instance['title2'] );
        $title3 = esc_attr( $instance['title3'] );
        $facebook = esc_attr( $instance['facebook'] );
        $twitter = esc_attr( $instance['twitter'] );
        $google = esc_attr( $instance['google'] );
        $events = esc_attr( $instance['events'] );
        $events_a = esc_attr( $instance['events_a'] );
        
        echo '<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title1").'" value="'.$title1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title2").'" value="'.$title2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title3").'" value="'.$title3.'" /><br/><br/>';
        echo 'Follow Facebook:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("facebook").'" value="'.$facebook.'" /><br/><br/>';
        echo 'Follow Twitter:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("twitter").'" value="'.$twitter.'" /><br/><br/>';
        echo 'Follow Google+:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("google").'" value="'.$google.'" /><br/><br/>';
        echo 'Follow Twitter:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("events").'" value="'.$events.'" /><br/><br/>';
        echo 'Follow Google+:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("events_a").'" value="'.$events_a.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['title2'] = strip_tags($new_instance['title2']);
        $instance['title3'] = strip_tags($new_instance['title3']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['google'] = strip_tags($new_instance['google']);
        $instance['events'] = strip_tags($new_instance['events']);
        $instance['events_a'] = strip_tags($new_instance['events_a']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title1 = $instance['title1'];
        $title2 = $instance['title2'];
        $title3 = $instance['title3'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $events = $instance['events'];
        $events_a = $instance['events_a'];
        
        ?>

        <!-- SP -->
        <?php //if( wpmd_is_device() ) { ?>
        
        <div class="sp-sns-sidebar" id="pickup-post">
        	<div class="pickup-title" id="sp-sidebar-title">
                <span id="pickup-text"><?php echo $title1; ?></span><span id="pickup-text-3"><?php echo $title2; ?></span>
            </div>
            <div class="sp-note-follow"><?php echo $title3; ?></div> 
            <div class="sp-icon-sns">
                <a href="<?php echo $facebook; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/facebook_icon.png" alt=""></a>
                <a href="<?php echo $twitter; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/twitter_icon.png" alt=""></a>
                <a href="<?php echo $google; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/google_icon.png" alt=""></a>
            </div>
        </div> 
        

        <div class="sp-icon-banner-bot">
            <a href="<?php echo $events_a; ?>"><img src="<?php echo $events; ?>" alt=""></a>
        </div>

        
        <?php //} ?>
        <!-- // SP -->
        
        <?php    

    }
    
}
