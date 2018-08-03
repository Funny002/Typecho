<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php 
    	$this->options->title();
		$this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '- ');
	?></title>
	<link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('img/icon.png'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style.css'); ?>"/>
	<link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
	<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
	<script src="<?php $this->options->themeUrl('style.js'); ?>"></script>
    <?php $this->header(); ?>
</head>
<body class="var-body-sidebar var-body-header">
<!--[if lt IE 9]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header class="var-header" id="header">
	<div class="mdui-toolbar mdui-container">
		<a class="mdui-btn mdui-btn-icon var-max-600 logo-top-a"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
		<span class="mdui-typo-title" style="cursor: default;"><?php $this->options->title() ?></span>
	<div class="mdui-toolbar-spacer"></div>
		<div class="var-header-login">
			<?php if($this->user->hasLogin()): ?>
				<span style="cursor: default;"><?php $this->user->screenName(); ?></span>
				<a class="mdui-btn" title="进入后台" href="<?php $this->options->adminUrl(); ?>">进入后台</a>
                <a class="mdui-btn" title="退出" href="<?php $this->options->logoutUrl(); ?>">注销</a>
            <?php else: ?>
            	<a class="mdui-btn" title="登录" href="<?php $this->options->adminUrl('login.php'); ?>">登录</a>
            <?php endif; ?>
		</div>
	</div>
</header><!-- end #var-header-->
<?php $this->need('sidebar.php'); ?>
<div class="var-index" id="index">