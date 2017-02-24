<?php 

class ASUPlus_Widget_Writer_Detail extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_writer_detail', 
          'ASUPURA Writer Detail',
          array(
              'description' => 'Sidebar Widget' 
          )
        ); 
    }
    
    function form($instance) {
        $default = array(
            'button' => 'このライターに質問する',
            'name1' => 'ニックネーム',
            'name2' => '（例）松井秀喜',
            'email1' => 'メールアドレス',
            'email2' => '（例）matsui@athlete.com',
            'comment1' => '質問事項（全角◯◯文字）',
            'comment2' => '（例）日体大にて野球をしております。どうしたら、もっと球速が出るのか教えて下さい。',
            'policy1' => 'プライバシーポリシー',
            'policy2' => 'に同意する',
            'policy_sp' => '個人情報取扱い同意書',
            'send' => '送信する',
            'title1' => 'WRITING ARTICLES',
            'title2' => 'の執筆記事一覧 ',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $button = esc_attr( $instance['button'] );
        $name1 = esc_attr( $instance['name1'] );
        $name2 = esc_attr( $instance['name2'] );
        $email1 = esc_attr( $instance['email1'] );
        $email2 = esc_attr( $instance['email2'] );
        $comment1 = esc_attr( $instance['comment1'] );
        $comment2 = esc_attr( $instance['comment2'] );
        $policy1 = esc_attr( $instance['policy1'] );
        $policy2 = esc_attr( $instance['policy2'] );
        $policy_sp = esc_attr( $instance['policy_sp'] );
        $send = esc_attr( $instance['send'] );
        $title1 = esc_attr( $instance['title1'] );
        $title2 = esc_attr( $instance['title2'] );
        
        echo '<br/><br/> <input class="widefat" type="text" name="'.$this->get_field_name("button").'" value="'.$button.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("name1").'" value="'.$name1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("name2").'" value="'.$name2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("email1").'" value="'.$email1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("email2").'" value="'.$email2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("comment1").'" value="'.$comment1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("comment2").'" value="'.$comment2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("policy1").'" value="'.$policy1.'" /><br/><br/>';
        echo 'For SP: <br/><br/><input class="widefat" type="text" name="'.$this->get_field_name("policy_sp").'" value="'.$policy_sp.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("policy2").'" value="'.$policy2.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("send").'" value="'.$send.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title1").'" value="'.$title1.'" /><br/><br/>';
        echo '<input class="widefat" type="text" name="'.$this->get_field_name("title2").'" value="'.$title2.'" /><br/><br/>';
    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['button'] = strip_tags($new_instance['button']);
        $instance['name1'] = strip_tags($new_instance['name1']);
        $instance['name2'] = strip_tags($new_instance['name2']);
        $instance['email1'] = strip_tags($new_instance['email1']);
        $instance['email2'] = strip_tags($new_instance['email2']);
        $instance['comment1'] = strip_tags($new_instance['comment1']);
        $instance['comment2'] = strip_tags($new_instance['comment2']);
        $instance['policy1'] = strip_tags($new_instance['policy1']);
        $instance['policy2'] = strip_tags($new_instance['policy2']);
        $instance['policy_sp'] = strip_tags($new_instance['policy_sp']);
        $instance['send'] = strip_tags($new_instance['send']);
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['title2'] = strip_tags($new_instance['title2']);
        return $instance;
    }
    
    function widget($args, $instance) {
        extract( $args );
        $button = $instance['button'];
        $name1 = $instance['name1'];
        $name2 = $instance['name2'];
        $email1 = $instance['email1'];
        $email2 = $instance['email2'];
        $comment1 = $instance['comment1'];
        $comment2 = $instance['comment2'];
        $policy1 = $instance['policy1'];
        $policy2 = $instance['policy2'];
        $policy_sp = $instance['policy_sp'];
        $send = $instance['send'];
        $title1 = $instance['title1'];
        $title2 = $instance['title2'];
        
        ?>
        <?php 
        global $wp_query;
        $curauth = $wp_query->get_queried_object();
        ?>
        
        <?php if( wpmd_is_notdevice() ) { ?>

        <div class="writer-detail">
            <div id="writer-format-form-detail">
                <div class="writer-detail-inform">
                    <?php 
                    $image_author = the_author_image_url($curauth->ID);
                    if($image_author != '') {
                        the_author_image($curauth->ID);
                    }
                    else {
                        ?>
                        <div class="entry_author_image">
                            <img src="<?php echo get_stylesheet_directory_uri().'/images/writer-white.jpg' ?>" alt=""/>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="writer-detail-inform-content">
                    <div class="inform-pro">      
                        <div class="detail-inform-img"><?php echo get_simple_local_avatar($curauth->ID, '200'); ?> </div>
                        <div class="detail-inform-content">
                            <div class="writer-pro-name"><?php echo $curauth->display_name; ?>
                            <span>（<?php echo $curauth->sem_aboutme_page; ?>） </span></div>
                            <div class="writer-pro-infor"><?php echo $curauth->description; ?></div>
                        </div>
                        <div class="detail-inform-content-btn" onClick="click_button()">
                            <div class="icon-arrow"><img src="<?php bloginfo('template_directory'); ?>/sass/images/arrow.png" alt="" class="rotate180"></div>
                            <div class="button"><?php echo $button; ?></div></div>
                    </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                 <div class="infor-user">
                <form action="" name="myForm" method="POST" role="form" onsubmit="return checkCheckBoxes(this);">
               
                    <div class="infor-user-name">
                        <div class="padding-left25">
                            <div style="margin-bottom: 17px;">
                            <label><?php echo $name1; ?></label>
                            <input type="text" class="form-control" id="vv-name" name="vv-name" placeholder="<?php echo $name2; ?>">
                            </div>
                            <div style="margin-bottom: 17px;">
                            <label><?php echo $email1; ?></label>
                            <input type="text" class="form-control" id="vv-email" name="vv-email" placeholder="<?php echo $email2; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="infor-user-add">
                        <div class="padding-left25">
                            <label><?php echo $comment1; ?></label>
                            <textarea type="text" class="form-control" name="vv-comment" id="vv-comment" placeholder="<?php echo $comment2; ?>"></textarea>
                        </div>
                    </div>
                    <div class="infor-user-btn">
                        <div class="padding-left25">
                            <div class="infor-user-security"><a href="<?php echo site_url();?>/privacy-policy"><?php echo $policy1; ?></a><?php echo $policy2; ?></div>
                            <input type="checkbox" name="check_detail" id="check_detail" value="ok">
                            <label for="check_detail"></label>
                            <div class="icon-sent-to"><img src="<?php bloginfo('template_directory'); ?>/sass/images/send_icon.png" alt="" name="icon-arrow"></div>
                            <input type="submit" name="comment-submit" id="comment-submit" value="<?php echo $send; ?>" id="送信する" class="button">
                        </div>
                    </div>
                
                </form>
                </div>
                
                <div style="clear:both"></div>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_POST['comment-submit']) AND ($_POST['check_detail'] == 'ok')) {
                        $array = array(
                            '_vv_name' => $_POST['vv-name'],
                            '_vv_email' => $_POST['vv-email'],
                            '_vv_comment' => $_POST['vv-comment']
                            );

                        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
                        add_user_meta($curauth->ID, '_vv_question', $json);
                        $to = adminEmail();
                        $subject = 'Comment from '.site_url().' - '.get_the_author_meta('display_name', $author_id);
                        $message = $_POST['vv-comment'];
                        $headers = 'From: '.$_POST['vv-name'].' <'.$_POST['vv-email'].'>' . "\r\n";

                        wp_mail($to, $subject, $message, $headers);

                        $headers_customer = 'From: ASUPURA Administrator <'.adminEmail().'>' . "\r\n";
                        wp_mail($_POST['vv-email'], 'お問い合わせいただき、ありがとうございます。', 'お問い合わせいただき、ありがとうございました。別途、担当からご連絡申し上げます。', $headers_customer);

                        echo '<div class="success-inform">送信完了しました。</div>';
                    }   
                }
                ?>
            </div>
            <?php 
            if(is_author()) {
                global $wp_query;
                $curauh = $wp_query->get_queried_object();
                $nameAuth = $curauh->data->display_name;
            }
            ?>
            <div class="writer-detail-posts">
                <div class="writer-detail-posts-title">
                    <span><?php echo $title1; ?></span><?php echo $nameAuth.$title2; ?>
                </div>
                <ul>
                    
                        <?php 
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array(
                                'author'        =>  $curauth->ID,
                                'orderby'       =>  'post_date',
                                'order'         =>  'DESC',
                                'posts_per_page' => 9,
                                'paged' => $paged
                            );
                            $the_query = new WP_Query($args); ?>

                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li>
                                    <div class="writer-detail-posts-list">
                                    <?php 
                                    mb_internal_encoding("UTF-8");
                                        $category = get_the_category();
                                        $color = '';
                                        if($category[0]->name == "Báo động - Báo cháy") {
                                            $color = '#9b26af';
                                        }
                                        elseif($category[0]->name == "Camera quan sát") {
                                            $color = '#673ab6';
                                        }
                                        elseif($category[0]->name == "Cơ điện") {
                                            $color = '#3f51b4';
                                        }
                                        elseif($category[0]->name == "Mạng - Tổng đài") {
                                            $color = '#01bbd3';
                                        }
                                        elseif($category[0]->name == "Thiết bị tin học") {
                                            $color = '#009487';
                                        }
                                        ?>
                                        <?php $pr = get_post_meta( get_the_ID(), '_pr_mark', true ); ?>
                                        <span class="category"><a href="<?php echo get_category_link($category[0]->cat_ID); ?>"><p style="background-color: <?php echo $color; ?>"><?php echo $category[0]->name; ?></p>  <?php
                                        ?></a><?php if($pr == 'pr') { echo '<p class="pr">PR</p>'; } else { echo ''; } ?></span>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php 
                                        the_post_thumbnail('latest-thumb');
                                        ?>
                                        </a>
                                        <div class="padding-content">
                                            <div class="date"><?php the_time('Y.m.d'); ?> <?php if(newly_posted()) { ?><span class="writer-posts-new">NEW</span><?php } ?></div><?php
                                            // echo '<br/>';
                                            $lengthTitle = mb_strlen(get_the_title());
                                            if($lengthTitle > 16) {
                                                $title_post = mb_substr(get_the_title(), 0, 16).'...';
                                            }
                                            else {
                                                $title_post = get_the_title();
                                            }
                                            ?><div class="title"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?> </a></div> 
                                        </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                </div>
                            </li>
                            <?php else : ?>
                                <p class="box-page-pc"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?> <?php
                        ?>
                   
                </ul>
                 
            </div>
            <div style="clear:both;"></div>
                <div class="box-page-pc" id="pagination-writer-detail">
                    <?php  custom_pagination($the_query->max_num_pages,"",$paged); ?>
                </div>
        </div>

        <?php } ?>
        
        <div style="clear:both;"></div>
        <input type="hidden" id="inputUrl_name_web" value="<?php echo SITE_URL;?>">

<script type="text/javascript">

var host = $('#inputUrl_name_web').val();
function click_button()
{
    
    if ($(".infor-user").css("display")=="block")
    {
       $(".infor-user").css("display", "none");
       $("img.rotate180").attr("src", host + "/wp-content/themes/ASUPURA/sass/images/arrow_2.png");
    }
    else
    {
        $('.infor-user').slideToggle("slow");
        $(".infor-user").css("display", "block");
        $("img.rotate180").attr("src", host + "/wp-content/themes/ASUPURA/sass/images/arrow.png");

    }
}

</script>


























        <?php //if( wpmd_is_device() ) { ?>
        <?php 
        $urlAuth = the_author_image_url($curauth->ID);
        if (strpos($urlAuth, 'png') !== false) {
            $urlAuth = str_replace('.png', '_sp.png', $urlAuth);
        }
        elseif(strpos($urlAuth, 'jpg') !== false)
            $urlAuth = str_replace('.jpg', '_sp.jpg', $urlAuth);
        ?>
        <!--- SP -->
        <div class="sp-writer-detail">
        	<div class="sp-writer-wall" style="background-image: url('<?php echo $urlAuth; ?>');">
	        	<div class="table-inline sp-writer-box-wall">
	        		<div class="sp-writer-box-avatar">
	        			<?php echo get_simple_local_avatar($curauth->ID); ?>
	        		</div>
	        		<div class="sp-writer-box-title">
	        			&nbsp;&nbsp;<?php echo $curauth->display_name; ?><br>（<?php echo $curauth->sem_aboutme_page; ?>）
	        		</div>
	        	</div>
        	</div>

        	<div class="sp-writer-content">
        		<?php echo $curauth->description; ?>
        	</div>
        </div>
        



        <!-- link -->
        <div id="link-write-detail">
        <div class="tab-menu-col sp-btn-link-latest sp-btn-link-writer-detail">
            <div class="tab-menu-col-text" id="sp-wri-btn-form"><?php echo $button; ?></div>
            <span id="link-write-detail-img"><img src="<?php bloginfo('template_directory'); ?>/images/icon_form_sp_arrow_off.png" alt="Images"></span>
        </div>
        </div>
        <!-- //link -->
        <div class="sp-form-writer">
        <form action="" method="POST" role="form" name="myForm" onsubmit="return checkCheckBoxes(this);">

        	<div class="form-group">
        		<div class=""><?php echo $name1; ?></div>
        		<input type="text" class="form-control" id="vv-name" name="vv-name-sp" placeholder="<?php echo $name2; ?>">
        	</div>

        	<div class="form-group">
        		<div class=""><?php echo $email1; ?></div>
        		<input type="email" id="vv-email" class="form-control" name="vv-email-sp" placeholder="<?php echo $email2; ?>">
        	</div>

        	<div class="form-group">
        		<div class=""><?php echo $comment1; ?></div>
        		<textarea id="vv-comment" class="form-control" name="vv-comment-sp" rows="6" ></textarea>
        	</div>

        	<div class="form-group" id="form-checkbox">
        		<label class="myCheckbox">
        			<input type="checkbox" name="check_detail-sp" value="ok" id="check_detail" class="btn-input-check-detail">
        			<span for="check_detail"></span>
        			<a href="<?php echo site_url();?>/privacy-policy"><?php echo $policy_sp; ?></a><?php echo $policy2; ?>
        		</label>
            
        		
        	</div>
        
        	
        
        	<button type="submit" name="comment-submit-sp" id="comment-submit" class="btn btn-primary"><?php echo $send; ?></button>
        </form>
    
        </div>
         <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['comment-submit-sp']) AND ($_POST['check_detail-sp'] == 'ok')) {
                $array = array(
                    '_vv_name' => $_POST['vv-name-sp'],
                    '_vv_email' => $_POST['vv-email-sp'],
                    '_vv_comment' => $_POST['vv-comment-sp']
                    );
                $json = json_encode($array, JSON_UNESCAPED_UNICODE);
                add_user_meta($curauth->ID, '_vv_question', $json);

                $to = adminEmail();
                $subject = 'Comment from '.site_url().' - '.get_the_author_meta('display_name', $author_id);
                $message = $_POST['vv-comment'];
                $headers = 'From: '.$_POST['vv-name'].' <'.$_POST['vv-email'].'>' . "\r\n";

                wp_mail($to, $subject, $message, $headers);

                $headers_customer = 'From: ASUPURA Administrator <'.adminEmail().'>' . "\r\n";
                wp_mail($_POST['vv-email'], 'お問い合わせいただき、ありがとうございます。', 'お問い合わせいただき、ありがとうございました。別途、担当からご連絡申し上げます。', $headers_customer);

                echo '<div class="success-inform">送信完了しました。</div>';
            }   
        }
        ?>

        <div class="sp-box-writer-detail-list">
        <?php 

        $paged_sp = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args_sp = array(
                'author'        =>  $curauth->ID,
                'orderby'       =>  'post_date',
                'order'         =>  'DESC',
                'posts_per_page' => 5,
                'paged' => $paged_sp
            );

		$the_query_sp = new WP_Query($args_sp); ?>

		<?php 
		if ( $the_query_sp->have_posts() ) : 
		while ( $the_query_sp->have_posts() ) : $the_query_sp->the_post();

            ?>

        
            <div class="sp-pickup-content">
            	<div class="table-inline table-sp-pickup">
            		<div class="table-sp-pickup-img">
            			<?php
                        mb_internal_encoding("UTF-8");
                        $category = get_the_category();
                        the_post_thumbnail('pickup-thumb');
                        ?>
            			<?php 
                        $color = '';
                        if($category[0]->name == "Báo động - Báo cháy") {
                            $color = '#9b26af';
                        }
                        elseif($category[0]->name == "Camera quan sát") {
                            $color = '#673ab6';
                        }
                        elseif($category[0]->name == "Cơ điện") {
                            $color = '#3f51b4';
                        }
                        elseif($category[0]->name == "Mạng - Tổng đài") {
                            $color = '#01bbd3';
                        }
                        elseif($category[0]->name == "Thiết bị tin học") {
                            $color = '#009487';
                        }
                        else {
                            $color = '#000';
                        }
                        ?>
            		</div>
            		<div class="table-sp-pickup-text">
            			<div class="pickup-text-date"><?php the_time('Y.m.d'); ?> <?php if(newly_posted()) { ?><img src="<?php bloginfo('template_directory'); ?>/images/sp_new_post.png" /><?php } ?></div>
            			<?php
                        $lengthTitle = mb_strlen(get_the_title());
                        if($lengthTitle > 21) {
                            $title_post = mb_substr(get_the_title(), 0, 21).'...';
                        }
                        else {
                            $title_post = get_the_title();
                        }
                        ?>
            			<div class="pickup-text-content"><a href="<?php the_permalink(); ?>"><?php echo $title_post; ?> </a></div>
            			<div class="pickup-text-cate" style="color: <?php echo $color; ?>"><?php echo $category[0]->name; ?></div>
            		</div>
            	</div>
            </div>
            <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p class="box-page-sp"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?> <?php
        	?>
                
        <!-- pagination sp -->
        <div class="box-page-sp" id="pagination-writedetai-sp">
        <?php sp_custom_pagination($the_query_sp->max_num_pages,"",$paged_sp); ?>
        </div>
        <!-- end pagination sp -->    

	        <!-- BANNER -->
	        <div class="sp-icon-banner-top">
	    		<div class="sp-icon-banner-top-title">AD</div>
	            <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/banner_600-150.png" alt=""></a>
	        </div>
	        <!-- // BANNER -->
        </div>

        <?php// } ?>
        <!--- END SP -->
        <?php

    }
    
}
