<?php 

class ASUPlus_Widget_PickUp extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_pickup', 
          'ASUPURA PickUp',
          array(
              'description' => 'General Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => 'PICK UP',
            'title_2' => '編集部厳選ピックアップ'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $title_2 = esc_attr( $instance['title_2'] );
        
        echo 'Import Pick Up title:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
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
            'posts_per_page' => '6',
            'meta_key' => 'pickup',
            'orderby' => 'meta_value_num', 
            'order' => 'DESC'
        );
        $the_query = new WP_Query($args);
        $num_posts = $the_query->post_count;
        $format_posts_height = '555px';
        if($num_posts == 0) {
            $format_posts_height = '0px';
        } elseif($num_posts <= 3){
            $format_posts_height = '250px';
        } else {
            $format_posts_height = '555px';
        }
        
        ?>

        <div id="pickup-post">
        	<div class="pickup-title sp-pickup-title">
                <span id="pickup-text"><?php echo $title; ?></span><span id="pickup-text-3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title_2; ?></span>
            </div>

            <?php //if( wpmd_is_notdevice() ) { ?>
            <div class="pickup-content">
                <ul style="height: <?php echo $format_posts_height;?>">
                    <?php
                    if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <li><div class="pickup-list">

                    <?php 
                    mb_internal_encoding("UTF-8");
                        $category = get_the_category();
                    $pr = get_post_meta( get_the_ID(), '_pr_mark', true ); 
                    ?>

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


                        <div class="category">
                            <span id="table-inline-flex">
                            <a href="<?php echo get_category_link($category[0]->cat_ID); ?>">
                                <p style="background-color: <?php echo $color; ?>"><?php echo $category[0]->name; ?>
                                </p>
                            </a><?php if($pr == 'pr') { echo '<p class="pr">PR</p>'; } else { echo ''; } ?>
                            </span>
                        </div>

                        <?php
                        
                        ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pickup-thumb'); ?></a>
                        
                        <span class="date"><?php the_time('Y.m.d'); ?> </span> 
                        <?php
                        echo '<br/>';
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 24) {
                            $title_post = mb_substr(get_the_title(), 0, 24).'...';
                        }
                        else {
                            $title_post = get_the_title();
                        }
                        ?><span class="title"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?> </a></span> <?php
                        ?>

                    </div></li>
                    <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>

            <?php //} ?>

            


            <!-- SP -->
            <?php //if( wpmd_is_device() ) { ?>
            <?php
            $sp_args = array(
            'posts_per_page' => '5',
            'meta_key' => 'pickup',
            'orderby' => 'meta_value_num', 
            'order' => 'DESC'
            );
            $sp_the_query = new WP_Query($sp_args);

            ?>

            <!-- SP -->
            <?php
            if ($sp_the_query->have_posts()) : while ( $sp_the_query->have_posts() ) : $sp_the_query->the_post();
            ?>
            <div class="sp-pickup-content">
            	<div class="table-inline table-sp-pickup">
            		<div class="table-sp-pickup-img">
            			<?php
                        mb_internal_encoding("UTF-8");
                        $category = get_the_category();
                        ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('pickup-thumb');
                        ?></a>
            			
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
            		<div class="table-sp-pickup-text">
            			<div class="pickup-text-date"><?php the_time('Y.m.d'); ?> <img src="<?php bloginfo('template_directory'); ?>/images/sp_new_post.png" /></div>
            			<?php
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 21) {
                            $title_post = mb_substr(get_the_title(), 0, 21).'...';
                        }
                        else {
                            $title_post = get_the_title();
                        }
                        ?>
                        <div class="pickup-text-content"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?></a></div>
            			<div class="pickup-text-cate"><a style="color: <?php echo $color;?>" href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->name; ?></a></div>
            		</div>
            	</div>
            </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();
            ?>
            
            <?php //} ?>
            <!-- // SP -->
        </div>
        <?php    

    }
    
}
