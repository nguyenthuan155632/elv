<?php 

class ASUPlus_Widget_Writer extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_writer', 
          'ASUPURA Writer',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => 'WRITER',
            'title_2' => 'Administrator',
            'list' => 'Administrator List'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $title_2 = esc_attr( $instance['title_2'] );
        $list = esc_attr( $instance['list'] );
        
        echo 'Import Writer:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title_2").'" value="'.$title_2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("list").'" value="'.$list.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['title_2'] = strip_tags($new_instance['title_2']);
        $instance['list'] = strip_tags($new_instance['list']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $title_2 = $instance['title_2'];
        $list = $instance['list'];
        
        ?>
        
        <div class="writer-sidebar">
            <div class="writer-title">       
                <span><?php echo $title; ?></span>&nbsp;&nbsp;&nbsp;<?php echo $title_2; ?>
            </div>
            <div class="writer-content">
                <ul>
                    <?php $args = array(
                        'blog_id'      => $GLOBALS['blog_id'],
                        'role'         => '',
                        'meta_key'     => '',
                        'meta_value'   => '',
                        'meta_compare' => '',
                        'meta_query'   => array(), 
                        'include'      => array(),
                        'exclude'      => array(),
                        'orderby'      => 'registered',
                        'order'        => 'DESC',
                        'offset'       => '',
                        'search'       => '',
                        'number'       => '5',
                        'count_total'  => false,
                        'fields'       => 'all',
                        'who'          => 'authors'
                    ); 

                    $authors = get_users( $args );
                    if(!empty( $authors )) {
                    ?>

                    <?php
                        mb_internal_encoding("UTF-8");
                        foreach( $authors as $author ) {
                            $lengthBio = mb_strlen($author->description);
                            if($lengthBio > 32) {
                                $authorBio = mb_substr($author->description, 0, 32).'...';
                            }
                            else {
                                $authorBio = $author->description;
                            }
                            ?>
                            <li>
                                <?php echo get_simple_local_avatar($author->ID); ?>
                                <div class="writer-list">
                                    <span class="writer-name"><a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?></a></span><br/>
                                    <span class="writer-desc"><?php echo $authorBio; ?></span>
                                </div>
                            </li>
                               
                            <?php
                        }
                    }
                    ?>
                </ul>
                <a id="view-writer" href="<?php echo site_url().'/author'; ?>"><?php echo $list; ?></a>
            </div>
        </div>
        
        <?php    

    }
    
}
