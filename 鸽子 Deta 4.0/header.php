<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="<?php $this->options->themeUrl('style/jQuery/jquery-3.4.1.min.js');?>"></script>
    <link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('Img/icon.png');?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style/MDUI/css/mdui.min.css');?>">
    <title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); $this->options->title(); ?></title>
    <!-- 通过自有函数输出HTML头部信息 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style/Less/body.css');?>">
    <script src="<?php $this->options->themeUrl('style/Script/body.js');?>"></script>
    <?php $this->header('commentReply=&template=鸽子3.0 Beta&generator=&rss1=&rss2='); ?>
</head>
<body class="var-header-body var-sidebar-body mdui-theme-primary-blue">
<!-- <body class="var-header-body var-sidebar-body"> -->

<header id="header" class="mdui-color-theme">
    <div class="mdui-toolbar">
        <a class="mdui-btn mdui-btn-icon sidebar-btn"><ion-icon name="menu"></ion-icon></a>
        <span class="mdui-typo-title"><?php $this->options->title(); ?></span>
        <div class="mdui-toolbar-spacer"></div>
        <?php if($this->user->hasLogin()): ?>
            <div class="header-user">
                <a href="<?php $this->options->adminUrl();?>" class="user-avatar">
                    <img src="<?=Avatar($this->user->row['mail']);?>" alt="Avatar">
                    <span><?php $this->user->screenName(); ?></span>
                </a>
            </div>
            <a class="mdui-btn mdui-btn-icon" href="<?php $this->options->logoutUrl(); ?>" title="sign-out"><ion-icon name="log-out"></ion-icon></a>
        <?php else: ?>
            <a class="mdui-btn mdui-btn-icon" href="<?php $this->options->adminUrl('login.php'); ?>" title="sign-in"><ion-icon name="contact"></ion-icon></a>
        <?php endif; ?>
        <a class="mdui-btn mdui-btn-icon"><ion-icon name="search"></ion-icon></a>
        <a class="mdui-btn mdui-btn-icon"><ion-icon name="color-palette"></ion-icon></a>
    </div>
</header><!-- end #header -->

<?php $this->need('sidebar.php');?>

<!--
    form => post => <?php $this->options->siteUrl(); ?> => 
-->