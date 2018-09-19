/**
 * =============================================
 * ********	主要内容	*************
 * =============================================
 **/

$(function() {
	window.onresize = body;
	function body() {
		if($(window).width() > 1024) {
			$(".sidebar-nav").removeClass("sidebar-nav-block");
		} else {
			if($(window).width() > 600) {
				if($("body").hasClass("var-body-sidebar-normal")) {
					$(".sidebar-nav").addClass("sidebar-nav-block");
				}
			} else {
				$("body").removeClass("var-body-sidebar-mine");
			}
		}
	}
	$(".sidebar-btn").click(function() {
		if($(window).width() > 1024) {
			if($("body").hasClass("var-body-sidebar-normal")) {
				$("body").removeClass("var-body-sidebar-normal");
			}
			$("body").toggleClass("var-body-sidebar-mine");
		} else {
			if($("body").hasClass("var-body-sidebar-mine")) {
				$("body").removeClass("var-body-sidebar-mine");
			}
			$("body").toggleClass("var-body-sidebar-normal");
			$(".sidebar-nav").toggleClass("sidebar-nav-block");
		}
	});
	/* | end #sidebar | */
	var index_scrollheight = $(".var-index")[0].scrollHeight - $(".var-index").height();

	$(".var-index").scroll(function() {
		var top = $(".var-index").scrollTop();
		if(top < 50) {
			$(".var-other-btn-1").css("margin-top", "-50px");
		} else {
			$(".var-other-btn-1").css("margin-top", "5px");
		}
		if($(".var-index")[0].scrollHeight > ($(".var-index").height() + 50)) {
			if(top > (index_scrollheight - 50)) {
				$(".var-other-btn-2").css("margin-top", "60px");
			} else {
				$(".var-other-btn-2").css("margin-top", "5px");
			}
		}
	});

	$(".var-search-btn").click(function() {
		$(".var-search").toggleClass("var-search-block");
	});
	$(".var-other-btn").click(function() {
		$(".var-other-div").toggleClass("var-other-div-block");
		$(".var-other-nav").toggleClass("var-other-nav-block");
	});
	$(".var-other-btn-1").click(function() {
		$(".var-index").animate({
			scrollTop: 0
		}, 300);
	});
	$(".var-other-btn-2").click(function() {
		$(".var-index").animate({
			scrollTop: index_scrollheight
		}, 300);
	});
	/*| end #sidebar -> other-nav |*/
});

//});
/* 替换 头像 */
function comments(obj_1, obj_2) {
	if(obj_2 != "") {
		$("#" + obj_1).find(".avatar").attr("src", obj_2);
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