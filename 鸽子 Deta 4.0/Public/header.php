<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<?php $this->need('/public/head.php'); ?>
<body class="body-sidebar">
<!--[if lte IE 9]>
<div class="body-index">当前网页样式部分或全部 <strong>不支持</strong> 你正在使用的浏览器，为了您的正常体验，请升级或更换你当前的浏览器。
    <style type="text/css">
        .body-index {
            top: 10px;
            left: 50%;
            width: 75%;
            z-index: 10000;
            position: fixed;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
            background-color: #f1f1f1;
            transform: translate(-50%);
            box-shadow: 0 0 3px #a1a1a1;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $(".body-index").click(function () {
                $(this).remove();
            });
        });
    </script>
</div>
<![endif]-->
<div id="lading">
    <div id="lading-img">
        <img src="<?php $this->options->themeUrl('Image/loding.gif'); ?>" alt="lading">
    </div>
</div>
<!-- #end lading -->
<header class="var-header">
    <div class="var-header-menu">
        <span class="var-icon var-sidebar-btn"><i class="fa fa-fw fa-lg fa-outdent"></i></span>
        <span class="var-header-menu-title"><?php $this->options->title() ?></span>
        <div style="margin:0 auto;"><!-- margin & auto--></div>
        <?php if ($this->user->hasLogin()): ?>
            <a class="var-header-menu-user" href="<?php $this->options->profileUrl(); ?>">
                <img src="<?= mailAvatar($this->user->row['mail']); ?>" alt="Avatar"/>
                <span><?= $this->user->row['name']; ?></span>
            </a>
        <?php else: ?>
            <a class="var-icon" href="<?php $this->options->adminUrl('login.php'); ?>">
                <i class="fa fa-fw fa-lg fa-user"></i>
            </a>
        <?php endif; ?>
        <span class="var-icon var-search-btn"><i class="fa fa-fw fa-lg fa-search"></i></span>
<!--        <span class="var-icon var-site-btn"><i class="fa fa-fw fa-lg fa-cogs"></i></span>-->
    </div>
</header>
<!-- end #header -->
<?php $this->need('/public/site.php'); ?>
<?php $this->need('/public/search.php'); ?>
<?php $this->need('/public/sidebar.php'); ?>
<div class="var-index">