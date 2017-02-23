<?php
if((isset($_POST['favor_submit']) || isset($_POST['favor_submit_sp']) || isset($_POST['favor_post']) || isset($_POST['favor_post_sp'])) && !isset($_SESSION['api_token'])) {
    $_SESSION['historyLink'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    wp_redirect( home_url().'/login' ); exit; 
}
?>
<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="asuplus-post-template-sidebar">
    	<?php
	        if ( is_active_sidebar('post-template-sidebar') ) {
	                dynamic_sidebar( 'post-template-sidebar' );
	        } else {
	                _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
	        }
	    ?>
    </div><?php 
        $color = '';
        if(get_the_category()[0]->cat_name == "スキルアップ") {
            $color = '#9b26af';
        }
        elseif(get_the_category()[0]->cat_name == "組織・チーム") {
            $color = '#673ab6';
        }
        elseif(get_the_category()[0]->cat_name == "仕事研究会") {
            $color = '#3f51b4';
        }
        elseif(get_the_category()[0]->cat_name == "マネー") {
            $color = '#01bbd3';
        }
        elseif(get_the_category()[0]->cat_name == "モチベーション") {
            $color = '#009487';
        }
        elseif(get_the_category()[0]->cat_name == "センパイ") {
            $color = '#f34336';
        }
        elseif(get_the_category()[0]->cat_name == "特集") {
            $color = '#e81d63';
        }
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="pc-post-category-content">
            <?php wpb_set_post_views(get_the_ID());?>

            <div class="post-category-information">
            <?php $pr = get_post_meta( get_the_ID(), '_pr_mark', true ); ?>
            	<!-- PC -->
            	<div class="post-category-information-left box-page-pc">
            		<div class="post-single-date"><?php the_time('Y.m.d'); ?></div>
            		<div class="post-single-star">
                        <form action="" method="post">
                            <?php
                            $isFavorited = false;
                            if(isset($_SESSION['api_token'])) {
                                $arr = array(
                                    'category' => 1,
                                    );
                                $listFavor = API::getProcess('getwishlist.json', $arr);
                                for($i = 0; $i < count($listFavor['data']); $i++) {
                                    if(get_the_ID() == $listFavor['data'][$i]['key']) {
                                        $isFavorited = true;
                                        break;
                                    }
                                    else {
                                        $isFavorited = false;
                                    }
                                }
                                if($isFavorited) {
                                    ?><button type="submit" id="favor_post_del" name="favor_post_del">お気に入りからはずす</button><?php
                                }
                                else {
                                    ?><button type="submit" id="favor_post" name="favor_post">★あとで読む</button><?php
                                }
                            }
                            else {
                                ?><button type="submit" id="favor_post" name="favor_post">★あとで読む</button><?php
                            }

                            ?>
                        </form>
                    </div>
            	</div>
            	<div class="post-category-information-right box-page-pc">
            		
                    <?php 
                    if($pr == 'pr') { 
                        echo '<button class="post-single-pr" type="button">PR</button>';
                    } 
                    else { 
                        echo ''; 
                    } 
                    ?>
            		<a href="<?php echo get_category_link(get_the_category()[0]->cat_ID); ?>"><button style="background-color: <?php echo $color; ?>" class="post-single-category" type="button"><?php echo get_the_category()[0]->cat_name; ?></button></a>
				</div>
				<!-- // PC -->

				<!-- SP -->
				<div class="table-inline sp-post-category-information box-page-sp">
					<div class="sp-post-infor-left">
						<div class="sp-post-single-date"><?php the_time('Y.m.d'); ?></div>
                        <?php 
                            if($pr == 'pr') { 
                                echo '<div class="sp-post-single-pr" >PR</div>';
                            } 
                            else { 
                                echo ''; 
                            } 
                        ?>
						<div class="sp-post-single-category" ><a style="color: <?php echo $color; ?>" href="<?php echo get_category_link(get_the_category()[0]->cat_ID); ?>" title=""><?php echo get_the_category()[0]->cat_name; ?></a></div>
					</div>
					<div class="sp-post-infor-right">
						<div class="sp-post-single-star">
                            <form action="" method="post">
                            <?php
                            $isFavorited = false;
                            if(isset($_SESSION['api_token'])) {
                                $arr = array(
                                    'category' => 1,
                                    );
                                $listFavor = API::getProcess('getwishlist.json', $arr);
                                for($i = 0; $i < count($listFavor['data']); $i++) {
                                    if(get_the_ID() == $listFavor['data'][$i]['key']) {
                                        $isFavorited = true;
                                        break;
                                    }
                                    else {
                                        $isFavorited = false;
                                    }
                                }
                                if($isFavorited) {
                                    ?><button type="submit" id="favor_post_del_sp" name="favor_post_del_sp">お気に入りからはずす</button><?php
                                }
                                else {
                                    ?><button type="submit" id="favor_post_sp" name="favor_post_sp">★お気に入り登録</button><?php
                                }
                            }
                            else {
                                ?><button type="submit" id="favor_post_sp" name="favor_post_sp">★お気に入り登録</button><?php
                            }

                            ?>
                        </form>
                        </div>
					</div>
				</div>
				<!-- // SP -->

			</div>

			<div class="pc-post-category-title">
            	<?php the_title(); ?>
            </div>
            <div class="pc-get-nickname">
            ライター：<?php
            $author_url =  get_author_posts_url(get_the_author_id());;
            ?><a href="<?php echo $author_url; ?>"><?php the_author(); ?></a>
            </div>
            <div class="pc-post-category-images">
            	<?php the_post_thumbnail('full'); ?>
            </div>

            <?php asuplus_content(); ?>
        </div>
        <!-- SP -->
        <?php
            if ( is_active_sidebar('sp-post-template-sidebar') ) {
                    dynamic_sidebar( 'sp-post-template-sidebar' );
            } else {
                    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
            }
        ?>
       
    <?php endwhile; endif; ?>
    
</main>
<main >
    <div id="main-content">
        <?php
            if ( is_active_sidebar('general-content') ) {
                    dynamic_sidebar( 'general-content' );
            } else {
                    _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
            }
        ?>
    </div>
</main>
<?php get_footer(); ?>
