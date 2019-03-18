(function($){
	var previousPos = 0;
	var threshold = 100;
	var headerMove;
	$(window).scroll(function(){
		if(headerMove != null){
			clearTimeout(headerMove);
		}
		
		if($("#home-section-1").length>0){
			var p = $(window).scrollTop();
			var p1 = $("#home-section-1").offset().top-250;
			if(p> p1){
				$("#s3-count").html(384);
				$("#s4-count").html(2664);
			}
		}
        
//        if($("#why-us-section").length>0){
//			var p = $(window).scrollTop();
//			var p1 = $("#why-us-section").offset().top-50;
//			if(p> p1){
//				$("wu01").html(1);
//			}
//		}
		
		
//		if($(window).scrollTop()>50){
//			var quoteHide = false;
//			if($(window).scrollTop()>previousPos){
//				quoteHide = true;
//			}
//
//			headerMove = setTimeout(function(){
//				if(quoteHide){
//					$(".header-bottom").slideUp();
//					$(".mobile-header-bottom").slideUp();
//				}
//				else{
//					$(".header-bottom").slideDown();
//					$(".mobile-header-bottom").slideDown();
//				}
//			},200);
//		}
//		else{
//			$(".header-bottom").slideDown();
//			$(".mobile-header-bottom").slideDown();
//		}
		

		previousPos = $(window).scrollTop();
	});

	$("#est-alter").on("click", function(e){
		e.preventDefault();
		$(this).toggleClass("actived");
		$("#form-alter").slideToggle();
	});

	$("#mm-toggle").on("click", function(e){
		e.preventDefault();
		$("#mobile-menu-block").toggleClass("show");
	});

	$(".form-overlap").on("click", function(){
        $(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");
		$("body").removeClass("noScroll");
        $("html").removeClass("noScroll");
	});
	
	$("#emailmequote").on("click", function(e){
		e.preventDefault();
		$(".form-overlap").addClass("show");
        $("#EmailMeQuote").addClass("show");
	});
})(jQuery);

jQuery(document).ready(function($){
	setTimeout(function(){
		$("#s2-count").html(62);
        $("#wu01").html(1);
        $("#wu02").html(61);
        $("#wu03").html(384);
        $("#wu04").html(2664);
	}, 1000);

	$("#country-select #country-options").change(function(e){
		var v = $(this).val();
		console.log(v);
		var c = window.location.pathname;
		if(v == "au" || c != "/store-locator/"){
			window.location.replace(window.location.origin+"/store-locator/");
		}
		if(v == "nz" || c != "/store-locator-nz/"){
			window.location.replace(window.location.origin+"/store-locator-nz/");
		}
	});

	//var api_url = theme_directory+"/MobileRepairAPI.php";
	 var api_url ="/index/common/is_header";
	function myFilter(popup){
		var inputEle = $(popup+" .form-popup-header input"),
			filter = inputEle.val().toUpperCase(),
			ulEle = $(popup+" .form-popup-content ul"),
			li = ulEle.find("li");
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("a")[0];
				if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
				} else {
					li[i].style.display = "none";
				}
			}

	}

	//头部 显示 品牌
	$.ajax({
		url: api_url,
		method: "POST",
		data: {
			act: "brands"
		},
		success: function(res){
			//转换对象
			res= $.parseJSON(res);
			console.log(res);
			res.map(function(i,val,arr){
				$("#header-brand-popup .form-popup-content ul").append('<li><a href="#'+i.id+'" data="header-search-brand">'+i.pai+'</a></li>');
				if($("#sd-brand-popup").length>0){
					$("#sd-brand-popup .form-popup-content ul").append('<li><a href="#'+i.id+'" data="sd-search-brand">'+i.pai+'</a></li>');
				}
			});

		},
		error: function(res){
			console.log(res);
		}
	});


	$(document).on("click", "#header-brand-popup .form-popup-content ul li a", function(e){
		e.preventDefault();
		var p = $(this).attr("data");//获取 data 属性
		var v = $(this).text();   //返回文本内容
		$("#"+p).val(v);
		$("#header-search-model").val("");
		$(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");

		//型号
		$.ajax({
			url: api_url,
			method: "POST",
			data: {
				act: "models",
				brand: v
			},
			success: function(res){
				//转换对象
				res = $.parseJSON(res);
				$("#header-model-popup .form-popup-content ul").empty();
				res.map(function(i,val){
					$("#header-model-popup .form-popup-content ul").append('<li><a href="#'+i.id+'" data="header-search-model">'+i.models+'</a></li>');
				});
			},
			error: function(res){
				console.log(res);
			}
		});
	});
	
	$(document).on("click", "#header-model-popup .form-popup-content ul li a", function(e){
		e.preventDefault();
		var p = $(this).attr("data");
		var v = $(this).text();
		$("#"+p).val(v);
		$(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");
	});

	$(document).on("click", "#sd-brand-popup .form-popup-content ul li a", function(e){
		e.preventDefault();
		var p = $(this).attr("data");
		var v = $(this).text();
		$("#"+p).val(v);
		$("#sd-search-model").val("");
		$(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");
	
		$.ajax({
			url: api_url,
			method: "POST",
			data: {
				act: "models",
				brand: v
			},
			success: function(res){
				$("#sd-model-popup .form-popup-content ul").empty();
				res.map(function(i){
					$("#sd-model-popup .form-popup-content ul").append('<li><a href="#'+i+'" data="sd-search-model">'+i+'</a></li>');
				});
			},
			error: function(res){
				console.log(res);
			}
		});
	});


	$(document).on("click", "#sd-model-popup .form-popup-content ul li a", function(e){
		e.preventDefault();
		var p = $(this).attr("data");
		var v = $(this).text();
		$("#"+p).val(v);
		$(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");
	});

	$(document).on("click", "#sd-model-popup .form-popup-content ul li a", function(e){
		e.preventDefault();
		var p = $(this).attr("data");
		var v = $(this).text();
		$("#"+p).val(v);
		$(".form-overlap").removeClass("show");
		$(".form-popup").removeClass("show");
	});
	
	
	$("#header-search-brand-overlay").click(function(){
		$(".form-overlap").addClass("show");
		$("#header-brand-popup").addClass("show");
	});

	
	
	$("#header-search-model-overlay").click(function(){
		$(".form-overlap").addClass("show");
		$("#header-model-popup").addClass("show");
	});

	$("#sd-search-brand-overlay").click(function(){
		$(".form-overlap").addClass("show");
		$("#sd-brand-popup").addClass("show");
	});

	$("#sd-search-model-overlay").click(function(){
		$(".form-overlap").addClass("show");
		$("#sd-model-popup").addClass("show");
	});
	
	$("#header-brand-popup-input").on("keyup", function(e){
		myFilter("#header-brand-popup");
	});
	
	$(".accordion-block .accordion-header").on("click", function(e){
		if(!$(this).hasClass("opened")){
			$(".accordion-block .accordion-header").removeClass("opened");
			$(this).addClass("opened");	
		}
		else{
			$(this).removeClass("opened");
		}
		$(this).parents(".accordion-block").find(".accordion-body").slideToggle();
	});	

	$(".tab-header ul li:first-child a").addClass("actived");

	$(".tab-header ul li a").on("click", function(e){
		e.preventDefault();
		var t = $(this).attr("href");
		if(!$(this).hasClass("actived")){
			$(".tab-header ul li a").removeClass("actived");
			$(this).addClass("actived");
			$(".tab-content").hide();
			$(t).show();
		}

	});

	$('.file-upload input[type="file"]').change(function(e){
		var fileName = e.target.files[0].name;
		$(this).parents(".file-upload").find(".file-uploader-text").text(fileName).css("color","#000");
	});
});