/**
 * =============================================
 * ********	主要内容	*************
 * =============================================
 **/
$(function() {
	window.onresize = body;

	function body() {
		sidear_btn_click();
	}

	$(".sidebar-drawer-btn").click(function() {
		if($(window).width() > 1024) {
			if($("body.sidebar-body").hasClass("sidebar-drawer-normal")) {
				$("body.sidebar-body").removeClass("sidebar-drawer-normal");
			}
			$("body.sidebar-body").toggleClass("sidebar-drawer-mini");
		} else {
			$("body.sidebar-body").toggleClass("sidebar-drawer-normal");
			$(".var-cover_layer").toggleClass("var-cover_layer-block");
		}
	});
	$(".sidebar-content-li").find("a").click(function() {
		if($("body.sidebar-body").hasClass("sidebar-drawer-normal")) {
			if($(window).width() < 1025) {
				$("body.sidebar-body").removeClass("sidebar-drawer-normal");
				$(".var-cover_layer").removeClass("var-cover_layer-block");
			}
		}
	});

	function sidear_btn_click() {
		if($(window).width() > 1024) {
			$(".var-cover_layer").removeClass("var-cover_layer-block");
		} else {
			if($("body.sidebar-body").hasClass("sidebar-drawer-normal")) {
				$(".var-cover_layer").addClass("var-cover_layer-block");
			}
			if($(window).width() < 600) {
				$("body.sidebar-body").removeClass("sidebar-drawer-mini");
			}
		}
	}

	$(".header-search-btn").click(function() {
		$(".index").toggleClass("index-search");
		if($(".var-search").css("margin-top") == "40px") {
			$(".var-search").css("margin-top", "0px");
			setTimeout(function() {
				$(".header").toggleClass("header-search");
			}, 300);
		} else {
			$(".header").toggleClass("header-search");
			setTimeout(function() {
				$(".var-search").css("margin-top", "40px");
			}, 1);
		}
	});

	function page_span() {
		var page_a = $(".page-navigator").find("li:last").find("a").text();
		var page_b = $(".page-navigator").find(".current").find("a").text();
		if(page_a == "下一页") {
			var page_c = $(".page-navigator").find("li:last").prev().find("a").text();
		} else {
			var page_c = page_a;
		}
		$(".page").find("div").html("<span>当前</span><input class='page-text-btn' type='text' placeholder='" + page_b + "'/><span> / " + page_c + " 页</span>");
	}
	page_span();
	
	$(".index").scroll(function() {
		var index_top = $(".index").scrollTop();
		if(index_top < 40){
			$(".var-other-nav").find("a:first").css("margin-top","-45px");
		}else{
			$(".var-other-nav").find("a:first").css("margin-top","5px");
			
		}
		if(index_top + 40 > $(".index")[0].scrollHeight - $(".index").height()){
			$(".var-other-nav").find("a:last").css("margin-top","50px");
		}else{
			$(".var-other-nav").find("a:last").css("margin-top","5px");			
		}
	});
	$(".var-other-nav").find("a:first").click(function(){
			$(".index").animate({scrollTop: 0}, 500);
	});
	$(".var-other-nav").find("a:last").click(function(){
		$(".index").animate({scrollTop: $(".index")[0].scrollHeight - $(".index").height()}, 500);
	});
	$(".other-a-btn").click(function(){
		$(".var-other-nav").toggleClass("other-block");
	});
	
});
/* 替换 头像 */
function comments(obj_1,obj_2){
	if(obj_2 != ""){
		$("#"+obj_1).find(".avatar").attr("src",obj_2);
	}
}











































/**
 * ========================================================
 * *********** 自定义滚动条兼容 IE8+	************
 * ========================================================
 */

//function Scroll_Bars(obj_1, obj_2) {
//	var Bars = "#" + obj_1;
//	var Bars_a = obj_2 == undefined ? ".Scroll-Bars" : "." + obj_2;
//	var v_s = $(Bars)[0].clientHeight / $(Bars)[0].scrollHeight;
//	if($(Bars)[0].clientHeight < $(Bars)[0].scrollHeight) {
//		$(Bars).html(function(i, y) {
//			return "<div class='Scroll-Bars'><a></a></div>" + y;
//		});
//		$(Bars).find(Bars_a).find("a").css("height", (v_s * 100) + "%");
//		$(Bars).on("scroll", function() {
//			$(Bars).find(Bars_a).find("a").css("top", (v_s * $(Bars).scrollTop()) + "px");
//		});
//		$(Bars).on("mousedown mousewheel DOMMouseScroll", function(e) {
//			e.stopPropagation();
//			var start = e.pageY;
//			var orginPostion = $(Bars).find(Bars_a).find("a").css("top");
//			var delta = (e.originalEvent.wheelDelta && (e.originalEvent.wheelDelta > 0 ? 1 : -1)) || (e.originalEvent.detail && (e.originalEvent.detail > 0 ? -1 : 1));
//			if(delta > 0) {
//				// 向上滚
//				console.log("wheelup");
//
//			} else if(delta < 0) {
//				// 向下滚
//				console.log("wheeldown");
//			}
//			$(document).mousemove(function(event) {
//				var end = event.pageY;
//				var currPostion = parseFloat(orginPostion) + (end - start);
//				if(currPostion <= 0) {
//					$(Bars).find(Bars_a).find("a").css("top", (v_s * $(Bars).scrollTop()) + "px");
//				} else {
//					$(Bars).scrollTop(currPostion * ($(Bars)[0].scrollHeight / $(Bars)[0].clientHeight));
//					$(Bars).find(Bars_a).css("top", $(Bars).scrollTop() + "px");
//				}
//			});
//			$(document).mouseup(function(event) {
//				$(document).off("mousemove")
//			});
//		});
//
//	}
//}
