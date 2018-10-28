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
	 * ********* var-sidebar ************
	 * =================================================
	 */
	function sidebar_btn() {
		let _width = $(window).width();
		if(_width > 1024){
			// 罩层隐藏
		}else{
			if(_width < 600){
				$("body.var-body-sidebar").removeClass("var-sidebar-mini");
			}
			if($("body.var-body-sidebar").hasClass("var-sidebar-normal")){
				// 罩层显示
			}
		}
	}
	$(".sidebar-btn").click(function(){
		let _width = $(window).width();
		if(_width > 1024){
			if($("body.var-body-sidebar").hasClass("var-sidebar-normal")){
				$("body.var-body-sidebar").removeClass("var-sidebar-normal");
			}
			$("body.var-body-sidebar").toggleClass("var-sidebar-mini");
		}else{
			if($("body.var-body-sidebar").hasClass("var-sidebar-mini")){
				$("body.var-body-sidebar").removeClass("var-sidebar-mini");
			}
			$("body.var-body-sidebar").toggleClass("var-sidebar-normal");
		}
	});
	
	
	
	
	
	
	
	
	
	
	/**
	 * =================================================
	 * ********* var-index ************
	 * =================================================
	 */
	$(".var-index").scroll(function() {
		let _top = $(this).scrollTop();

		if(_top > 50) {
			$(".var-redt-pagenav-btn-1").css("margin-top", "4px");
		} else {
			$(".var-redt-pagenav-btn-1").css("margin-top", "-44px");
		}

		if((_top + 50) > $(this)[0].scrollHeight - $(this).height()) {
			$(".var-redt-pagenav-btn-3").css("margin-top", "50px");
		} else {
			$(".var-redt-pagenav-btn-3").css("margin-top", "4px");
		}

	});
	$(".var-redt-pagenav-btn-1").click(function() {
		$(".var-index").animate({
			scrollTop: 0
		}, 500);
	});
	$(".var-redt-pagenav-btn-2").click(function() {
		$(".var-redt-pagenav").toggleClass("var-redt-pagenav-block");
	});
	$(".var-redt-pagenav-btn-3").click(function() {
		$(".var-index").animate({
			scrollTop: $(".var-index")[0].scrollHeight - $(".var-index").height()
		}, 500);
	});
});