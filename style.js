/*
 * 获取网页高可见高 判断 是否存在滚动条 
 * 存在 宽 减去滚动条的宽 进行判断宽 
 * pc 平板  手机
 */

$(function() {
	window.onresize = body_;
	function body_() {
		if(navigator.userAgent.match(/mobile/i)){
			var wide = 0;
		}else{			
			var wide = $(document).height() > $(window).height()? 17 : 0;
		}
		if($(window).width() > (1024 - wide)){
			$(".var-nav").css("display","none");
			if($(".logo-top").css("transform") == "matrix(1, 0, 0, 1, 0, 0)"){
				$(".var-body-sidebar").css({"width":"calc(100% - 80px)","padding-left":"80px"});
				$(".var-header").css("width","calc(100% - 80px)");
			}else{
				$(".var-body-sidebar").css({"width":"calc(100% - 300px)","padding-left":"300px"});
				$(".var-header").css("width","calc(100% - 300px)");
			}
		}else{
			if($(window).width() > (600 - wide) && $(window).width() < (1024 - wide)){
				$(".var-body-sidebar").css({"width":"calc(100% - 80px)","padding-left":"80px"});
				$(".var-header").css("width","calc(100% - 80px)");
				if($(".logo-top").css("transform") != "matrix(1, 0, 0, 1, 0, 0)"){
					$(".var-nav").css("display","block");
				}
			}else if($(window).width() < (600 - wide)){
				$(".var-body-sidebar").css({"width":"100%","padding-left":"0"});
				$(".var-header").css("width","100%");
			}
		}
	}
	
	$(".logo-top-a").click(function(){
		if($(".logo-top").css("transform") == "matrix(1, 0, 0, 1, 0, 0)"){
			$(".logo-top").css("transform","matrix(-1, 1.22465e-16, -1.22465e-16, -1, 0, 0)");
			$(".var-sidebar").css("width","299px");
			$(".var-logo-btn").css("height","35px");
			$(".var-logo-btn").find("a").css({"float":"right","padding-top":"0"});
			$(".var-logo-img").css({"width":"200px","height":"200px"})
			$(".nav-ul-li").css({"width":"calc(100% - 90px)","padding-left":"90px"});
			$(".var-nav-li").css("margin","0");
			$(".var-nav-li").find("a").css("text-align","left");
			$(".var-nav-li").find(".mdui-icon").css("float","left");
			$(".var-span").css("display","block");
			$(".var-nav").css("display","block");
		}else{
			$(".logo-top").css("transform","matrix(1, 0, 0, 1, 0, 0)");
			$(".var-sidebar").css("width","79px");
			$(".var-logo-btn").css("height","50px");
			$(".var-logo-btn").find("a").css({"float":"none","padding-top":"10px"});
			$(".var-logo-img").css({"width":"70px","height":"70px"})
			$(".nav-ul-li").css({"width":"100%","padding-left":"0"});
			$(".var-nav-li").css("margin","10px 0");
			$(".var-nav-li").find("a").css("text-align","center");
			$(".var-nav-li").find(".mdui-icon").css("float","none");
			$(".var-span").css("display","none");
			$(".var-nav").css("display","none");
		}
		setTimeout(function(){body_();},10);
	});
	
	$(".header-btn").click(function(){
		
	});
	
});