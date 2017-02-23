<?php 

class ASUPlus_Widget_Writer_List extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_writer_list', 
          'ASUPURA Writer List',
          array(
              'description' => 'Sidebar Widget' 
          )
        );
    }
    
    function form($instance) {
        $host_address = site_url();
        $default = array(
            'title' => 'WRITER LIST',
            'title_2' => 'ライター一覧'
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



        ?>


        <div id="writer-list">
            <div class="writer-list-title">       
                <span><?php echo $title; ?></span>&nbsp;&nbsp;&nbsp;<?php echo $title_2; ?>
            </div>
            <div class="writer-list-content">     
                <?php 

                $number = 8;
                $paged      = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $offset     = ($paged - 1) * $number;
                $args_offset = array(
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
                    'offset'       => $offset,
                    'search'       => '',
                    'number'       => $number,
                    'count_total'  => false,
                    'fields'       => 'all',
                    'who'          => 'authors',
                    'paged' => $paged
                 ); 

               
                $query      = get_users();
                $authors      = get_users($args_offset);
                $total_query = count($query);
                $total_authors = count($authors);
                $total_pages = intval($total_query / $number) + 1;

                 mb_internal_encoding("UTF-8");
                 if(!empty( $authors )) {
                    ?>
                    <ul>
                    <?php
                        foreach( $authors as $author ) {
                            $lengthBio = mb_strlen($author->description);
                            if($lengthBio > 28) {
                                $authorBio = mb_substr($author->description, 0, 28).'...';
                            }
                            else {
                                $authorBio = $author->description;
                            }
                            ?>
                                <li>
                                    <?php
                                    $urlAuth = the_author_image_url($author->ID);
                                    
                                    if (strpos($urlAuth, 'png') !== false) {
                                        $urlAuth = str_replace('.png', '_sp.png', $urlAuth);
                                    }
                                    elseif(strpos($urlAuth, 'jpg') !== false) {
                                        $urlAuth = str_replace('.jpg', '_sp.jpg', $urlAuth);
                                    }
                                    
                                    ?>
                                    <div class="writer-content">
                                        <div class="entry_author_image">
                                        <a href="<?php echo get_author_posts_url($author->ID); ?>">
                                            <img alt="<?php echo $author->display_name; ?>" src="<?php echo $urlAuth; ?>">
                                        </a>
                                        </div>
                                        <div class="container-author">
                                            <div class="writer-inform">
                                                <div class="writer-inform-img"><?php echo get_simple_local_avatar($author->ID); ?></div>
                                                <div class="writer-inform-title">
                                                    <div class="writer-name"><a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?></a></div>
                                                    <div class="writer-position"><?php echo $author->sem_aboutme_page; ?></div>
                                                </div>
                                            </div>
                                            <div class="writer-bio">
                                            <?php echo $authorBio; ?>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                        }
                    ?>

                    </ul><?php
                 }

                 ?>
            </div>

            <div style="clear: both;"></div>
            <div id="pagination-writer-list">
                <nav class='custom-pagination'>
                    <?php
                    if ($total_query > $total_authors) {
                       $pagination_args = array( 
                            'format' => 'page/%#%/',
                            'total' => $total_pages,
                            'current' => $paged,
                            'show_all'        => False,
                            'end_size'        => 1,
                            'mid_size'        => 4,
                            'prev_next'    => true,
                            'prev_text'       => __('&laquo;'),
                            'next_text'       => __('&raquo;'),
                            'type'            => 'plain',
                            'add_args'        => false,
                            'add_fragment'    => ''
                        );
                      echo paginate_links($pagination_args);
                    }
                    ?>
                </nav>
            </div>
        </div>
        <div style="clear: both;"></div>
        




        

        <?php //if( wpmd_is_device() ) { ?>

        <div class="sp-writer-list">   
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
                    'offset'       => $offset,
                    'search'       => '',
                    'number'       => '6',
                    'count_total'  => false,
                    'fields'       => 'all',
                    'who'          => 'authors'
                 ); 
                 $authors = get_users( $args );
                 $total_authors = count($authors);
                $total_pages = intval($total_query / 6) + 1;

                 if(!empty( $authors )) {
                    mb_internal_encoding("UTF-8");
                    ?>
                    <?php
                        foreach( $authors as $author ) {
                            $lengthBio_sp = mb_strlen($author->description);
                            if($lengthBio_sp > 33) {
                                $authorBio_sp = mb_substr($author->description, 0, 33).'...';
                            }
                            else {
                                $authorBio_sp = $author->description;
                            }
                            ?>
                            <!-- list write -->
                            <div class="sp-writer-list-box">
                                <div class="sp-writer-box-top">
                                    <a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo get_simple_local_avatar($author->ID); ?></a>
                                    <div class="sp-writer-box-title"><a href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?></a></div>
                                    <div class="sp-writer-box-des"><?php if(!empty($author->sem_aboutme_page)) {echo $author->sem_aboutme_page; } else { echo '......';}?></div>
                                </div>
                                <div class="sp-writer-box-bot">
                                	<?php if(!empty($authorBio_sp)) {echo $authorBio_sp; } else { echo '....';}?>
                                </div>
                            </div>
                            <!-- end list write -->
                            <?php
                        }
                    ?>

                <?php
                 }

                 ?>
        </div>
        <div style="clear: both;"></div>
            <div class="box-page-sp" id="pagination-toppage-sp">
                <nav class='sp-custom-pagination'>
                    <?php
                    if ($total_query > $total_authors) {
                       $pagination_args = array( 
                            'format' => 'page/%#%/',
                            'total' => $total_pages,
                            'current' => $paged,
                            'show_all'        => False, 
                            'end_size'        => 1,
                            'mid_size'        => 4,
                            'prev_next'    => true,
                            'prev_text'       => __('<div class="tab-menu-col sp-btn-link-latest link-prev"><img src="/wp-content/themes/ASUPURA/images/sp_icon_arrow_while_prev.png" alt="Images"><div class="tab-menu-col-text">メンバー⼀覧へ戻り</div></div>'),
                            'next_text'       => __('<div class="tab-menu-col sp-btn-link-latest"><div class="tab-menu-col-text">次のページへ</div><img src="/wp-content/themes/ASUPURA/images/sp_icon_arrow_while.png" alt="Images"></div>'),
                            'type'            => 'plain',
                            'add_args'        => false,
                            'add_fragment'    => ''
                        );
                      echo paginate_links($pagination_args);
                    }
                    ?>
                </nav>
            </div>

        <?php //} ?>
        <?php    

    }
    
}
