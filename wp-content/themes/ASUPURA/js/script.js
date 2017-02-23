jQuery(document).ready(function() {
   jQuery('#widgets-right #main-sidebar').parent().addClass('closed');
});


jQuery(document).ready(function() {
	jQuery('#button-logout-ajax').click(function() {
		jQuery.ajax({
	        url : "https://asupura.com/api/logout",
	        type : "post",
	        dateType: "json",
	        success : function (result){
	            jQuery.get('https://asupura.com/asupura_cms/logout');
	            // window.location.href = window.location.href;
	        },
	        error: function(a,b,c){
	        	var a=1;
	        }
	    });
	});
});