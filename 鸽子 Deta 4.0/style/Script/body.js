/*
 * @Author: Funny
 * @LastEditors: Do not edit
 * @since: 2019-05-04 22:30:46
 * @LastEditTime: 2019-05-05 17:43:40
 */
/**
 * =========================================================
 * =================  header  =================
 * =========================================================
 */
$(function () {
    window.onresize = function () {
        let window_w = $(window).width();
        if (window_w > 1024) {
            if ($("body").hasClass("var-sidebar-big")) {
                $("body").removeClass("var-sidebar-big");
            }
        } else {
            if ($("body").hasClass("var-sidebar-small")) {
                $("body").removeClass("var-sidebar-small");
            }
        }
    }

    $(".sidebar-btn").click(function () {
        let window_w = $(window).width();
        if (window_w > 1024) {
            if ($("body").hasClass("var-sidebar-small")) {
                $("body").removeClass("var-sidebar-small");
            } else {
                $("body").addClass("var-sidebar-small");
            }
        } else {
            if ($("body").hasClass("var-sidebar-big")) {
                $("body").removeClass("var-sidebar-big");
            } else {
                $("body").addClass("var-sidebar-big");
            }

        }
    });

})