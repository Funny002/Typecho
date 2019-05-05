if(document.readyState == "complete"){
	$("#loding").remove();
}else{	
	setTimeout("loding(1)",500);
}
function loding(obj_1){
	if(document.readyState == "complete") {
		$("#loding").remove();
	}else{
		if(obj_1 > 6){
			$("#loding").remove();
		}else{
			setTimeout("loding("+(obj_1+1)+")",500);
		}
	}
}

$(function() {
	window.onresize = _body;
	
	function _body() {
		let width_ = $(window).width();
		sidebar_(width_);
	}
	/**
	 * =================================================
	 * ********* header ************
	 * =================================================
	 */

	$(".search-btn").click(function() {
		$(".var-search").toggleClass("search-block");
	});
	/**
	 * =================================================
	 * ********* sidebar ************
	 * =================================================
	 */
	function sidebar_(obj_1) {
		if(obj_1 >= 1024) {
			$(".var-sidebar-nav").removeClass("var-sidebar-nav-block");
		} else {
			if(obj_1 <= 600) {
				$(".body-sidebar").removeClass("sidebar-mini");
			}
			if($(".body-sidebar").hasClass("sidebar-normal")) {
				$(".var-sidebar-nav").addClass("var-sidebar-nav-block");
			}
		}
	}
	$(".sidebar-btn").click(function() {
		let width_ = $(window).width();
		if(width_ > 1024) {
			if($(".body-sidebar").hasClass("sidebar-normal")) {
				$(".body-sidebar").removeClass("sidebar-normal");
			}
			$(".body-sidebar").toggleClass("sidebar-mini");
		} else {
			if($(".body-sidebar").hasClass("sidebar-mini")) {
				$(".body-sidebar").removeClass("sidebar-mini");
			}
			$(".body-sidebar").toggleClass("sidebar-normal");
			$(".var-sidebar-nav").toggleClass("var-sidebar-nav-block");
		}
	});
	/**
	 * =================================================
	 * ********* index ************
	 * =================================================
	 */
	$(".var-index").scroll(function() {
		let scroll_top = $(this).scrollTop(); // scrollTop 不可视高
		let scroll_top_max = $(this)[0].scrollHeight - $(this).outerHeight(); // 不可视高的最大值
		if(scroll_top < 50) {
			$(".var-page--nav").find(".pagenav-btn-1").css("margin-top", "-42px");
		} else {
			$(".var-page--nav").find(".pagenav-btn-1").css("margin-top", "5px");
			if(scroll_top == scroll_top_max) {
				$(".var-footer").addClass("footer-block");
				$(".var-page--nav").find(".pagenav-btn-2").css("margin-top", "52px");
			} else {
				$(".var-footer").removeClass("footer-block");
				$(".var-page--nav").find(".pagenav-btn-2").css("margin-top", "5px");
			}
		}
	});
	if($(".var-index")[0].scrollHeight - $(".var-index").outerHeight() == 0) {
		$(".var-footer").addClass("footer-block");
	} else {
		$(".var-footer").removeClass("footer-block");
	}
	$(".var-page--nav").find(".pagenav-btn-1").click(function() {
		$(".var-index").animate({
			scrollTop: 0
		}, 500);
	});
	$(".var-page--nav").find(".pagenav-btn-2").click(function() {
		$(".var-index").animate({
			scrollTop: $(".var-index")[0].scrollHeight
		}, 500);
	});
	$(".var-page--nav").find(".pagenav-btn-3").click(function() {
		$(".var-page--nav").toggleClass("pagenav-block");
	});
	/**
	 * =================================================
	 * ********* themes ************
	 * =================================================
	 */
	if(localStorage.getItem("themes") != null) {
		themes_chushihua();
	}

	function themes_chushihua() { // 初始化
		var json_ = eval("(" + localStorage.getItem("themes") + ")"); // json
		if(json_.layout != undefined && json_.layout != "null") {
			$("body").addClass(json_.layout);
			$(".themes-color input").eq(1).attr("checked", "checked");
		}
		$(".mdui-text-color-" + json_.primary.split("-primary-")[1]).find("input").click();
		$(".mdui-text-color-" + json_.accent.split("-accent-")[1] + "-accent").find("input").click();
		json_ = [
			["layout", json_.layout],
			["primary", json_.primary],
			["accent", json_.accent]
		];
		var body_class = $("body").attr("class").split(" "); //  body 的 class 分割成数组
		for(let i = 0; i < body_class.length; i++) {
			for(let j = (json_.length - 1); j > 0; j--) {
				if(body_class[i].indexOf(json_[j][0]) > -1) {
					body_class[i] = json_[j][1];
				}
			}
		}
		$("body").attr("class", "");
		for(let i = 0; i < body_class.length; i++) {
			$("body").addClass(body_class[i]);
		}
	}

	$(".themes-btn").click(function() { // 动画
		$("body").addClass("body-themes");
	});
	$(".var-themes-btn").find("a:first").click(function() { /* 重置 */
		$(".themes-color").find("input").eq(0).click();
		$(".themes-main-color").find("input").eq(5).click();
		$(".themes-accent-color").find("input").eq(0).click();
	});
	$(".var-themes-btn").find("a:last").click(function() { /* 确定 */
		$("body").removeClass("body-themes");
		var body_class = $("body").attr("class").split(" ");
		var body_json = [
			["layout", "null"],
			["primary", "null"],
			["accent", "null"]
		];
		for(var i = 0; i < body_class.length; i++) {
			for(var j = 0; j < body_json.length; j++) {
				if(body_class[i].indexOf(body_json[j][0]) > -1) {
					body_json[j][1] = body_class[i];
				}
			}
		}
		body_class = "{";
		for(var i = 0; i < body_json.length; i++) {
			if((i + 1) == body_json.length) {
				body_class += '"' + body_json[i][0] + '":"' + body_json[i][1] + '"}';
			} else {
				body_class += '"' + body_json[i][0] + '":"' + body_json[i][1] + '",';
			}
		}
		localStorage.setItem("themes", body_class);
	});
	$(".var-themes-form").find("input").click(function() {
		var form_class = $(this).parents("form").attr("class");
		var input_class = ""
		switch(form_class) {
			case "themes-color":
				input_class = "mdui-theme-layout-" + $(this).val();
				form_class = "-layout-";
				break;
			case "themes-main-color":
				input_class = "mdui-theme-primary-" + $(this).val();
				form_class = "-primary-";
				break;
			case "themes-accent-color":
				input_class = "mdui-theme-accent-" + $(this).val();
				form_class = "-accent-";
				break;
			default:
				break;
		}
		themes_class(input_class, form_class);
	});

	function themes_class(obj_1, obj_2) {
		var body_class = $("body").attr("class").split(" ");
		var class_length = body_class.length;
		if(obj_1.indexOf("mdui-theme-layout-") > -1) {
			if(obj_1.indexOf("dark") > -1) {
				$("body").addClass("mdui-theme-layout-dark");
			} else {
				$("body").removeClass("mdui-theme-layout-dark");
			}
		} else {
			for(var i = 0; i < class_length; i++) {
				if(body_class[i].indexOf(obj_2) > -1) {
					body_class[i] = obj_1;
				}
			}
			$("body").attr("class", "");
			for(var i = 0; i < class_length; i++) {
				$("body").addClass(body_class[i]);
			}
		}
	}

	/**
	 * =================================================
	 * ********* pjax ************
	 * =================================================
	 */
	$("a").click(function() {
		event.preventDefault();
		var href_ = $(this).attr("href");
		if(href_ != undefined) {
			$.pjax({
				url: href_,
				fragment: '#var-index',
				container: "#var-index",
				timeout: 1000
			});
		}
	});
	/**
	 * =================================================
	 * ********* comments ************
	 * =================================================
	 */
	$(".var-comments-body>form").find("input[type='submit']").click(function(){
		console.log($(this).val());
	});
	
	
	
	//	$("a").click(function() {
	//		var _href = $(this).attr("href"); //获取地址
	//		if($(this).parents("code")) {
	//			event.preventDefault();
	//			$.pjax({
	//				url: _href,
	//				fragment: '#var-index',
	//				container: "#var-index",
	//				timeout: 8000
	//			});
	//		}
	//		//		.on('pjax:send', function() {
	//		//			
	//		//		}).on("pjax:complete", function() {
	//		//			
	//		//		});
	//	});
});
