<?php 

class ASUPlus_Widget_Banner extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_banner', 
          'ASUPURA Banner',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $default = array(
            'link_img' => get_template_directory_uri().'/images/banner1.png',
            'href' => '#'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $link_img = esc_attr( $instance['link_img'] );
        $href = esc_attr( $instance['href'] );

        echo 'Import image link pc:<br/><br/><input class="widefat" type="text" name="'.$this->get_field_name("link_img").'" value="'.$link_img.'" /><br/><br/>';
        echo 'Import href link:<br/><br/><input class="widefat" type="text" name="'.$this->get_field_name("href").'" value="'.$href.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['link_img'] = strip_tags($new_instance['link_img']);
        $instance['href'] = strip_tags($new_instance['href']);
        return $instance;


    }
    
    function widget($args, $instance) {
        extract( $args );
        
        $link_img = $instance['link_img'];
        $href = $instance['href'];
        
        ?>

        <?php if( wpmd_is_notdevice() ) { ?>
        
        <div class="banner-sidebar">
            <a href="<?php echo $href; ?>"><img src="<?php echo $link_img; ?>" /></a>
        </div>

        <?php } ?>

        <?php    

    }
    
}
