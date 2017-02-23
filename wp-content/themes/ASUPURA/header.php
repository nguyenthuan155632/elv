<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="ja" />
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--	<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>-->

	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/sass/font_sp.css">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- jQuery -->
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/js_menu_sp.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/sns.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootbox.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript">
    $( document ).ready(function() {
        function hasHtml5Validation () {
          //Check if validation supported && not safari
          return (typeof document.createElement('input').checkValidity === 'function') && 
            !(navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0);
        }

        $('form').submit(function(){
            if(!hasHtml5Validation())
            {
                var isValid = true;
                var $inputs = $(this).find('[required]');
                $inputs.each(function(){
                    var $input = $(this);
                    $input.removeClass('invalid');
                    if(!$.trim($input.val()).length)
                    {
                        isValid = false;
                        $input.addClass('invalid');                 
                    }
                });
                if(!isValid)
                {
                    return false;
                }
            }
        });
    });
    </script>
<!--[if IE]>
<style>
.event-checklist-date select {
    background-image: none;
}
</style>
<![endif]-->
</head>
<body <?php body_class(); ?> > 
	<?php
    if(is_page( array('events' , 'event-detail' , 'mypage', 'events/event-thank'))) {
        ?><div id="wrapper" class="event-main"><?php
    }
    elseif(is_single()) {
        ?>
        <div id="wrapper" class="box-archives-main">
        <?php
    }
    else {
        ?><div id="wrapper" ><?php
    }

    
    ?>
<header>
    <?php
         if ( is_active_sidebar('header-sidebar') ) {
                 dynamic_sidebar( 'header-sidebar' );
         } else {
                 _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'asuplus');
         }
    ?>
</header>