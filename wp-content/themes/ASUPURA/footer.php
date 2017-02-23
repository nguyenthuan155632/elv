<div class="clear"></div>

<div id="scroll-top">
	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/scrolltop.png" alt=""></a>
</div>

<div class="tag-top"></div>
<footer>
	<?php
         if ( is_active_sidebar('footer-sidebar') ) {
                 dynamic_sidebar( 'footer-sidebar' );
         } else {
                 _e('This is widget area. Go to Appearance -> Widgets to add some widgets.', 'stemcell');
         }
    ?>
</footer>
<div class="tag-bot"></div>
<?php wp_footer(); ?>
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

	$(window).scroll(function() {
		var getTop = $(document).scrollTop();
		var offBottom = $('.tag-bot').offset().top - $('.tag-top').offset().top;
		var getFooter = $(document).height() - $(window).height();
		var valScroll = (getFooter - getTop);

		if(valScroll < offBottom) {
			$('.article-post-write-pc').css("top", "-400px");
			$('.pc-article-form-writer').css("display", "none");
		} else {
			$('.article-post-write-pc').css("top", $('#profileTop').val() + 'px');
		}

		// set class fixed
		if(getTop > 0) {
			// nav
			$('#nav-fixed').removeClass("nav-fixed-default");
			$('#nav-fixed').addClass("nav-fixed");

			// profile
			$('.article-post-write-pc').removeClass("profile-fixed-default");
			$('.article-post-write-pc').addClass("profile-fixed");
		} else {
			// nav
			$('#nav-fixed').removeClass("nav-fixed");
			$('#nav-fixed').addClass("nav-fixed-default");

			// profile
			$('.article-post-write-pc').removeClass("profile-fixed");
			$('.article-post-write-pc').addClass("profile-fixed-default");
		}
	});
});
</script>
<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?>
<?php global $template;
if(is_page('author') || is_single() || basename($template) == "author.php") { ?>
<script src="<?php bloginfo('template_directory'); ?>/js/check_validation.js" type="text/javascript" charset="utf-8" async defer></script>
<?php } ?>
</div>
</body>
</html>