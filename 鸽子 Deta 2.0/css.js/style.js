$(function() {
	window.onresize = _body;

	function _body() {
		sidebar_btn();
	}
	$(".var-search-btn").click(function() {
		$(".var-search").toggleClass("var-search-block");
	});
	/**
	 * =================================================
	 * ********* sidebar ************
	 * =================================================
	 */
	function sidebar_btn() {
		let _width = $(window).width();
		if(_width > 1024) {
				$(".var-sidebar-nav").removeClass("var-sidebar-nav-block");
		} else {
			if(_width < 600) {
				$("body.var-body-sidebar").removeClass("var-sidebar-mini");
			}
			if($("body.var-body-sidebar").hasClass("var-sidebar-normal")) {
				$(".var-sidebar-nav").addClass("var-sidebar-nav-block");
			}
		}
	}
	$(".sidebar-btn").click(function() {
		let _width = $(window).width();
		if(_width > 1024) {
			if($("body.var-body-sidebar").hasClass("var-sidebar-normal")) {
				$("body.var-body-sidebar").removeClass("var-sidebar-normal");
			}
			$("body.var-body-sidebar").toggleClass("var-sidebar-mini");
		} else {
			if($("body.var-body-sidebar").hasClass("var-sidebar-mini")) {
				$("body.var-body-sidebar").removeClass("var-sidebar-mini");
			}
			$(".var-sidebar-nav").toggleClass("var-sidebar-nav-block");
			$("body.var-body-sidebar").toggleClass("var-sidebar-normal");
		}
	});
	/**
	 * =================================================
	 * ********* redt ************
	 * =================================================
	 */
	/* pagenav */
	$(".var-index").scroll(function(){
		let top_ = $(this).scrollTop();
		let _top = $(this)[0].scrollHeight - $(this).height();
		if(top_ >= 50){
			$(".var-pagenav-btn-1").css("margin-top","5px");
		}else{
			$(".var-pagenav-btn-1").css("margin-top","-45px");
		}
		if(top_ + 50 <= _top){
			if(top_ + 50 >= _top){
				$(".var-pagenav-btn-3").css("margin-top","50px");
			}else{
				$(".var-pagenav-btn-3").css("margin-top","5px");
			}
		}
	});
	$(".var-pagenav-btn-1").click(function(){
		$(".var-index").animate({
			scrollTop: 0 }, 500);
	});
	$(".var-pagenav-btn-2").click(function(){
		$(".var-pagenav").toggleClass("var-pagenav-block");
	});
	$(".var-pagenav-btn-3").click(function(){
		$(".var-index").animate({
			scrollTop: $(".var-index")[0].scrollHeight - $(".var-index").height()
		}, 500);
	});
	$(".var-pagenav-div").find("li>span").click(function(){
		let class_ = parseInt($(this).attr("class").split("-")[2]);
		redt_pagenav(class_);
	});
	$(".var-pagenav-content-top").find("span").click(function(){
		let class_ = parseInt($(this).attr("class").split("-")[2]);
		redt_pagenav(class_);
	});
	function redt_pagenav(obj_1){
		if(!$(".var-pagenav-content-nav").hasClass("var-pagenav-content-nav-block")){
			$(".var-pagenav-content-nav").addClass("var-pagenav-content-nav-block");
		}
		$(".var-pagenav-content").addClass("var-pagenav-content-block");
		$(".var-pagenav-content-ul>ul").removeClass("pagenav-ul-btn");
		$(".var-pagenav-content-top>span").removeClass("pagenav-span-btn");
		$(".var-pagenav-content-ul>ul").eq(obj_1).addClass("pagenav-ul-btn");
		$(".var-pagenav-content-top>span").eq(obj_1).addClass("pagenav-span-btn");
	}
	
	$(".var-pagenav-content-nav").click(function(){
		$(".var-pagenav-content").removeClass("var-pagenav-content-block");
		$(".var-pagenav-content-nav").removeClass("var-pagenav-content-nav-block");
	});
	
	/* themes */
	$(".redt-themes-none-btn").click(function() { /* 动画按钮 */
		themes_animation();
	});
	$(".themes-btn").click(function() { /* 确定 btn */
		var body_ = $("body").attr("class").split(" ");
		for(var i = 0; i < body_.length; i++) {
			if(body_[i].indexOf("-layout-") >= 0) {
				localStorage.setItem("layout", body_[i]);
			} else if(body_[i].indexOf("-primary-") >= 0) {
				localStorage.setItem("primary", body_[i]);
			} else if(body_[i].indexOf("-accent-") >= 0) {
				localStorage.setItem("accent", body_[i]);
			}
		}
		themes_animation();
	});
	$(".themes-but").click(function() { /* 重置 btn */
		$(".themes-color").find("input").eq(0).click();
		$(".themes-main-color").find("input").eq(5).click();
		$(".themes-accent-color").find("input").eq(0).click();
	});

	function themes_animation() { /* div 动画 */
		if($(".var-redt-themes").hasClass("var-redt-themes-block")) {
			$(".var-redt-themes").addClass("var-redt-themes-none");
			setTimeout(function() {
				$(".var-redt-themes").removeClass("var-redt-themes-block var-redt-themes-none");
			}, 450);
		} else {
			$(".var-redt-themes").addClass("var-redt-themes-block");
		}

		if($(".var-redt-themes-nav").hasClass("var-redt-themes-nav-block")) {
			$(".var-redt-themes-nav").addClass("var-redt-themes-nav-none");
			setTimeout(function() {
				$(".var-redt-themes-nav").removeClass("var-redt-themes-nav-block var-redt-themes-nav-none");
			}, 450);
		} else {
			$(".var-redt-themes-nav").addClass("var-redt-themes-nav-block");
		}
	}

	$(".var-themes-form input").click(function() {
		var form_ = $(this).parents("form").attr("class");
		if(form_ == "themes-color") {
			form_ = "mdui-theme-layout-" + $(this).val();
		} else if(form_ == "themes-main-color") {
			form_ = "mdui-theme-primary-" + $(this).val();
		} else if(form_ == "themes-accent-color") {
			form_ = "mdui-theme-accent-" + $(this).val();
		}
		themes_(form_);
	});
	/* 初始化主题 */
	themes_(0);

	function themes_(obj_1) {
		var body_ = $("body").attr("class").split(" ");
		var body_len = body_.length;
		var body_class = "";
		if(obj_1 == 0) {
			var array_ = [
				["layout", localStorage.getItem("layout")],
				["primary", localStorage.getItem("primary")],
				["accent", localStorage.getItem("accent")]
			];
			if(array_[0][1] != "null") {
				body_[body_len] = array_[0][1];
				$(".themes-color input").eq(1).attr("checked", "checked");
			}
			for(var i = 0; i < body_len; i++) {
				for(var j = 0; j < 3; j++) {
					if(body_[i].indexOf(array_[j][0]) >= 0) {
						body_[i] = array_[j][1];
					}
				}
			}
			themes_input(array_);
			body_len_(body_);
		} else {
			if(obj_1.indexOf("mdui-theme-layout-") >= 0) {
				if(obj_1.indexOf("dark") >= 0) {
					$("body").addClass("mdui-theme-layout-dark");
				} else {
					localStorage.setItem("layout", "null");
					$("body").removeClass("mdui-theme-layout-dark");
				}
			} else {
				var obj_2 = obj_1.split("-")[2];
				for(var i = 0; i < body_len; i++) {
					if(body_[i].indexOf(obj_2) >= 0) {
						body_[i] = obj_1;
					}
				}
				body_len_(body_);
			}
		}

	}

	function themes_input(obj_1) {
		var a = obj_1[1][1];
		var b = obj_1[2][1];
		var c = $(".themes-main-color").find("input").length;
		var d = $(".themes-accent-color").find("input").length;
		for(var i = 0; i < c; i++) {
			var j = $(".themes-main-color").find("input").eq(i);
			if(a == "mdui-theme-primary-" + j.val()) {
				j.attr("checked", "checked");
			}
		}
		for(var i = 0; i < d; i++) {
			var j = $(".themes-accent-color").find("input").eq(i);
			if(b == "mdui-theme-accent-" + j.val()) {
				j.attr("checked", "checked");
			}
		}

	}

	function body_len_(obj_1) {
		var body_len = obj_1.length;
		var body_class = "";
		for(var i = 0; i < body_len; i++) {
			if(i + 1 == body_len) {
				body_class += obj_1[i];
			} else {
				body_class += obj_1[i] + " ";
			}
		}
		$("body").attr("class", body_class);
	}
	/**
	 * =================================================
	 * ********* pjax ************
	 * =================================================
	 */
	$("a").click(function() {
		var _href = $(this).attr("href"); //获取地址
		if($(this).parents("code")) {
			event.preventDefault();
			$.pjax({
				url: _href,
				fragment: '#var-index',
				container: "#var-index",
				timeout: 8000
			});
		}
		//		.on('pjax:send', function() {
		//			
		//		}).on("pjax:complete", function() {
		//			
		//		});
	});
});