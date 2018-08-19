/**
 * =============================================
 * ********	自定义弹窗	*************
 * =============================================
 **-/
function alert_Popup(obj_1, obj_2) {
	if(!$("div").hasClass("other-Popup")) {
		if(obj_2 == 1) {
			$("body").html(function(i, y) {
				return "<div class='other-Popup'>" +
					"<span>" + obj_1 + "</span>" +
					"</div>" + y;
			});
		} else if(obj_2 == 2) {
			$("body").html(function(i, y) {
				return "<div class='var-other-Popup'>" +
					"<div class='other-Popup'>" +
					"<span>" + obj_1 + "</span>" +
					"<div class='other-Popup-btn'>" +
					"<a class='other-Popup-btn-1'>确定</a>" +
					"</div>" +
					"</div>" +
					"</div>" + y;
			});
		} else if(obj_2 == 3) {
			$("body").html(function(i, y) {
				return "<div class='var-other-Popup'>" +
					"<div class='other-Popup'>" +
					"<span>" + obj_1 + "</span>" +
					"<div class='other-Popup-btn'>" +
					"<a class='other-Popup-btn-1'>确定</a>" +
					"<a class='other-Popup-btn-2'>取消</a>" +
					"</div>" +
					"</div>" +
					"</div>" + y;
			});
		}
		$(".other-Popup").css("transform", "translateY(-100%)");
		setTimeout(function() {
			$(".other-Popup").css("transform", "translateY(20px)");

			if(obj_2 == 1) {
				setTimeout(function() {
					$(".other-Popup").css("transform", "translateY(-100%)");
				}, 1000 * 2);
				setTimeout(function() {
					$(".other-Popup").remove();
				}, 1000 * 2 + 500);
			} else {
				$(".other-Popup-btn-1").click(function() {
					$(".other-Popup").css("transform", "translateY(-100%)");
					setTimeout(function() {
						$(".var-other-Popup").remove();
					}, 500);
				});
				$(".other-Popup-btn-2").click(function() {
					$(".other-Popup").css("transform", "translateY(-100%)");
					setTimeout(function() {
						$(".var-other-Popup").remove();
					}, 500);
				});
			}
		}, 100);
	}
}
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














































//$(function() {
//	window.onresize = drawer;
//
//	function drawer() {
//		if($(window).width() > 600) {
//			if($(window).width() > 1024) {
//				$(".var-nav").removeClass("var-nav-block");
//			} else if($(window).width() > 600) {
//				if($(".var-nav").hasClass("var-nav-block")) {
//					$(".var-sidebar").addClass("var-sidebar-normal");
//				}
//				if($(".var-sidebar").hasClass("var-sidebar-normal")) {
//					$(".var-nav").addClass("var-nav-block");
//				}
//			}
//		} else {
//			$(".var-sidebar").removeClass("var-sidebar-normal");
//			$(".var-sidebar").removeClass("var-sidebar-mini");
//			$("body.var-body-sidebar").removeClass("var-body-sidebar-mini");
//			if(!$(".var-sidebar").hasClass("var-sidebar-block")) {
//				$(".var-nav").removeClass("var-nav-block");
//			}
//		}
//	}
//	$(".sidebar-btn").click(function() {
//		if($(window).width() > 1024) {
//			$(".var-sidebar").toggleClass("var-sidebar-mini");
//			$("body.var-body-sidebar").toggleClass("var-body-sidebar-mini");
//		} else if($(window).width() > 600) {
//			$(".var-sidebar").toggleClass("var-sidebar-normal");
//			$(".var-nav").toggleClass("var-nav-block");
//		} else {
//			$(".var-sidebar").toggleClass("var-sidebar-block");
//			$(".var-nav").toggleClass("var-nav-block");
//		}
//	});
//
//	$(".var-nav-li").find("a").click(function() {
//		$(".var-sidebar").removeClass("var-sidebar-normal");
//		$(".var-sidebar").removeClass("var-sidebar-block");
//		$(".var-nav").removeClass("var-nav-block");
//	});
//
//	$(".search-btn").click(function() {
//		$(".var-header-search").toggleClass("var-header-search-block");
//		$("body.var-body-header").toggleClass("var-body-header-search");
//		$(".var-header-index").toggleClass("var-header-index-search");
//	});
//
//	$(".other-btn").click(function() {
//		$(".other-btn").removeClass("other-btn-x");
//		$(this).addClass("other-btn-x");
//		$(".other-content-span").removeClass("other-content-span-block");
//		switch($(this).text()) {
//			case "最近回复":
//				$(".span-1").addClass("other-content-span-block");
//				break;
//			case "最新文章":
//				$(".span-2").addClass("other-content-span-block");
//				break;
//			case "分类":
//				$(".span-3").addClass("other-content-span-block");
//				break;
//			case "归档":
//				$(".span-4").addClass("other-content-span-block");
//				break;
//			default:
//				break;
//		}
//	});
//
//	$(".var-header-index").scroll(function() {
//		var index_top = $(".var-header-index").scrollTop();
//		if(index_top > 0) {
//			$(".var-other-btn").find("a:first").css("margin-top", "0px");
//		} else {
//			$(".var-other-btn").find("a:first").css("margin-top", "-60px");
//		}
//		if(index_top == $(".var-header-index")[0].scrollHeight - $(".var-header-index").height()) {
//			$(".var-other-btn").find("a:last").css("margin-top", "60px");
//		} else {
//			$(".var-other-btn").find("a:last").css("margin-top", "0px");
//		}
//		$(".var-other").css("top", index_top + "px");
//	});
//
//	$(".var-other-btn").find("a:first").click(function() {
//		$(".var-header-index").animate({
//			scrollTop: 0
//		}, 300);
//	});
//
//	$(".var-other-btn").find("a:last").click(function() {
//		$(".var-header-index").animate({
//			scrollTop: $(".var-header-index")[0].scrollHeight
//		}, 300);
//	});
//
//	$(".var-other-btn-div").find("a").click(function() {
//		$(".var-other-btn").toggleClass("ul-block");
//	});
//
//	$(".other-btn-span").click(function() {
//		function other_btn_span(obj_1) {
//			$(".other-btn").removeClass("other-btn-x");
//			$(".other-content-span").removeClass("other-content-span-block");
//			$(".other-btn-" + obj_1).addClass("other-btn-x");
//			$(".span-" + obj_1).addClass("other-content-span-block");
//		}
//		switch($(this).text()) {
//			case "文章":
//				other_btn_span('1');
//				break;
//			case "回复":
//				other_btn_span('2');
//				break;
//			case "分类":
//				other_btn_span('3');
//				break;
//			case "归档":
//				other_btn_span('4');
//				break;
//			default:
//				break;
//		}
//		if($(window).width() < 1320) {
//			$(".var-other").css("top", "0");
//			$(".var-other").toggleClass("var-other-block");
//		}
//	});
//	$(".var-other").click(function() {
//		$(".var-other").toggleClass("var-other-block");
//	});
//});

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