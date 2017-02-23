<?php
/*
Template Name: Favorites
*/
?>
<?php
if(!isset($_SESSION['api_token'])) {
    $_SESSION['historyLink'] = 'favorites';
    wp_redirect( home_url().'/login' ); exit; 
}
?>
<?php get_header(); ?>
<main>
	<div id="favorite-list">
		<?php
		if(isset($_SESSION['api_token'])) {

            // delete favorite
            if($_SERVER['REQUEST_METHOD'] == 'POST') { 
                if(isset($_POST['del_fav_pup'])) {
                    $params = array(
                        'category' => 1,
                        'kind' => 2,
                        'key' => $_POST['id_fav_pup'],
                    );
                    API::postProcess('changewishlist.json', $params);
                }
            }

			$params = array(
				'category' => 1,
				);
			$listFavorites = API::getProcess('getwishlist.json', $params);
			if($listFavorites['status'] == 'success' && $listFavorites['total_count'] != '0') {
				$dataKey = $listFavorites['data'];
				for($i = 0; $i < count($dataKey); $i++) {
					$getPostById[$i] = get_post($dataKey[$i]['key']);
				}
				?>

                <?php 
                global $wp_query; 
                $curpage = $wp_query->get_queried_object();
                $title_favorite = $curpage->post_title;

                $offset = 0;
                $limit = 9;

                // total_count
                $count_all_cate = $listFavorites['total_count']; 

                // number page
                $num_page_pagination = ceil($listFavorites['total_count'] / $limit);

                // get paged
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                // set limit and offset
                if(isset($paged)) {
                    if($paged == 1) {
                        $offset = 0;
                        $limit = $limit;
                    } else {
                        $offset = ($paged - 1) * $limit;
                        $limit = $limit * $paged;
                    }
                }

                if($limit > $count_all_cate) {
                    $limit = $count_all_cate;
                }

                $num_posts = $limit - $offset;
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
                <span id="category-text">Favorite Posts</span><span id="category-text-2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $title_favorite; ?></span>
                </div>
    				<div class="category-content">
        				<ul style="height: <?php echo $format_posts_height;?>">
                           
                            <?php for($i = $offset; $i < $limit; $i++) { ?>
                            <li id="favorite_cat_page">
                                <div class="category-list">
                                    <div class="box_favorite_pup">
                                        <form action="" method="post">
                                        <a href="<?php echo get_permalink($getPostById[$i]->ID); ?>" title="続きを読む"><input type="button" name="" value="続きを読む" id="btn_favorite_pup"></a>
                                        <input type="submit" name="del_fav_pup" value="お気に入りから削除" id="btn_favorite_pup">
                                        <input type="hidden" name="id_fav_pup" value="<?php echo $getPostById[$i]->ID;?>">
                                        </form>
                                    </div>
                                    <?php
                                    $category = get_the_category( $getPostById[$i]->ID )[0];

                                    mb_internal_encoding("UTF-8");
                                    ?><?php echo get_the_post_thumbnail( $getPostById[$i]->ID, 'latest-thumb' );
                                    ?>
                                    <?php 
                                    $color = '';
                                    if($category->name == "スキルアップ") {
                                        $color = '#9b26af';
                                    }
                                    elseif($category->name == "組織・チーム") {
                                        $color = '#673ab6';
                                    }
                                    elseif($category->name == "仕事研究会") {
                                        $color = '#3f51b4';
                                    }
                                    elseif($category->name == "マネー") {
                                        $color = '#01bbd3';
                                    }
                                    elseif($category->name == "モチベーション") {
                                        $color = '#009487';
                                    }
                                    elseif($category->name == "センパイ") {
                                        $color = '#f34336';
                                    }
                                    elseif($category->name == "特集") {
                                        $color = '#e81d63';
                                    }
                                    ?>

                                    <span style="background-color: <?php echo $color; ?>" class="category"><a href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name ?></a></span> <?php
                                    ?><span class="date"><?php echo the_time('Y.m.d', $getPostById[$i]->ID); ?> </span><?php if(newly_posted()) { ?><span class="latest-new">NEW</span><?php } ?><?php
                                    echo '<br/>';
                                    $lengthTitle = mb_strlen($getPostById[$i]->post_title);
                                    if($lengthTitle > 16) {
                                        $title_post = mb_substr($getPostById[$i]->post_title, 0, 16).'...';
                                    }
                                    else {
                                        $title_post = $getPostById[$i]->post_title;
                                    }
                                    ?><span class="title"><a href="<?php echo get_permalink($getPostById[$i]->ID); ?>"><?php echo $title_post; ?> </a></span> <?php
                                    ?>

                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div id="pagination-category">
                <?php  custom_pagination($num_page_pagination,""); ?>
                </div>

                <?php } ?>

                <?php //if( wpmd_is_device() ) { ?>
                <?php
                            $offset = 0;
                            $limit = 8;

                            // total_count
                            $count_all_cate = $listFavorites['total_count']; 

                            // number page
                            $num_page_pagination = ceil($listFavorites['total_count'] / $limit);

                            // get paged
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                            // set limit and offset
                            if(isset($paged)) {
                                if($paged == 1) {
                                    $offset = 0;
                                    $limit = $limit;
                                } else {
                                    $offset = ($paged - 1) * $limit;
                                    $limit = $limit * $paged;
                                }
                            }

                            if($limit > $count_all_cate) {
                                $limit = $count_all_cate;
                            }

                            ?>
                <div class="sp-box-category-main box-page-sp">
                    <?php
                        for($i = $offset; $i < $limit; $i++) {
                    ?>
                    <div class="sp-pickup-content">
                        <div class="table-inline table-sp-pickup">
                            <div class="table-sp-pickup-img">

                                <?php
                                $category = get_the_category( $getPostById[$i]->ID )[0];

                                mb_internal_encoding("UTF-8");
                                ?>

                                <a href="<?php echo get_permalink($getPostById[$i]->ID); ?>"><?php echo get_the_post_thumbnail( $getPostById[$i]->ID, 'pickup-thumb' );
                                ?></a>
                                
                            </div>
                                <?php 
                                    $color = '';
                                    if($category->name == "スキルアップ") {
                                        $color = '#9b26af';
                                    }
                                    elseif($category->name == "組織・チーム") {
                                        $color = '#673ab6';
                                    }
                                    elseif($category->name == "仕事研究会") {
                                        $color = '#3f51b4';
                                    }
                                    elseif($category->name == "マネー") {
                                        $color = '#01bbd3';
                                    }
                                    elseif($category->name == "モチベーション") {
                                        $color = '#009487';
                                    }
                                    elseif($category->name == "センパイ") {
                                        $color = '#f34336';
                                    }
                                    elseif($category->name == "特集") {
                                        $color = '#e81d63';
                                    }
                                ?>
                            <div class="table-sp-pickup-text">
                                <div class="pickup-text-date"><?php echo the_time('Y.m.d', $getPostById[$i]->ID); ?> <?php if(newly_posted()) { ?><img src="<?php bloginfo('template_directory'); ?>/images/sp_new_post.png" /><?php } ?></div>
                                <?php 
                                    $lengthTitle = mb_strlen($getPostById[$i]->post_title);
                                    if($lengthTitle > 21) {
                                        $title_post = mb_substr($getPostById[$i]->post_title, 0, 21).'...';
                                    }
                                    else {
                                        $title_post = $getPostById[$i]->post_title;
                                    }
                                ?>
                                <div class="pickup-text-content"><a href="<?php echo get_permalink($getPostById[$i]->ID); ?>"><?php echo $title_post; ?> </a></div>
                                <div class="pickup-text-cate"><a style="color:<?php echo $color; ?>" href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name ?></a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div id="pagination-category-sp">
                        <?php  sp_custom_pagination($num_page_pagination,""); ?>
                    </div>
                </div>
                <?php //} ?>

				<?php
				// echo '<pre>';
				// print_r($getPostById);
				// echo '</pre>';
			}
			else {
				?><div style="margin-bottom: 30px;">お気に入り記事はまだ登録されていません。</div><?php
			}
			
		}
		?>
	</div>
    <?php get_sidebar(); ?>
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
<script type="text/javascript">

$(".category-list").hover(function(){
    $('.box_favorite_pup', this).slideToggle("900");
    $('.box_favorite_pup', this).css("display", "block"); 
}, function() {
    $('.box_favorite_pup', this).css("display", "none");
});
</script>
<?php get_footer(); ?>