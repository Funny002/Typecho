$(function () {
    $('#lading').remove(); // 去掉 lading

    /**
     * ====================================================================
     * ===================  Header & 工具栏  =============================
     * ====================================================================
     */
    /** === === === 登录 & 注册 === === ===*/
    $(".var-sign-btn-to").click(function () {
        $('.var-sign').toggleClass('sign-up');
    });
    /** === === === search & 查询 === === ===*/
    $(".var-search-btn").click(function () {
        $('.var-search').toggleClass('search-block');
    });
    $(".var-search-container").click(function (event) {
        event.stopPropagation(); // 阻止事件冒泡
    });
    /** === === === site & 设置 === === ===*/
    $('.var-site-btn').click(function () {
        $('.var-site').toggleClass('site-block')
    });
    $(".var-site-container").click(function (event) {
        event.stopPropagation(); // 阻止事件冒泡
    });

    /**
     * ====================================================================
     * ===================  Sidebar & 抽屉  =============================
     * ====================================================================
     */
    function sidebar_size(is) {
        is = is === true;
        const this_ = $('body');
        const w = document.body.clientWidth;
        if (is) {
            this_.toggleClass(w > 1024 ? 'sidebar-mini' : 'sidebar-block');
        } else {
            this_.removeClass(w > 1024 ? 'sidebar-block' : 'sidebar-mini');
        }
    }

    /** === === === resize 监听窗口变化 === === ===*/
    $(window).resize(function () {
        sidebar_size();
    });
    /** === === === btn 按钮 === === ===*/
    $('.var-sidebar-btn').click(function () {
        sidebar_size(true)
    });
    /** === === === menu 菜单 === === ===*/
    $('.var-sidebar-menu-list').hover(function () {
        const index = $(this).attr('data-index');
        $('.var-sidebar-menu-bar').css('margin-top', index * 35 + 'px');
    });

    /**
     * ====================================================================
     * ===================  Site & 设置  ================================
     * ====================================================================
     */
    function local_site(key, is) {
        let data = localStorage.getItem('site');
        if (data === null && is) {
            localStorage.setItem('site', JSON.stringify({key: true}));
        } else {
            data = JSON.parse(data);
            data[key] = is;
            localStorage.setItem('site', JSON.stringify(data));
        }
    }

    /** === === === Sidebar & 抽屉 === === ===*/
    $(".var-site-list-title > .label input").click(function () {
        const is = $(this).val();
        let id = $('.var-sidebar');
        if (is !== id.hasClass('sidebar-logo') + '') {
            id.toggleClass('sidebar-logo');
            /* === 重写设置 === */
            local_site('sidebar_style', is === 'false');
        }
    });
    /** === === === body & 抽屉 === === ===*/
    $(".var-site-list-title > .switch").click(function () {
        let id = $(this).parents('.var-site-list');
        id.toggleClass('body-block');
        /* === 重写设置 === */
        const id_ = $('body');
        id_.toggleClass('before-blur');
        let is = id_.hasClass('before-blur');
        if (is) is = {'crystal': true, 'img': '/usr/themes/default/image/background.png'};
        id_.css('background-image', 'url("' + is.img + '")');
        local_site('body_style', is);
    });
    /** === === === index & 首页 === === ===*/
    $(function () {
        $('.var-page-value').keydown(function (e) {
            if (e.keyCode === 13) $('.var-page-btn').click();
        });
        $('.var-page-btn').click(function () {
            const max = $(this).attr('data-val');
            const link = $(this).attr('data-link');
            const val = parseInt($('.var-page-value').val());
            if (val + '' !== 'NaN') {
                if (val > 0 && val <= max) {
                    window.location.href = link + val; // 跳转分页
                } else {
                    window.location.href = '/'; // 跳转首页
                }
            } else {
                console.log('No'); // 无效
            }
        });
    });
    /**
     * ====================================================================
     * ===================  comment & 评论  ================================
     * ====================================================================
     */
    /** === === === comment & 回复 === === ===*/
    (function () {
        const link = window.location.href;
        if (link.indexOf('replyTo') >= 0) {
            const len = (link.substring(link.indexOf('replyTo'))).split(/[=#]/)[1] - 0;
            const id = $('#comment-' + len).find('.comment-list-user-name > a');
            const id_ = $('.comment-body-top-reply > a').eq(0);
            id_.attr('href', id.attr('data-id'));
            id_.text(id.text());
        }
    })();
});