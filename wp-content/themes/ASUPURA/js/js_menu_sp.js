

// Check Validation Form
	
// Valid Html 5 required
/*$(document).ready(function() {
    var elements = document.getElementsByName("vv-name");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("入力に不備がございます。");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});

$(document).ready(function() {
    var elements = document.getElementsByName("vv-comment");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("入力に不備がございます。");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});
$(document).ready(function() {
    var elements = document.getElementsByName("check_detail");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("入力に不備がございます。");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
});*/

jQuery(document).ready(function() {
	jQuery('#logout-ajax').click(function() {
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

$(document).ready(function(){


	// check category sub for smartphone
	var categoryVisible = false;
	$('#trigger-category').click(function() {
		$('#pop-box-category').slideToggle("slow");
		/*if(categoryVisible) {
			$('#pop-box-category').css('display', 'none');
			categoryVisible = false;
  			return;
		}
		$('#pop-box-category').css({'display':'block'});
		categoryVisible = true;*/
	});

	$('#pop-category-close').click(function() {
		$('#pop-box-category').css('display', 'none');
		categoryVisible = false;
  		return;
	});


	// check menu sub for smartphone
	var menuVisible = false;
	var winwidth=document.all?document.body.clientWidth:window.innerWidth;
	$('.dl-trigger').click(function() {		
		$('#pop-box-menu').slideToggle("slow");
	});

	// close menu 
	$('#pop-menu-close').click(function() {
		$('#pop-box-menu').css('display', 'none');
  		return;
	});





	// scroll top
	$('#icon-to-top').click(function() {
		$('html, body').animate({scrollTop:0}, 'slow');
	});
	$('#scroll-top').click(function() {
		$('html, body').animate({scrollTop:0}, 'slow');
	});



	// form write detail
	var writeVisible = false;
	$('#link-write-detail').click(function() {
		// get host
		var host = $('#inputUrl_name_web').val();
		$('.sp-form-writer').slideToggle("slow");
		if(writeVisible) {
			$('#link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow_off.png" alt="Images">');
			$('.sp-form-writer').css('display', 'none');
			writeVisible = false;
  			return;
		}
		$('#link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow.png" alt="Images">');
		$('.sp-form-writer').css({'display':'block'});
		writeVisible = true;
	});

	// form write detail for SP
	var spwriteVisible = false;
	$('#sp-link-write-detail').click(function() {
		// get host
		var host = $('#inputUrl_name_web').val();
		$('.sp-form-writer').slideToggle("slow");
		if(spwriteVisible) {
			$('#sp-link-write-detail #link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow_off.png" alt="Images">');
			$('#sp-link-write-detail .sp-form-writer').css('display', 'none');
			spwriteVisible = false;
  			return;
		}
		$('#sp-link-write-detail #link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow.png" alt="Images">');
		$('#sp-link-write-detail .sp-form-writer').css({'display':'block'});
		spwriteVisible = true;
	});

	// form write detail for PC
	var write_pcVisible = false;
	$('#pc-link-write-detail').click(function() {
		// get host
		var host = $('#inputUrl_name_web').val();
		$('.pc-article-form-writer').slideToggle("slow");
		if(writeVisible) {
			$('#pc-link-write-detail #link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow_off.png" alt="Images">');
			$('#pc-link-write-detail .pc-article-form-writer').css('display', 'none');
			writeVisible = false;
  			return;
		}
		$('#pc-link-write-detail #link-write-detail-img').html('<img src="'+host+'/wp-content/themes/ASUPURA/images/icon_form_sp_arrow.png" alt="Images">');
		$('#pc-link-write-detail .pc-article-form-writer').css({'display':'block'});
		writeVisible = true;
	});
 


	$('.box-login-tab').click(function() {
		$('.sp-box-login').css("display", "block");
	});

	$('.box-login-tab-clone').click(function() {
		$('.sp-box-login').css("display", "none");
	});


	
});




	// pagination
	$(document).ready(function(){
		// isset
		$.fn.exists = function() { return this.length > 0; };

		jQuery('.sp-custom-pagination .next').addClass('pagination-show');

		$('.sp-custom-pagination .prev').addClass('pagina-prev');
		if( $(".sp-custom-pagination .prev").exists()) {
			$('.sp-custom-pagination').addClass('add-action-custom-bot');
		}
	});


	// click menu
	$(document).ready(function(){

		var cur_url = window.location.href;  // get location href
		var numCate = 7; // count number category
		for (var i = 1; i <= numCate; i++) {
			$("#asu-nav-category"+i+" a").each(function(){
		        if($(this).attr("href") == cur_url) {
		            $(this).parent().addClass("action"+i+" action-color");
		        }
		     });
		};
	});	


//Event Handle
function function_click(name, value) {
	var strURL = decodeURIComponent(window.location);
	strURL = strURL.concat()
	var strURL_test = strURL.split("?");
	if(strURL_test[1] == undefined) {
		strURL = strURL.concat('?' + name + '=' + value);
	} else {
		strURL = strURL.concat('&' + name + '=' + value);
	}
	strURL_2 = strURL.split("?");
	var strURL_3 = strURL_2[1].split("&");
	var temp_cate = 0, temp_date = 0, temp_area = 0;
	var str_event = [];
	for (var i = strURL_3.length - 1; i >= 0; i--) {
		var str = strURL_3[i].split("=");
		if(str[0] == 'cate') {
			temp_cate++;
		}
		if(str[0] == 'date') {
			temp_date++;
		}
		if(str[0] == 'area') {
			temp_area++;
		}
		if(temp_cate == 1 && str[0] == 'cate') {
			if(name == 'cate') {
				str_event[i] = 'cate=' + value;
			} else {
				str_event[i] = 'cate=' + str[1];
			}
		}
		if(temp_date == 1 && str[0] == 'date') {
			if(name == 'date') {
				str_event[i] = 'date=' + value;
			} else {
				str_event[i] = 'date=' + str[1];
			}
		}
		if(temp_area == 1 && str[0] == 'area') {
			if(name == 'area') {
				str_event[i] = 'area=' + value;
			} else {
				str_event[i] = 'area=' + str[1];
			}
		}
	}
	var str_main = [];
	str_main = $.grep(str_event,function(n){ return n == 0 || n });
	var str_string = '';
	for (var k = 0; k < str_main.length; k++) {
		if(k == str_main.length - 1) {
			str_string = str_string.concat(str_main[k]);
		} else {
			str_string = str_string.concat(str_main[k]+'&');
		}
	}
	var url_main = strURL_2[0] +'?'+ str_string;
	window.location = url_main;
}


// check validation page questtion


