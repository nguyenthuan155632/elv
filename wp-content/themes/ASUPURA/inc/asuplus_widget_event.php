<?php 
/**   
*
* Widget Page Event  
* create sidebar widget page event
*    
* @author     Creator:<PHAN TIEN ANH> - <anh_pt@vietvang.net>  
* @author     Updater:<PHAN TIEN ANH> - <anh_pt@vietvang.net>  
* @copyright  2016 The VietVang JSC
* @license      1
*   
* File location: inc/asuplus_widget_event.php  
*/

class ASUPlus_Widget_Events extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_events', 
          'ASUPURA Events',
          array(
              'description' => 'Sidebar Event' 
          )
        );
    }
    
    function form($instance) {
        $url_site = site_url();
        $default = array(
            'title' => '会員限定イベント',
            'picture' => ''.$url_site.'/wp-content/themes/ASUPURA/images/header_img_slide_event.jpg',
            'content' => 'アスプラは、体育会学生のみんなが学業と部活動を両立させるために一分一秒も無駄にできないことを知っています。だから、一般的な内容の、ポージングの ようなイベントは絶対にやりません。『帰ったら、部活にも気合いが入る』そんな体育会限定イベントを日々考え、日々開催しています。部活の合間など、時間 を見つけて参加してみてください。'


        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $picture = esc_attr( $instance['picture'] );
        $content = esc_attr( $instance['content'] );
        
        echo '
        <ul id="format-ad-frm-widget">
            <li>Title : </li>
            <li><input type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" /></li>
            <li>Picture : </li>
            <li><input type="text" name="'.$this->get_field_name('picture').'" value="'.$picture.'" /></li>
            <li>Content Text : </li>
            <li><textarea name="'.$this->get_field_name('content').'" rows="6">'.$content.'</textarea></li>
        </ul>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['picture'] = strip_tags($new_instance['picture']);
        $instance['content'] = strip_tags($new_instance['content']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $picture = $instance['picture'];
        $content = $instance['content'];
        ?>
        <section id="sidebar-top">
            <div class="event-slide">
                <div class="event-slide-title"><?php echo $title;?></div>
                <div class="event-slide-images"><img src="<?php echo $picture;?>" alt=""></div>
                <div class="event-slide-content"><?php echo $content;?></div>
            </div>
        </section>
        <?php    
            
    }
    
}
