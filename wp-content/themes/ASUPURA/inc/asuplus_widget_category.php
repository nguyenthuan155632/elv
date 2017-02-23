<?php 

class ASUPlus_Widget_Category extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_category', 
          'ASUPURA Category',
          array(
              'description' => 'Category Widget' 
          )
        ); 
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => 'ARTICLES LIST',
            'title_2' => '記事一覧'
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $title_2 = esc_attr( $instance['title_2'] );
        
        echo 'Import title:<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("title").'" value="'.$title.'" /><br/><br/>';
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
        
       $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
       global $wp_query;
        $curcate = $wp_query->get_queried_object();

        $args = array(
            'posts_per_page' => '9',
            'category_name' => $curcate->slug,
            'paged' => $paged
            );
        $the_query = new WP_Query($args);
        $num_posts = $the_query->post_count;
        $format_posts_height = '770px';
        if($num_posts == 0) {
            $format_posts_height = '0px';
        } elseif($num_posts <= 3){
            $format_posts_height = '250px';
        } elseif($num_posts <= 6){
            $format_posts_height = '500px';
        } else {
            $format_posts_height = '770px';
        }
        ?>
        
        <?php if( wpmd_is_notdevice() ) { ?>

        <div class="category-post box-page-pc">
            <div class="category-title">
                <span id="category-text"><?php echo $title; ?></span><span id="category-text-2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $curcate->name . 'の記事一覧'; ?></span>
            </div>
            <div class="category-content">
                <ul style="height: <?php echo $format_posts_height;?>">
                    <?php
                    if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <li><div class="category-list">

                        <?php
                        mb_internal_encoding("UTF-8");
                        ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('latest-thumb');
                        ?></a>
                        <?php 
                        $color = '';
                        if($curcate->name == "スキルアップ") {
                            $color = '#9b26af';
                        }
                        elseif($curcate->name == "組織・チーム") {
                            $color = '#673ab6';
                        }
                        elseif($curcate->name == "仕事研究会") {
                            $color = '#3f51b4';
                        }
                        elseif($curcate->name == "マネー") {
                            $color = '#01bbd3';
                        }
                        elseif($curcate->name == "モチベーション") {
                            $color = '#009487';
                        }
                        elseif($curcate->name == "センパイ") {
                            $color = '#f34336';
                        }
                        elseif($curcate->name == "特集") {
                            $color = '#e81d63';
                        }
                        ?>

                        <span style="background-color: <?php echo $color; ?>" class="category"><a href="<?php echo get_category_link($curcate->cat_ID); ?>"><?php echo $curcate->name ?></a></span> <?php
                        ?><span class="date"><?php the_time('Y.m.d'); ?> </span><?php if(newly_posted()) { ?><span class="latest-new">NEW</span><?php } ?><?php
                        echo '<br/>';
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 16) {
                            $title_post = mb_substr(get_the_title(), 0, 16).'...';
                        } else {
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
            
        </div>

        <div id="pagination-category">
        <?php  custom_pagination($the_query->max_num_pages,"",$paged); ?>
        </div>
        <?php } ?>


        <!-- SP -->
        <?php //if( wpmd_is_device() ) { ?>

        <div class="sp-box-category-main box-page-sp">
        <?php
        if ($the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post();
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
                        if($curcate->name == "スキルアップ") {
                            $color = '#9b26af';
                        }
                        elseif($curcate->name == "組織・チーム") {
                            $color = '#673ab6';
                        }
                        elseif($curcate->name == "仕事研究会") {
                            $color = '#3f51b4';
                        }
                        elseif($curcate->name == "マネー") {
                            $color = '#01bbd3';
                        }
                        elseif($curcate->name == "モチベーション") {
                            $color = '#009487';
                        }
                        elseif($curcate->name == "センパイ") {
                            $color = '#f34336';
                        }
                        elseif($curcate->name == "特集") {
                            $color = '#e81d63';
                        }
                        ?>
        		<div class="table-sp-pickup-text">
        			<div class="pickup-text-date"><?php the_time('Y.m.d'); ?> <?php if(newly_posted()) { ?><img src="<?php bloginfo('template_directory'); ?>/images/sp_new_post.png" /><?php } ?></div>
        			<?php 
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 16) {
                            $title_post = mb_substr(get_the_title(), 0, 16).'...';
                        }
                        else {
                            $title_post = get_the_title();
                        }
                    ?>
                    <div class="pickup-text-content"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?> </a></div>
        			<div class="pickup-text-cate"><a style="color:<?php echo $color; ?>" href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->name; ?></a></div>
        		</div>
        	</div>
        </div>
        <?php
        endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <div id="pagination-category-sp">
        <?php  sp_custom_pagination($the_query->max_num_pages,"",$paged); ?>
        </div>
        </div>
        
        <?php// } ?>
        <!-- // SP -->

        <?php 

    }
    
}
