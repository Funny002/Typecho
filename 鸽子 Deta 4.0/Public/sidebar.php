<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="var-sidebar sidebar-logo">
    <div class="var-sidebar-logo">
        <div>
            <img src="<?php $this->options->themeUrl($this->options->logoUrl ? '' : 'Image/logo.png'); ?>" alt="logo"/>
        </div>
    </div>
    <!-- logo -->
    <div class="var-sidebar-container">
        <span><?php $this->options->description() ?></span>
        <div class="var-sidebar-menu">
            <span class="var-sidebar-menu-bar"><!-- 滑块 --></span>
            <?php
            $data = $this->widget('Widget_Contents_Page_List')->stack;
            $menu = array(array('icon' => 'home', 'name' => '首页', 'link' => '/'));
            foreach ($data as $k => $v) array_push($menu, array(
                'name' => $v['title'],
                'link' => $v['permalink'],
                'icon' => sidebar_menu_icon($v['title']), // 图标
            ));
            for ($i = 0; $i < count($menu); $i++) {
                $v = $menu[$i]; // 定义位置
                echo "<a class='var-sidebar-menu-list' data-index='" . $i . "' href='" . $v['link'] . "'>
                      <i class='fa fa-fw fa-lg fa-" . $v['icon'] . "'></i>
                      <span>" . $v['name'] . "</span>
                  </a>";
            }
            ?>
            <!-- 菜单快速生成 -->
        </div>
        <div class="var-sidebar-but">
            <a title="文章 RSS" href="<?php $this->options->feedUrl(); ?>">
                <i class="fa fa-fw fa-lg fa-rss"></i>
            </a>
            <a title="Github" href="https://github.com/Funny002/Typecho">
                <i class="fa fa-fw fa-lg fa-github"></i>
            </a>
            <!-- 底部图标 -->
        </div>
    </div>
</div>
<div class="var-sidebar-nav var-sidebar-btn"><!-- Sidebar & 单独罩层 --></div>
<!-- #end sidebar -->