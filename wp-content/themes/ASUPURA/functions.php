<?php

define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
define('SITE_URL', site_url());
define('API_URL', 'https://asupura.com/api');

// require_once( CORE . '/init.php' );

if( ! function_exists('get_custom_post_type')) {
    function get_custom_post_type($query) {
        if (is_home() && $query->is_main_query ())
        $query->set ('post_type', array ('post', 'question-post'));
        return $query;
    }
    add_filter('pre_get_posts', 'get_custom_post_type');
}

function adminEmail() {
  $email = 'athlete@asupura.com';
  // $email = 'takuya.sakata@invc.co.jp';
  // $email = 'nguyenthuan155632@gmail.com';
  return $email;
}

if ( ! function_exists( 'asuplus_theme_setup' ) ) {
	function asuplus_theme_setup() {
    
    require_once 'getAPI.php';

		$languages_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'asuplus', $languages_folder );

		add_theme_support( 'html5', array( 'search-form' ) );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'pickup-thumb', 400, 248, true );
		add_image_size( 'ranking-thumb', 200, 200, true );
		add_image_size( 'latest-thumb', 400, 160, true );
		add_theme_support( 'post-format', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		) );
		add_theme_support( 'title-tag' );

		$default_background = array(
			'default-color' => '#e8e8e8'
		);

		add_theme_support( 'custom-background', $default_background );

		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'asuplus' ) );

		$sidebar = array(
			'name'         => __( 'Main Sidebar', 'asuplus' ),
			'id'           => 'main-sidebar',
			'description'  => __( 'Default sidebar' ),
			'class'        => 'main-sidebar',
			'before_title' => '<div id="main-sidebar-asuplus">',
			'after_title'  => '</div>'
		);
        $header_sidebar = array(
			'name'         => __( 'Header Sidebar', 'asuplus' ),
			'id'           => 'header-sidebar',
			'description'  => __( 'Header sidebar' ),
			'class'        => 'header-sidebar',
			'before_title' => '<div id="header-sidebar-asuplus">',
			'after_title'  => '</div>'
		);
        $toppage_content = array(
			'name'         => __( 'TopPage Content', 'asuplus' ),
			'id'           => 'toppage-content',
			'description'  => __( 'TopPage Content (Post List, Pick Up, Ranking)' ),
			'class'        => 'toppage-sidebar',
			'before_title' => '<div id="toppage-content-asuplus">',
			'after_title'  => '</div>'
		);
		$classification_content  = array(
			'name'         => __( 'Writer List Content', 'asuplus' ),
			'id'           => 'writer-list-content',
			'description'  => __( 'Writer List Content' ),
			'class'        => 'writer-list-sidebar',
			'before_title' => '<div id="writer-list-content-asuplus">',
			'after_title'  => '</div>'
		);
		$writer_detail_content  = array(
			'name'         => __( 'Writer Detail Content', 'asuplus' ),
			'id'           => 'writer-detail-content',
			'description'  => __( 'Writer Detail Content' ),
			'class'        => 'writer-detail-sidebar',
			'before_title' => '<div id="writer-detail-content-asuplus">',
			'after_title'  => '</div>'
		);
		$category_content  = array(
			'name'         => __( 'Category Content', 'asuplus' ),
			'id'           => 'category-content',
			'description'  => __( 'Category Content' ),
			'class'        => 'category-sidebar',
			'before_title' => '<div id="category-content-asuplus">',
			'after_title'  => '</div>'
		);
		$general_content = array(
			'name'         => __( 'General Content', 'asuplus' ),
			'id'           => 'general-content',
			'description'  => __( 'General Content (Pick Up, Ranking)' ),
			'class'        => 'general-sidebar',
			'before_title' => '<div id="general-content-asuplus">',
			'after_title'  => '</div>'
		);
		$post_template_sidebar = array(
			'name'         => __( 'Post Template Sidebar', 'asuplus' ),
			'id'           => 'post-template-sidebar',
			'description'  => __( 'Post Template Sidebar' ),
			'class'        => 'post-template-sidebar',
			'before_title' => '<div id="post-template-sidebar-asuplus">',
			'after_title'  => '</div>'
		);
    $sp_post_template_sidebar = array(
      'name'         => __( 'SP Post Template Sidebar', 'asuplus' ),
      'id'           => 'sp-post-template-sidebar',
      'description'  => __( 'SP Post Template Sidebar' ),
      'class'        => 'sp-post-template-sidebar',
      'before_title' => '<div id="sp-post-template-sidebar-asuplus">',
      'after_title'  => '</div>'
    );
    $footer_sidebar = array(
			'name'         => __( 'Footer Sidebar', 'asuplus' ),
			'id'           => 'footer-sidebar',
			'description'  => __( 'Footer sidebar' ),
			'class'        => 'footer-sidebar',
			'before_title' => '<div id="footer-sidebar-asuplus">',
			'after_title'  => '</div>'
		);
    $sitemap_sidebar = array(
      'name'         => __( 'Site Map', 'asuplus' ),
      'id'           => 'sitemap-sidebar',
      'description'  => __( 'Site Map Sidebar' ),
      'class'        => 'sitemap-sidebar',
      'before_title' => '<div id="sitemap-sidebar-asuplus">',
      'after_title'  => '</div>'
    );
    $event_sidebar = array(
      'name'         => __( 'Events', 'asuplus' ),
      'id'           => 'event-sidebar',
      'description'  => __( 'Event Sidebar' ),
      'class'        => 'event-sidebar',
      'before_title' => '<div id="event-sidebar-asuplus">',
      'after_title'  => '</div>'
    );

		    register_sidebar( $sidebar );
        register_sidebar( $header_sidebar );
        register_sidebar( $toppage_content );
        register_sidebar( $classification_content );
        register_sidebar( $writer_detail_content );
        register_sidebar( $category_content );
        register_sidebar( $general_content );
        register_sidebar( $post_template_sidebar );
        register_sidebar( $sp_post_template_sidebar );
        register_sidebar( $footer_sidebar );
        register_sidebar( $sitemap_sidebar );
        register_sidebar( $event_sidebar );
	}

	add_action( 'init', 'asuplus_theme_setup' );
}

if ( ! function_exists('asuplus_main') ) {
	function asuplus_main () {
		if (is_home() ) { 
			get_template_part('content', get_post_format()); 
		}
	}
}

if ( ! function_exists('asuplus_content') ) {
	function asuplus_content() { ?>
		<div id="asuplus-content">
		<?php the_content(); ?>
		</div>
	<?php
	}
}

function asuplus_style() {
    wp_register_style('normalize-style', get_stylesheet_directory_uri() . '/sass/normalize.css', 'all');
	wp_enqueue_style('normalize-style');
    
    wp_register_style('fonts-style', get_stylesheet_directory_uri() . '/sass/fonts.css', 'all');
	wp_enqueue_style('fonts-style');
    
	wp_register_style('stylesheet-style', get_stylesheet_directory_uri() . '/sass/stylesheet.css', 'all');
	wp_enqueue_style('stylesheet-style');
    
    wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', 'all');
	wp_enqueue_style('main-style');
    
}
add_action('wp_enqueue_scripts', 'asuplus_style');

if(!function_exists('admin_init_scripts')) {
    function admin_init_scripts() {
        wp_register_script( 'asuplus-js', get_template_directory_uri() . '/js/script.js', 'jquery' );
        wp_enqueue_script( 'asuplus-js' );

        wp_register_style( 'asuplus-css-admin-custom', get_template_directory_uri() . '/sass/admin_css_custom.css', 'all' );
        wp_enqueue_style('asuplus-css-admin-custom' );

        add_filter('manage_edit-post_columns', 'asuplus_add_post_columns');
        add_filter('manage_edit-post_sortable_columns', 'asuplus_manage_sortable_columns' );
    }
    add_action('admin_init', 'admin_init_scripts');
    add_action('manage_posts_custom_column', 'asuplus_render_post_columns', 10, 2);
    add_action('quick_edit_custom_box',  'asuplus_add_quick_edit', 10, 2);
    add_action('save_post', 'asuplus_save_quick_edit_data'); 
    add_action('admin_footer', 'asuplus_quick_edit_javascript');
    add_filter('post_row_actions', 'asuplus_expand_quick_edit_link', 10, 2);   
    add_action( 'pre_get_posts', 'my_slice_orderby' );
}
function my_slice_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
    $orderby2 = $query->get( 'orderby');
 
    if( 'pickup' == $orderby ) {
        $query->set('meta_key','pickup');
        $query->set('orderby','meta_value_num');
    }
    if( 'wpb_post_views_count' == $orderby2 ) {
        $query->set('meta_key','wpb_post_views_count');
        $query->set('orderby','meta_value_num');
    }
}
function asuplus_manage_sortable_columns($columns) {
    $columns['post_views_count'] = 'wpb_post_views_count';
    $columns['pick_up'] = 'pickup';
    return $columns;
}
function asuplus_quick_edit_javascript() {
    global $current_screen;
    if (($current_screen->post_type != 'post')) return;
 
    ?>
<script type="text/javascript">
function set_myfield_value(fieldValue, fieldValue_2, nonce) {
        // refresh the quick menu properly
        inlineEditPost.revert();
        console.log(fieldValue);
        jQuery('#pickup').val(fieldValue);
        jQuery('#post_views_count_qe').val(fieldValue_2);
}
</script>
 <?php 
}
function asuplus_expand_quick_edit_link($actions, $post) {     
    global $current_screen;     
    if (($current_screen->post_type != 'post')) 
        return $actions;
    $nonce = wp_create_nonce( 'pickup_'.$post->ID);
    $nonce = wp_create_nonce( 'post_views_count_'.$post->ID);
    $myfielvalue = get_post_meta( $post->ID, 'pickup', TRUE);
    $myfielvalue_2 = get_post_meta( $post->ID, 'wpb_post_views_count', TRUE);
    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';     
    $actions['inline hide-if-no-js'] .= esc_attr( __( 'Edit this item inline' ) ) . '"';
    $actions['inline hide-if-no-js'] .= " onclick=\"set_myfield_value('{$myfielvalue}', '{$myfielvalue_2}')\" >";
    $actions['inline hide-if-no-js'] .= __( 'Quick Edit' );
    $actions['inline hide-if-no-js'] .= '</a>';
    return $actions;
}
function asuplus_save_quick_edit_data($post_id) {     
  // verify if this is an auto save routine.         
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )          
      return $post_id;         
  // Check permissions     
  if ( 'post' == $_POST['post_type'] ) {         
    if ( !current_user_can( 'edit_page', $post_id ) )             
      return $post_id;     
  } else {         
    if ( !current_user_can( 'edit_post', $post_id ) )         
    return $post_id;     
  }        
  // Authentication passed now we save the data       
  if ((isset($_POST['pickup']) || isset($_POST['post_views_count_qe'])) && ($post->post_type != 'revision')) {
        $my_fieldvalue = esc_attr($_POST['pickup']);
        $my_fieldvalue_2 = esc_attr($_POST['post_views_count_qe']);
        if ($my_fieldvalue)
            update_post_meta( $post_id, 'pickup', $my_fieldvalue);
        else
            delete_post_meta( $post_id, 'pickup');
        if ($my_fieldvalue_2)
            update_post_meta( $post_id, 'wpb_post_views_count', $my_fieldvalue_2);
        else
            delete_post_meta( $post_id, 'wpb_post_views_count');
  }
  return $my_fieldvalue;
}



function asuplus_add_post_columns($columns) {
    $columns['post_views_count'] = 'Post Views Count';
    $columns['pick_up'] = 'Pick Up';
    return $columns;
}

function asuplus_add_quick_edit($column_name, $post_type) {
    if ($column_name != 'pick_up') return;
    ?>
    <fieldset class="inline-edit-col-left">
    <div class="inline-edit-col">
        <span class="title">Pick Up</span>
        <input id="pickup_noncename" type="hidden" name="pickup_noncename" value="" />
        <input id="pickup" type="text" name="pickup" value=""/>
        <span class="title">Post Views Count</span>
        <input id="post_views_count_noncename" type="hidden" name="post_views_count_noncename" value="" />
        <input id="post_views_count_qe" type="text" name="post_views_count_qe" value=""/>
    </div>
    </fieldset>
    <?php
}

function asuplus_render_post_columns($column_name, $id) {
    switch ($column_name) {
    case 'post_views_count':
        $widget_content = get_post_meta( $id, 'wpb_post_views_count', TRUE);
        if (!empty($widget_content)) echo $widget_content;
        else echo 'None';               
        break;
    case 'pick_up':
    	$widget_content = get_post_meta( $id, 'pickup', TRUE);
        if (!empty($widget_content)) echo $widget_content;
        else echo 'None';               
        break;

    }
}

if(! function_exists('create_asuplus_widget')) {
    function create_asuplus_widget() {
        unregister_widget('WP_Widget_Pages');     
        unregister_widget('WP_Widget_Calendar');     
        unregister_widget('WP_Widget_Archives');     
        unregister_widget('WP_Widget_Links');     
        unregister_widget('WP_Widget_Meta');     
        unregister_widget('WP_Widget_Search');     
        unregister_widget('WP_Widget_Text');     
        unregister_widget('WP_Widget_Categories');     
        unregister_widget('WP_Widget_Recent_Posts');     
        unregister_widget('WP_Widget_Recent_Comments');     
        unregister_widget('WP_Widget_RSS');     
        unregister_widget('WP_Widget_Tag_Cloud');     
        unregister_widget('WP_Nav_Menu_Widget'); 
        
        require_once 'inc/asuplus_widget_header.php';
        require_once 'inc/asuplus_widget_footer.php';
        require_once 'inc/asuplus_widget_login.php';
        require_once 'inc/asuplus_widget_writer.php';
        require_once 'inc/asuplus_widget_writer_list.php';
        require_once 'inc/asuplus_widget_writer_detail.php';
        require_once 'inc/asuplus_widget_category.php';
        require_once 'inc/asuplus_widget_sns.php';
        require_once 'inc/asuplus_widget_banner.php';
        require_once 'inc/asuplus_widget_pickup.php';
        require_once 'inc/asuplus_widget_ranking.php';
        require_once 'inc/asuplus_widget_latest.php';
        require_once 'inc/sp_asuplus_widget_sns.php';
        require_once 'inc/asuplus_widget_post.php';
        require_once 'inc/sp_asuplus_widget_post.php';
        require_once 'inc/sp_asuplus_widget_banner_small.php';
        require_once 'inc/sp_asuplus_widget_banner_normal.php';
        require_once 'inc/asuplus_widget_sitemap.php';
        require_once 'inc/asuplus_widget_event.php';
        
        register_widget('ASUPlus_Widget_Header');
        register_widget('ASUPlus_Widget_Footer');
        register_widget('ASUPlus_Widget_Login');
        register_widget('ASUPlus_Widget_Writer');
        register_widget('ASUPlus_Widget_Writer_List');
        register_widget('ASUPlus_Widget_Writer_Detail');
        register_widget('ASUPlus_Widget_Category');
        register_widget('ASUPlus_Widget_SNS');
        register_widget('ASUPlus_Widget_Banner');
        register_widget('ASUPlus_Widget_PickUp');
        register_widget('ASUPlus_Widget_Ranking');
        register_widget('ASUPlus_Widget_Latest');
        register_widget('SP_ASUPlus_Widget_SNS');
        register_widget('ASUPlus_Widget_Post');
        register_widget('SP_ASUPlus_Widget_Post');
        register_widget('SP_ASUPlus_Widget_Banner_Small');
        register_widget('SP_ASUPlus_Widget_Banner_Normal');
        register_widget('ASUPlus_Widget_Sitemap');
        register_widget('ASUPlus_Widget_Events');
    }
    add_action( 'widgets_init', 'create_asuplus_widget');
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	function newly_posted() {
		global $post;
		$now = date('U'); $published = get_the_time('U');
		$new = false;
		if( $now-$published  <= 7*24*60*60 ) $new = true;
		return $new;
	}

function asupura_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

function config_child_register_tinymce_fonts( $settings ) {
	$settings['font_formats'] =
	'ThirstySoftRegular=thirstysoftregular;'.
	'A1Mincho=a1mincho;'.
	'Meiryo=meiryo;'.
	'FreeSans=freesans;'.
	'UDShin=udshin;'.
	"Oswald='Oswald', sans-serif;".
	'Andale Mono=andale mono,times;'.
	'Arial=arial,helvetica,sans-serif;'.
	'Arial Black=arial black,avant garde;'.
	'Book Antiqua=book antiqua,palatino;'.
	'Comic Sans MS=comic sans ms,sans-serif;'.
	'Courier New=courier new,courier;'.
	'Georgia=georgia,palatino;'.
	'Helvetica=helvetica;'.
	'Impact=impact,chicago;'.
	'Symbol=symbol;'.
	'Tahoma=tahoma,arial,helvetica,sans-serif;'.
	'Terminal=terminal,monaco;'.
	'Times New Roman=times new roman,times;'.
	'Trebuchet MS=trebuchet ms,geneva;'.
	'Verdana=verdana,geneva;'.
	'Webdings=webdings;'.
	'Wingdings=wingdings,zapf dingbats;';

	$settings['fontsize_formats'] = "5px 6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 30px 32px 34px 36px 40px 48px 60px 72px 100px 150px 200px";

	return $settings;
}
add_filter('tiny_mce_before_init', 'config_child_register_tinymce_fonts');

 mb_internal_encoding("UTF-8");
   function get_title($count){
     $title = get_the_excerpt();
     $title = mb_substr($title, 0, $count);
     return $title . "...";
   }




function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 4;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

}

 function sp_custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 4;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<div class="tab-menu-col sp-btn-link-latest link-prev"><img src="/wp-content/themes/ASUPURA/images/sp_icon_arrow_while_prev.png" alt="Images"><div class="tab-menu-col-text">メンバー⼀覧へ戻り</div></div>'),
    'next_text'       => __('<div class="tab-menu-col sp-btn-link-latest"><div class="tab-menu-col-text">次のページへ</div><img src="/wp-content/themes/ASUPURA/images/sp_icon_arrow_while.png" alt="Images"></div>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='sp-custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

}
function asupura_meta_box()
  {
   add_meta_box( 'pr_mark', 'PR Asupura', 'asupura_pr_mark', 'post' );
  }
  add_action( 'add_meta_boxes', 'asupura_meta_box' );
  function asupura_pr_mark()
  {
    global $post;
    $pr_mark = get_post_meta( $post->ID, '_pr_mark', true );
    if($pr_mark == '') {
      echo ( '<label for="pr_mark">PR: </label>' );
      echo ('<input type="checkbox" id="pr_mark" name="pr_mark" value="'.esc_attr( $pr_mark ).'" />');
    }
    elseif ($pr_mark == 'pr') {
      echo ( '<label for="pr_mark">PR: </label>' );
      echo ('<input type="checkbox" checked id="pr_mark" name="pr_mark" value="'.esc_attr( $pr_mark ).'" />');
    }
     
  }
  function asupura_pr_mark_save( $post_id )
  {
    if(isset($_POST['pr_mark'])) {
      $pr = 'pr';
    }
    elseif (!isset($_POST['pr_mark'])) {
      $pr = '';
    }
   $pr_mark = sanitize_text_field( $pr );
   update_post_meta( $post_id, '_pr_mark', $pr_mark );
  }
  add_action( 'save_post', 'asupura_pr_mark_save' );

function curl_data($data){
    $url = $data['url'];
    $post = $data['post'];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "MCTBot checking {$this->url}"); 
    if($post){
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    }
    $response = curl_exec($curl);
    echo '<pre>';
    print_r($response);
    echo '</pre>';
    die;
    curl_close($curl);
    return $response;

}
function GetGooglePlusShares($url) {
    $post_data = '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]';

    $data = array(
        "url"=>$url,
        "post"=>$post_data
    ); //Creating an array

    $curl = curl_data($data); //Return the Fetched data
    
    $json = json_decode($curl,true);   //It will convert the JSON Object into array

    $gcount = (isset($json[0]['result']['metadata']['globalCounts']['count'])) ? $json[0]['result']['metadata']['globalCounts']['count'] : 0;  //It will return Actual Share Count or 0

    return "ssss";
}

/* Admin Comment Page Setting */
   

add_action('admin_menu', 'settingMenu');
function settingMenu(){
    add_menu_page(
      'コメント管理ページ', 
      'コメント', 
      'upload_files',
      'comment-setting',
      'echoPage','dashicons-format-chat',27
    );
}

/*ADDS STYLESHEET ON WP-ADMIN*/
add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet_to_admin' );
    function safely_add_stylesheet_to_admin() {
        wp_enqueue_style( 'prefix-style', get_stylesheet_directory_uri() .'/sass/admin_ssl.css' );
        wp_enqueue_script('question-js', get_stylesheet_directory_uri() .'/sass/admin_ssl.js' );
    }

function echoPage() {
    session_start();
    global $wpdb;
    if(isset($_POST['delete_question'])) {
        $array_checkbox = $_POST['checkbox_delete'];

        foreach ($array_checkbox as $key => $value) {
          $wpdb->delete('vv_usermeta', array('umeta_id' => $value));
        }
    }


    if ( !isset($_GET['page_num']))
    {
        $page_num = 0 ;
    } else {
        $page_num = $_GET['page_num'] - 1;
    }

    global $wpdb;
    $prefix_wp = $wpdb->prefix;
    $user_id = get_current_user_id();
    
    if ( current_user_can( 'author' ) ) {
      $user_meta_name =  $wpdb->get_results('select umeta_id, meta_key, meta_value from '.$prefix_wp.'usermeta where (user_id = '.$user_id.' and meta_key = "_vv_question") order by umeta_id desc', ARRAY_N);
    } elseif(current_user_can( 'administrator' )) {
      $user_meta_name =  $wpdb->get_results('select umeta_id, meta_key, meta_value from '.$prefix_wp.'usermeta where (meta_key = "_vv_question") order by umeta_id desc ', ARRAY_N);
    }
    $total_record = $wpdb->num_rows;
    $limit = 10;
    $pages = $total_record/$limit;
    $offset = $page_num*$limit;

    $result = array();
    if ( current_user_can( 'author' ) ) {
      $result =  $wpdb->get_results('select umeta_id, meta_key, meta_value from '.$prefix_wp.'usermeta where (user_id = '.$user_id.' and meta_key = "_vv_question") order by umeta_id desc limit '.$offset.','.$limit, ARRAY_N);

    } elseif(current_user_can( 'administrator' )) {
      $result =  $wpdb->get_results('select umeta_id, meta_key, meta_value from '.$prefix_wp.'usermeta where (meta_key = "_vv_question") order by umeta_id desc limit '.$offset.','.$limit, ARRAY_N);

    }

    $data = array();
    for($i = 0; $i < count($result); $i++) {
      $data[$i] = (array) json_decode($result[$i][2]);
      $data[$i]['_vv_id'] = $result[$i][0];
    }

    echo '<form action="" method="post">';
        echo '<div class="admin-question">';
        echo '<h1>コメント</h1>';
        echo '<button type="submit" name="delete_question" style="margin-left:20px" class="button button-primary">Delete</button>';
        echo '<div style="margin-top:20px;margin-left:20px">';
            echo '<table border="1" class="wp-list-table widefat fixed striped comments" id="table-question">';
                echo '<thead>';
                echo '<th class="manage-column column-cb check-column"><input id="selectall" type="checkbox" name="" value=""></th>';
                echo '<th>Name</th>';
                echo '<th>Email</th>';
                echo '<th>Comments</th>';
                echo '</thead>';
                foreach ($data as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input style="margin-left:-2px" class="checkbox1" type="checkbox" name="checkbox_delete[]" value="'.$value['_vv_id'].'">';
                        echo '</td>';
                        echo '<td>';
                            echo $value['_vv_name'];
                        echo '</td>';
                        echo '<td>';
                            echo '<a href=mailto:'.$value['_vv_email'].'>'.$value['_vv_email'].'</a>';
                        echo '</td>';
                         echo '<td>';
                            echo $value['_vv_comment'];
                        echo '</td>';
                    echo '</tr>';
                }
            echo '</table>';
        echo '</div>';
        echo '</div>';
    echo '</form>';
    echo '<nav class="custom-pagination">';
      $link = $_SERVER['QUERY_STRING'];
      if($pages > 1) {
      for ( $page_num = 0; $page_num < $pages; $page_num ++ )
      {
        $active = '';
        if(isset($_GET['page_num']) && $page_num == $_GET['page_num'] - 1)
        {
          $active = 'class="active"';        
        }
          $page = $page_num + 1;
          ?>
            <a <?php echo $active; ?> href="?<?php echo $link; ?>&page_num=<?php echo $page; ?>"><?php echo $page; ?></a>
            <?php
      }
    }
    echo '</nav>';
  }

  function returnDay($date) {
    $weekday_def = date('N', strtotime($date));
    $weekday_ja_def = "";
    if($weekday_def == 1) {
      $weekday_ja_def = "月";
    } 
    elseif($weekday_def == 2) {
      $weekday_ja_def = "火";
    }
    elseif($weekday_def == 3) {
      $weekday_ja_def = "水";
    }
    elseif($weekday_def == 4) {
      $weekday_ja_def = "木";
    }
    elseif($weekday_def == 5) {
      $weekday_ja_def = "金";
    }
    elseif($weekday_def == 6) {
      $weekday_ja_def = "土";
    }
    elseif($weekday_def == 7) {
      $weekday_ja_def = "日";
    }
    return $weekday_ja_def;
  }


function my_page_template_redirect()
{
  // if( is_page( 'logout' ))
  // {
  //   // API::logout();
  //   // if (isset($_SESSION['api_token'])) {
  //   //   unset($_SESSION['api_token']);
  //   // }
  //   wp_redirect(home_url());
  //   exit();
  // }
  // elseif(is_single() && (isset($_POST['favor_submit']) || isset($_POST['favor_submit_sp']) || isset($_POST['favor_post']) || isset($_POST['favor_post_sp'])) && !isset($_SESSION['api_token'])) {
  //   wp_redirect(home_url('/login/'));
  //   exit();
  // }
  // elseif(is_page('favorites') && !isset($_SESSION['api_token'])) {
  //   wp_redirect(home_url('/login/'));
  //   exit();
  // }
  if((is_page('mypage') || is_page('mypage/edit')) && !isset($_SESSION['api_token'])) {
    wp_redirect(home_url('/login/'));
    exit();
  }
  // elseif(is_page('login')) {
  //   $userMeta = API::getProcess('user.json');
  //   print_r($userMeta); 
  //   if($userMeta['user_id'] != '') {
  //     wp_redirect(home_url());
  //     exit();  
  //   } 
  // }
}
add_action( 'template_redirect', 'my_page_template_redirect' );

//add_action( 'wp_loaded', 'wpa76991_process_form' );
// function wpa76991_process_form(){
//     if(is_page('login')) {
//       wp_redirect(home_url());
//       exit(); 
//     }
// }
 
function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}
