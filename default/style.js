$(function() {

	function Normal_Drawer() { /*| 正常 抽屉|*/
		$(".logo-top").css("transform", "matrix(-1, 1.22465e-16, -1.22465e-16, -1, 0, 0)");
		$(".var-sidebar").css("width", "299px");
		$(".var-logo-btn").css("height", "35px");
		$(".var-logo-btn").find("a").css({"float": "right","padding-top": "0"});
		$(".var-logo-img").css({"width": "200px","height": "200px"});
		$(".nav-ul-li").css({"width": "calc(100% - 90px)","padding-left": "90px"});
		$(".var-nav-li").css("margin", "0");
		$(".var-nav-li").find("a").css("text-align", "left");
		$(".var-nav-li").find(".mdui-icon").css("float", "left");
		$(".var-span").css("display", "block");
		$(".var-nav").css("display", "block");
	}

	function Mini_Drawer() { /*| 迷你 抽屉|*/
		$(".logo-top").css("transform", "matrix(1, 0, 0, 1, 0, 0)");
		$(".var-sidebar").css("width", "79px");
		$(".var-logo-btn").css("height", "50px");
		$(".var-logo-btn").find("a").css({"float": "none","padding-top": "10px"});
		$(".var-logo-img").css({"width": "70px","height": "70px"})
		$(".nav-ul-li").css({"width": "100%","padding-left": "0"});
		$(".var-nav-li").css("margin", "10px 0");
		$(".var-nav-li").find("a").css("text-align", "center");
		$(".var-nav-li").find(".mdui-icon").css("float", "none");
		$(".var-span").css("display", "none");
		$(".var-nav").css("display", "none");
	}

	function Testing_Drawer() {	/*| 检测  抽屉状态|*/
		if(navigator.userAgent.match(/mobile/i)) {
			var wide = 0;
		} else {
			var wide = $(document).height() > $(window).height() ? 17 : 0;
		}
		if($(window).width() < (600 - wide)) {
			$(".var-body-sidebar").css({"width": "100%","padding-left": "0"});
			$(".var-header").css("width", "100%");
			if($(".var-nav").css("display") == "none") {
				$(".var-sidebar").css("transform", "translateX(-300px)");
				Mini_Drawer();
			} else {
				$(".var-sidebar").css("transform", "translateX(0)");
				Normal_Drawer()
			}
			console.log($(".logo-top").css("transform"));
		} else {
			$(".var-sidebar").css("transform", "translateX(0)");
			if($(window).width() > (1024 - wide)) {
				$(".var-nav").css("display", "none");
				if($(".logo-top").css("transform") == "matrix(1, 0, 0, 1, 0, 0)") {
					$(".var-body-sidebar").css({"width": "calc(100% - 80px)","padding-left": "80px"});
					$(".var-header").css("width", "calc(100% - 80px)");
				} else {
					$(".var-body-sidebar").css({"width": "calc(100% - 300px)","padding-left": "300px"
					});
					$(".var-header").css("width", "calc(100% - 300px)");
				}
			} else {
				$(".var-body-sidebar").css({"width": "calc(100% - 80px)","padding-left": "80px"});
				$(".var-header").css("width", "calc(100% - 80px)");
				if($(".logo-top").css("transform") != "matrix(1, 0, 0, 1, 0, 0)") {
					$(".var-nav").css("display", "block");
				}
			}
		}
	}

	window.onresize = Testing_Drawer;

	$(".logo-top-a").click(function() {
		if(navigator.userAgent.match(/mobile/i)) {
			var wide = 0;
		} else {
			var wide = $(document).height() > $(window).height() ? 17 : 0;
		}
		if($(window).width() < (600 - wide)) { /*| 小于 600 的显示 与 隐藏 |*/
			if($(".var-nav").css("display") == "none") {
				$(".var-nav").css("display", "block");
				$(".var-sidebar").css("transform", "translateX(0)");
			} else {
				$(".var-nav").css("display", "none");
				$(".var-sidebar").css("transform", "translateX(-300px)");
			}
		} else { /*| 大于 600 的切换 |*/
			if($(".logo-top").css("transform") == "matrix(1, 0, 0, 1, 0, 0)") {
				Normal_Drawer();
			} else {
				Mini_Drawer();
			}
		}
		setTimeout(function() {
			Testing_Drawer();
		}, 10);
	});
});

function Search(){
	if($(".search").css("display") == "none"){
		$(".search").css("display","block");
	}else{
		$(".search").css("display","none");		
	}
}

/**-/
$("input#email").blur(function() {
  var _email = $(this).val();
  if (_email != '') {
    $.ajax({
      type: 'GET',
      data: {
        action: 'ajax_avatar_get',  
        form: ajaxurl, // 修改为你的Ajax路径
        email: _email
      },
      success: function(data) {
        $('.avatar').attr('src', data); // 修改为你自己的头像标签
      }
    }); // end ajax
  }
  return false;
});
/**/