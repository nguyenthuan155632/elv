<?php 
/**   
*
* Widget Page Sitemap  
* create sidebar widget page sitemap
*    
* @author     Creator:<PHAN TIEN ANH> - <anh_pt@vietvang.net>  
* @author     Updater:<PHAN TIEN ANH> - <anh_pt@vietvang.net>  
* @copyright  2016 The VietVang JSC
* @license      1
*   
* File location: inc/asuplus_widget_sitemap.php  
*/  

class ASUPlus_Widget_Sitemap extends WP_Widget {
    
    function __construct() {
        parent::__construct (
          'asuplus_widget_sitemap', // id widget
          'ASUPURA Sitemap', // name widget
          array(
              'description' => 'Sidebar Widget Sitemap'
          )
        );
    }
    
    function form($instance) {
        $url_site = site_url();
        $default = array(
            'title1' => 'カテゴリ',
            'link1' => '#',
            'title2' => 'ライター紹介',
            'link2' => ''.$url_site.'/author/',
            'title3' => 'このサイトについて',
            'link3' => '#',
            'title4' => '会員限定イベント',
            'link4' => '#',
            'title4_description' => '会員ログインが必要です',
            'title5' => '事業案内',
            'link5' => '#',
            'sub_title5_1' => '就職・転職をお考えの方へ',
            'sub_title5_2' => '教育機関関係者の方へ',
            'sub_title5_3' => '採用をお考えの企業様へ',
            'sub_title5_4' => '競技団体関係者の方へ',
            'link_sub_title5_1' => '#',
            'link_sub_title5_2' => '#',
            'link_sub_title5_3' => '#',
            'link_sub_title5_4' => '#',
            'title6' => '会社概要',
            'link6' => ''.$url_site.'/company-profile',
            'title7' => 'プライバシーポリシー',
            'link7' => ''.$url_site.'/privacy-policy',
            'title8' => 'お問い合わせ',
            'link8' => ''.$url_site.'/contact',
            'title9' => '広告掲載をお考えの企業様へ',
            'link9' => ''.$url_site.'/advertisement',
            'category1' => 'スキルアップ',
            'cate_link1' => ''.$url_site.'/category/skill-up/',
            'description1' => '体育会にお勧めのスキルアップ方法や、競技ごとが持つポータブルスキルを解説。',
            'category2' => 'モチベーション',
            'cate_link2' => ''.$url_site.'/category/motivation/',
            'description2' => '気分が上がれば、なんでもできそうな気がする。',
            'category3' => '組織・チーム',
            'cate_link3' => ''.$url_site.'/category/organ-team/',
            'description3' => 'ビジネスでも使えるチーム論、スポーツでも使えるビジネス組織論をご紹介。',
            'category4' => 'センパイ',
            'cate_link4' => ''.$url_site.'/category/senior/',
            'description4' => '体育会出身の先輩ビジネスパーソンのニュースやインタビュー。',
            'category5' => '仕事研究会',
            'cate_link5' => ''.$url_site.'/category/study-group/',
            'description5' => '複雑そうなビジネスの仕組みも、スポーツに例えてしまえばとってもカンタン。体育会人材が活躍している業界・業種も。',
            'category6' => '特集',
            'cate_link6' => ''.$url_site.'/category/feature/',
            'description6' => '連載やコラボ企画。',
            'category7' => 'マネー',
            'cate_link7' => ''.$url_site.'/category/startup/',
            'description7' => '体育会流の年収アップの方法と、「息子を甲子園に行かせるのに必要な金額は？」など人生に必要なお金の話。',
        );

        //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định
        $instance = wp_parse_args((array) $instance, $default);

        //Tạo biến riêng cho giá trị mặc định trong mảng $default
        $title1 = esc_attr( $instance['title1'] );
        $link1 = esc_attr( $instance['link1'] );
        $title2 = esc_attr( $instance['title2'] );
        $link2 = esc_attr( $instance['link2'] );
        $title3 = esc_attr( $instance['title3'] );
        $link3 = esc_attr( $instance['link3'] );
        $title4 = esc_attr( $instance['title4'] );
        $link4 = esc_attr( $instance['link4'] );
        $title4_description = esc_attr( $instance['title4_description'] );
        $title5 = esc_attr( $instance['title5'] );
        $link5 = esc_attr( $instance['link5'] );
        $sub_title5_1 = esc_attr( $instance['sub_title5_1'] );
        $sub_title5_2 = esc_attr( $instance['sub_title5_2'] );
        $sub_title5_3 = esc_attr( $instance['sub_title5_3'] );
        $sub_title5_4 = esc_attr( $instance['sub_title5_4'] );
        $link_sub_title5_1 = esc_attr( $instance['link_sub_title5_1'] );
        $link_sub_title5_2 = esc_attr( $instance['link_sub_title5_2'] );
        $link_sub_title5_3 = esc_attr( $instance['link_sub_title5_3'] );
        $link_sub_title5_4 = esc_attr( $instance['link_sub_title5_4'] );
        $title6 = esc_attr( $instance['title6'] );
        $link6 = esc_attr( $instance['link6'] );
        $title7 = esc_attr( $instance['title7'] );
        $link7 = esc_attr( $instance['link7'] );
        $title8 = esc_attr( $instance['title8'] );
        $link8 = esc_attr( $instance['link8'] );
        $title9 = esc_attr( $instance['title9'] );
        $link9 = esc_attr( $instance['link9'] );
        // category
        $category1 = esc_attr( $instance['category1'] );
        $cate_link1 = esc_attr( $instance['cate_link1'] );
        $description1 = esc_attr( $instance['description1'] );
        $category2 = esc_attr( $instance['category2'] );
        $cate_link2 = esc_attr( $instance['cate_link2'] );
        $description2 = esc_attr( $instance['description2'] );
        $category3 = esc_attr( $instance['category3'] );
        $cate_link3 = esc_attr( $instance['cate_link3'] );
        $description3 = esc_attr( $instance['description3'] );
        $category4 = esc_attr( $instance['category4'] );
        $cate_link4 = esc_attr( $instance['cate_link4'] );
        $description4 = esc_attr( $instance['description4'] );
        $category5 = esc_attr( $instance['category5'] );
        $cate_link5 = esc_attr( $instance['cate_link5'] );
        $description5 = esc_attr( $instance['description5'] );
        $category6 = esc_attr( $instance['category6'] );
        $cate_link6 = esc_attr( $instance['cate_link6'] );
        $description6 = esc_attr( $instance['description6'] );
        $category7 = esc_attr( $instance['category7'] );
        $cate_link7 = esc_attr( $instance['cate_link7'] );
        $description7 = esc_attr( $instance['description7'] );

        //Hiển thị form trong option của widget
        echo '
        <ul id="format-ad-frm-widget">
            <li>Title 1 : <input type="text" name="'.$this->get_field_name('title1').'" value="'.$title1.'" /></li>
            <li>Link 1 : <input type="text" name="'.$this->get_field_name('link1').'" value="'.$link1.'" /></li>
            <li><hr style="border-color: #F00;"></li>
            <li>Category 1 : <input type="text" name="'.$this->get_field_name('category1').'" value="'.$category1.'" /></li>
            <li>Link 1 : <input type="text" name="'.$this->get_field_name('cate_link1').'" value="'.$cate_link1.'" /></li>
            <li>Description 1 : <textarea name="'.$this->get_field_name('description1').'" rows="3">'.$description1.'</textarea></li>
            <li><hr></li>
            <li>Category 2 : <input type="text" name="'.$this->get_field_name('category2').'" value="'.$category2.'" /></li>
            <li>Link 2 : <input type="text" name="'.$this->get_field_name('cate_link2').'" value="'.$cate_link2.'" /></li>
            <li>Description 2 : <textarea name="'.$this->get_field_name('description2').'" rows="3">'.$description2.'</textarea></li>
            <li><hr></li>
            <li>Category 3 : <input type="text" name="'.$this->get_field_name('category3').'" value="'.$category3.'" /></li>
            <li>Link 3 : <input type="text" name="'.$this->get_field_name('cate_link3').'" value="'.$cate_link3.'" /></li>
            <li>Description 3 : <textarea name="'.$this->get_field_name('description3').'" rows="3">'.$description3.'</textarea></li>
            <li><hr></li>
            <li>Category 4 : <input type="text" name="'.$this->get_field_name('category4').'" value="'.$category4.'" /></li>
            <li>Link 4 : <input type="text" name="'.$this->get_field_name('cate_link4').'" value="'.$cate_link4.'" /></li>
            <li>Description 4 : <textarea name="'.$this->get_field_name('description4').'" rows="3">'.$description4.'</textarea></li>
            <li><hr></li>
            <li>Category 5 : <input type="text" name="'.$this->get_field_name('category5').'" value="'.$category5.'" /></li>
            <li>Link 5 : <input type="text" name="'.$this->get_field_name('cate_link5').'" value="'.$cate_link5.'" /></li>
            <li>Description 5 : <textarea name="'.$this->get_field_name('description5').'" rows="3">'.$description5.'</textarea></li>
            <li><hr></li>
            <li>Category 6 : <input type="text" name="'.$this->get_field_name('category6').'" value="'.$category6.'" /></li>
            <li>Link 6 : <input type="text" name="'.$this->get_field_name('cate_link6').'" value="'.$cate_link6.'" /></li>
            <li>Description 6 : <textarea name="'.$this->get_field_name('description6').'" rows="3">'.$description6.'</textarea></li>
            <li><hr></li>
            <li>Category 7 : <input type="text" name="'.$this->get_field_name('category7').'" value="'.$category7.'" /></li>
            <li>Link 7 : <input type="text" name="'.$this->get_field_name('cate_link7').'" value="'.$cate_link7.'" /></li>
            <li>Description 7 : <textarea name="'.$this->get_field_name('description7').'" rows="3">'.$description7.'</textarea></li>
            
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 2 : <input type="text" name="'.$this->get_field_name('title2').'" value="'.$title2.'" /></li>
            <li>Link 2 : <input type="text" name="'.$this->get_field_name('link2').'" value="'.$link2.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 3 : <input type="text" name="'.$this->get_field_name('title3').'" value="'.$title3.'" /></li>
            <li>Link 3 : <input type="text" name="'.$this->get_field_name('link3').'" value="'.$link3.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 4 : <input type="text" name="'.$this->get_field_name('title4').'" value="'.$title4.'" /></li>
            <li>Link 4 : <input type="text" name="'.$this->get_field_name('link4').'" value="'.$link4.'" /></li>
            <li>Description 4 : <input type="text" name="'.$this->get_field_name('title4_description').'" value="'.$title4_description.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 5 : <input type="text" name="'.$this->get_field_name('title5').'" value="'.$title5.'" /></li>
            <li>Link 5 : <input type="text" name="'.$this->get_field_name('link5').'" value="'.$link5.'" /></li>
            <li>sub title 1 : <input type="text" name="'.$this->get_field_name('sub_title5_1').'" value="'.$sub_title5_1.'" /></li>
            <li>Link : <input type="text" name="'.$this->get_field_name('link_sub_title5_1').'" value="'.$link_sub_title5_1.'" /></li>
            <li>sub title 2 : <input type="text" name="'.$this->get_field_name('sub_title5_2').'" value="'.$sub_title5_2.'" /></li>
            <li>Link : <input type="text" name="'.$this->get_field_name('link_sub_title5_2').'" value="'.$link_sub_title5_2.'" /></li>
            <li>sub title 3 : <input type="text" name="'.$this->get_field_name('sub_title5_3').'" value="'.$sub_title5_3.'" /></li>
            <li>Link : <input type="text" name="'.$this->get_field_name('link_sub_title5_3').'" value="'.$link_sub_title5_3.'" /></li>
            <li>sub title 4 : <input type="text" name="'.$this->get_field_name('sub_title5_4').'" value="'.$sub_title5_4.'" /></li>
            <li>Link : <input type="text" name="'.$this->get_field_name('link_sub_title5_4').'" value="'.$link_sub_title5_4.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 6 : <input type="text" name="'.$this->get_field_name('title6').'" value="'.$title6.'" /></li>
            <li>Link 6 : <input type="text" name="'.$this->get_field_name('link6').'" value="'.$link6.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 7 : <input type="text" name="'.$this->get_field_name('title7').'" value="'.$title7.'" /></li>
            <li>Link 7 : <input type="text" name="'.$this->get_field_name('link7').'" value="'.$link7.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 8 : <input type="text" name="'.$this->get_field_name('title8').'" value="'.$title8.'" /></li>
            <li>Link 8 : <input type="text" name="'.$this->get_field_name('link8').'" value="'.$link8.'" /></li>
            <li><br><hr style="border-color: #F00;"></li>
            <li>Title 9 : <input type="text" name="'.$this->get_field_name('title9').'" value="'.$title9.'" /></li>
            <li>Link 9 : <input type="text" name="'.$this->get_field_name('link9').'" value="'.$link9.'" /></li>
        </ul>';
        

    }
    
    function update($new_instance, $old_instance) {
        parent::update( $new_instance, $old_instance );
 
        $instance = $old_instance;
        $instance['title1'] = strip_tags($new_instance['title1']);
        $instance['link1'] = strip_tags($new_instance['link1']);
        $instance['title2'] = strip_tags($new_instance['title2']);
        $instance['link2'] = strip_tags($new_instance['link2']);
        $instance['title3'] = strip_tags($new_instance['title3']);
        $instance['link3'] = strip_tags($new_instance['link3']);
        $instance['title4'] = strip_tags($new_instance['title4']);
        $instance['link4'] = strip_tags($new_instance['link4']);
        $instance['title4_description'] = strip_tags($new_instance['title4_description']);
        $instance['title5'] = strip_tags($new_instance['title5']);
        $instance['link5'] = strip_tags($new_instance['link5']);
        $instance['sub_title5_1'] = strip_tags($new_instance['sub_title5_1']);
        $instance['sub_title5_2'] = strip_tags($new_instance['sub_title5_2']);
        $instance['sub_title5_3'] = strip_tags($new_instance['sub_title5_3']);
        $instance['sub_title5_4'] = strip_tags($new_instance['sub_title5_4']);
        $instance['link_sub_title5_1'] = strip_tags($new_instance['link_sub_title5_1']);
        $instance['link_sub_title5_2'] = strip_tags($new_instance['link_sub_title5_2']);
        $instance['link_sub_title5_3'] = strip_tags($new_instance['link_sub_title5_3']);
        $instance['link_sub_title5_4'] = strip_tags($new_instance['link_sub_title5_4']);
        $instance['title6'] = strip_tags($new_instance['title6']);
        $instance['link6'] = strip_tags($new_instance['link6']);
        $instance['title7'] = strip_tags($new_instance['title7']);
        $instance['link7'] = strip_tags($new_instance['link7']);
        $instance['title8'] = strip_tags($new_instance['title8']);
        $instance['link8'] = strip_tags($new_instance['link8']);
        $instance['title9'] = strip_tags($new_instance['title9']);
        $instance['link9'] = strip_tags($new_instance['link9']);

        // category
        $instance['category1'] = strip_tags($new_instance['category1']);
        $instance['cate_link1'] = strip_tags($new_instance['cate_link1']);
        $instance['description1'] = strip_tags($new_instance['description1']);
        $instance['category2'] = strip_tags($new_instance['category2']);
        $instance['cate_link2'] = strip_tags($new_instance['cate_link2']);
        $instance['description2'] = strip_tags($new_instance['description2']);
        $instance['category3'] = strip_tags($new_instance['category3']);
        $instance['cate_link3'] = strip_tags($new_instance['cate_link3']);
        $instance['description3'] = strip_tags($new_instance['description3']);
        $instance['category4'] = strip_tags($new_instance['category4']);
        $instance['cate_link4'] = strip_tags($new_instance['cate_link4']);
        $instance['description4'] = strip_tags($new_instance['description4']);
        $instance['category5'] = strip_tags($new_instance['category5']);
        $instance['cate_link5'] = strip_tags($new_instance['cate_link5']);
        $instance['description5'] = strip_tags($new_instance['description5']);
        $instance['category6'] = strip_tags($new_instance['category6']);
        $instance['cate_link6'] = strip_tags($new_instance['cate_link6']);
        $instance['description6'] = strip_tags($new_instance['description6']);
        $instance['category7'] = strip_tags($new_instance['category7']);
        $instance['cate_link7'] = strip_tags($new_instance['cate_link7']);
        $instance['description7'] = strip_tags($new_instance['description7']);
        
        return $instance;


    }
    
    function widget($args, $instance) {
        extract( $args );

        $title1 = $instance['title1'];
        $link1 = $instance['link1'];
        $title2 = $instance['title2'];
        $link2 = $instance['link2'];
        $title3 = $instance['title3'];
        $link3 = $instance['link3'];
        $title4 = $instance['title4'];
        $link4 = $instance['link4'];
        $title4_description = $instance['title4_description'];
        $title5 = $instance['title5'];
        $link5 = $instance['link5'];
        $sub_title5_1 = $instance['sub_title5_1'];
        $sub_title5_2 = $instance['sub_title5_2'];
        $sub_title5_3 = $instance['sub_title5_3'];
        $sub_title5_4 = $instance['sub_title5_4'];

        $link_sub_title5_1 = $instance['link_sub_title5_1'];
        $link_sub_title5_2 = $instance['link_sub_title5_2'];
        $link_sub_title5_3 = $instance['link_sub_title5_3'];
        $link_sub_title5_4 = $instance['link_sub_title5_4'];

        $title6 = $instance['title6'];
        $link6 = $instance['link6'];
        $title7 = $instance['title7'];
        $link7 = $instance['link7'];
        $title8 = $instance['title8'];
        $link8 = $instance['link8'];
        $title9 = $instance['title9'];
        $link9 = $instance['link9'];


        // category
        $category1 = $instance['category1'];
        $cate_link1 = $instance['cate_link1'];
        $description1 = $instance['description1'];
        $category2 = $instance['category2'];
        $cate_link2 = $instance['cate_link2'];
        $description2 = $instance['description2'];
        $category3 = $instance['category3'];
        $cate_link3 = $instance['cate_link3'];
        $description3 = $instance['description3'];
        $category4 = $instance['category4'];
        $cate_link4 = $instance['cate_link4'];
        $description4 = $instance['description4'];
        $category5 = $instance['category5'];
        $cate_link5 = $instance['cate_link5'];
        $description5 = $instance['description5'];
        $category6 = $instance['category6'];
        $cate_link6 = $instance['cate_link6'];
        $description6 = $instance['description6'];
        $category7 = $instance['category7'];
        $cate_link7 = $instance['cate_link7'];
        $description7 = $instance['description7'];
        

        ?>

        <main>
            <?php if( wpmd_is_notdevice() ) { ?>
            <div id="main-sitemap" class="box-page-pc">
                <div class="sitemap-title-page">サイトマップ</div>
                <div class="sitemap-title"><a href="<?php echo $link1; ?>" title="">|　<?php echo $title1; ?></a></div>
                <div class="pc-table-inline box-sitemap-top">
                    <div class="pc-table-inline sitemap-table-left">
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link1; ?>" title="スキルアップ" class="sitemap-table-title" style="color: #9b26af;"><?php echo $category1; ?></a>
                            <div class="sitemap-table-content"><?php echo $description1; ?></div>
                        </div>
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link3; ?>" class="sitemap-table-title" title="組織・チーダ" style="color: #673ab6;"><?php echo $category3; ?></a>
                            <div class="sitemap-table-content"><?php echo $description3; ?></div>
                        </div>
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link5; ?>" class="sitemap-table-title" title="仕事研究会" style="color: #3f51b4;"><?php echo $category5; ?></a>
                            <div class="sitemap-table-content"><?php echo $description5; ?></div>
                        </div>
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link7; ?>" class="sitemap-table-title" title="マネー" style="color: #01bbd3;"><?php echo $category7; ?></a>
                            <div class="sitemap-table-content"><?php echo $description7; ?></div>
                        </div>
                    </div>

                    <div class="pc-table-inline sitemap-table-right">
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link2; ?>" class="sitemap-table-title" title="モチベーション" style="color: #009487;"><?php echo $category2; ?></a>
                            <div class="sitemap-table-content"><?php echo $description2; ?></div>
                        </div>
                        <div class="pc-table-inline sitemap-table-list">
                            <a href="<?php echo $cate_link4; ?>" class="sitemap-table-title" title="センパイ" style="color: #f34336;"><?php echo $category4; ?></a>
                            <div class="sitemap-table-content"><?php echo $description4; ?></div>
                        </div>
                        <div class="pc-table-inline sitemap-table-list sitemap-table-bor-bottom">
                            <a href="<?php echo $cate_link6; ?>" class="sitemap-table-title" title="特集" style="color: #e81d63;"><?php echo $category6; ?></a>
                            <div class="sitemap-table-content"><?php echo $description6; ?></div>
                        </div>
                    </div>
                </div>
                <div class="sitemap-title"><a href="<?php echo $link2; ?>" title="">|　<?php echo $title2; ?></a></div>
                <div class="sitemap-title"><a href="<?php echo $link3; ?>" title="">|　<?php echo $title3; ?></a></div>
                <div class="sitemap-title"><a href="<?php echo $link4; ?>" title="">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php bloginfo('template_directory'); ?>/images/login.png" alt="Image" width="17" style="vertical-align: sub;">&nbsp;&nbsp;<?php echo $title4; ?></a><span class="sitemap-table-content">※<?php echo $title4_description;?></span></div>
                <div class="sitemap-title"><a href="<?php echo $link5; ?>" title="">|　<?php echo $title5; ?></a></div>

                <!-- sub -->
                <div class="pc-table-inline sitemap-box-table-sub">
                    <div class="sitemap-table-sub"><a href="<?php echo $link_sub_title5_1; ?>" title=""><?php echo $sub_title5_1; ?> </a></div>
                    <div class="sitemap-table-sub"><a href="<?php echo $link_sub_title5_2; ?>" title=""><?php echo $sub_title5_2; ?> </a></div>
                    <div class="sitemap-table-sub"><a href="<?php echo $link_sub_title5_3; ?>" title=""><?php echo $sub_title5_3; ?> </a></div>
                    <div class="sitemap-table-sub"><a href="<?php echo $link_sub_title5_4; ?>" title=""><?php echo $sub_title5_4; ?> </a></div>
                </div>
                <!-- // sub -->

                <div class="sitemap-title"><a href="<?php echo $link6; ?>" title="">|　<?php echo $title6; ?></a></div>
                <div class="sitemap-title"><a href="<?php echo $link7; ?>" title="">|　<?php echo $title7; ?></a></div>
                <div class="sitemap-title"><a href="<?php echo $link8; ?>" title="">|　<?php echo $title8; ?></a></div>
                <div class="sitemap-title"><a href="<?php echo $link9; ?>" title="">|　<?php echo $title9; ?></a></div>

                <div id="sitemap-hr">&nbsp;</div>
            </div>
            <?php } ?>

            <?php //if( wpmd_is_device() ) { ?>
            <div class="sp-sitemap-title-page box-page-sp">サイトマップ</div>
            <div id="sp-main-sitemap" class="box-page-sp">

                <!-- title -->
                <a href="<?php echo $link1; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title"><div class="sp-sitemap-table-title"><?php echo $title1; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <a href="<?php echo $cate_link1; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category1; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description1; ?></div>

                <!-- list -->
                <a href="<?php echo $cate_link3; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category3; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                <div class="sp-sitemap-table-content"><?php echo $description3; ?></div>
                <!-- end list -->

                <!-- list -->
                <a href="<?php echo $cate_link5; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category5; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description5; ?></div>
                <!-- end list -->

                <!-- list -->
                <a href="<?php echo $cate_link7; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category7; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description7; ?></div>
                <!-- end list -->

                <!-- list -->
                <a href="<?php echo $cate_link2; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category2; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description2; ?></div>
                <!-- end list -->

                <!-- list -->
                <a href="<?php echo $cate_link4; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category4; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description4; ?></div>
                <!-- end list -->

                <!-- list -->
                <a href="<?php echo $cate_link6; ?>" title=""><div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $category6; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <div class="sp-sitemap-table-content"><?php echo $description6; ?></div>
                <!-- end list -->

                <!-- title -->
                <a href="<?php echo $link2; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title2; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link3; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title3; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link4; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><img src="<?php bloginfo('template_directory'); ?>/images/login.png" alt="Image" width="15" style="vertical-align: sub;">&nbsp;&nbsp;<?php echo $title4; ?> <br><span id="sub-title-sp-sitemap">※<?php echo $title4_description;?></span> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link5; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title5; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- sub -->
                <a href="<?php echo $link_sub_title5_1; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $sub_title5_1; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end sub -->

                <!-- sub -->
                <a href="<?php echo $link_sub_title5_2; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $sub_title5_2; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end sub -->

                <!-- sub -->
                <a href="<?php echo $link_sub_title5_3; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $sub_title5_3; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end sub -->

                <!-- sub -->
                <a href="<?php echo $link_sub_title5_4; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-tab-sub"><div class="sp-sitemap-table-title"><?php echo $sub_title5_4; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end sub -->

                <!-- title -->
                <a href="<?php echo $link6; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title6; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link7; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title7; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link8; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title8; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->

                <!-- title -->
                <a href="<?php echo $link9; ?>" title="">
                <div class="pc-table-inline sp-sitemap-table sp-sitemap-title acction_up_btn"><div class="sp-sitemap-table-title"><?php echo $title9; ?> </div><img src="<?php bloginfo('template_directory'); ?>/images/sp-menu-arrow.png" alt="" width="8px"></div>
                </a>
                <!-- end title -->
            </div>

            <div class="sp-sitemap-hr box-page-sp">&nbsp;</div>
            <?php //} ?>


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
        <main>
        <?php

    }
    
}