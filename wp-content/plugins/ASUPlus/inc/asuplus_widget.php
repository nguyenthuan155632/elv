<?php 

class ASUPlus_Widget extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget', 
          'ASUPlus Widget',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => '',
            'content' => ''
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $content = esc_attr( $instance['content'] );
        
        echo 'Import title:<br/><br/> <textarea class="widefat" rows="2" name="'.$this->get_field_name("title").'" >'.$title.'</textarea><br/><br/>';
        echo 'Import content:<br/><br/> <textarea class="widefat" rows="2" name="'.$this->get_field_name("content").'" >'.$content.'</textarea><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['content'] = strip_tags($new_instance['content']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = explode(PHP_EOL, $instance['title']);
        $content = explode(PHP_EOL, $instance['content']);
        
        echo "";

    }
    
}
