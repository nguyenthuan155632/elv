<?php 

class ASUPlus_Widget_Ranking extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_ranking', 
          'ASUPURA Ranking',
          array(
              'description' => 'General Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => 'RANKING',
            'title_2' => 'Popular'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $title_2 = esc_attr( $instance['title_2'] );
        
        echo 'Import Ranking title:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title_2").'" value="'.$title_2.'" /><br/><br/>';

    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['title_2'] = strip_tags($new_instance['title_2']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $title_2 = $instance['title_2'];
        $args = array(
            'posts_per_page' => '5',
            'meta_key' => 'wpb_post_views_count',
            'orderby' => 'meta_value_num', 
            'order' => 'DESC'
        );

        if( wpmd_is_notdevice() ) {

        $the_query = new WP_Query($args);
        
        ?>
        <div id="ranking-post">
            <div class="ranking-title">
                <span id="ranking-text"><?php echo $title; ?></span><span id="ranking-text-2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title_2; ?></span>
            </div>
            <div class="ranking-content">
                <ul>
                    <?php
                    $i = 0;
                    if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    $i++;
                    $medal = "";
                    if($i == 1) {
                        $medal = get_template_directory_uri() . '/images/1.png';
                    }
                    elseif($i == 2) {
                        $medal = get_template_directory_uri() . '/images/2.png';
                    }
                    elseif($i == 3) {
                        $medal = get_template_directory_uri() . '/images/3.png';
                    }
                    elseif($i == 4) {
                        $medal = get_template_directory_uri() . '/images/4.png';
                    }
                    elseif($i == 5) {
                        $medal = get_template_directory_uri() . '/images/5.png';
                    }
                    ?>
                    <li>
                        <div class="ranking-list">
                            <div class="ranking-medal">
                                <img src="<?php echo $medal; ?>" alt="" />
                            </div>
                            
                            <div id="box-hover">
                            <a href="<?php the_permalink(); ?>">
                            <div class="ranking-img">
                                <?php
                                mb_internal_encoding("UTF-8");
                                $category = get_the_category();
                                ?><?php the_post_thumbnail('ranking-thumb'); ?>
                            </div>
                            <?php 
                            $color = '';
                            if($category[0]->name == "スキルアップ") {
                                $color = '#9b26af';
                            }
                            elseif($category[0]->name == "組織・チーム") {
                                $color = '#673ab6';
                            }
                            elseif($category[0]->name == "仕事研究会") {
                                $color = '#3f51b4';
                            }
                            elseif($category[0]->name == "マネー") {
                                $color = '#01bbd3';
                            }
                            elseif($category[0]->name == "モチベーション") {
                                $color = '#009487';
                            }
                            elseif($category[0]->name == "センパイ") {
                                $color = '#f34336';
                            }
                            elseif($category[0]->name == "特集") {
                                $color = '#e81d63';
                            }
                            ?>
                            <div class="ranking-detail">
                                <div class="ranking-text-right">
                                <?php $pr = get_post_meta( get_the_ID(), '_pr_mark', true ); ?>
                                <?php 
                                    if($pr == 'pr') { 
                                        echo '<span class="pr">PR</span>';
                                    } 
                                    else { 
                                        echo ''; 
                                    } 
                                ?>
                                
                                <span style="background-color: <?php echo $color; ?>"><?php echo $category[0]->name; ?></span></div>
                                <div class="date"><?php the_time('Y.m.d'); ?> </div> <?php
                                $lengthTitle = mb_strlen(get_the_title());
                                if($lengthTitle > 30) {
                                    $title_post = mb_substr(get_the_title(), 0, 30).'...';
                                }                               
                                else {
                                    $title_post = get_the_title();
                                }
                                $lengthContent = mb_strlen(get_the_excerpt());
                                if($lengthContent > 45) {
                                    $content_post = mb_substr(get_the_excerpt(), 0, 45).'...';
                                }                               
                                else {
                                    $content_post = get_the_excerpt();
                                } 
                                ?><div class="title"><?php echo $title_post; ?></div> <?php
                                ?><div class="content"><?php echo $content_post; ?> </div> <?php
                                ?>
                            </div>
                            </a>
                            </div>
                            
                            <div style="clear:both"></div>
                        </div>
                    </li>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>

        <?php } ?>
        
        <?php    

    }
    
}
