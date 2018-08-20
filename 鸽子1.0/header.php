<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html >
<html class="html" lang="en">
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
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('mdui/css/mdui.css'); ?>" />
	<link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/css/mdui.min.css">
	<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
	<!--<script src="<?php $this->options->themeUrl('jquery-2.1.0.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('style.js'); ?>"></script>-->
    <?php $this->header("commentReply="); ?>
</head>
<body class="sidebar-body">
<!--[if lt IE 9]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div class="var-background" style="background-image: url-('<?php $this->options->themeUrl('img/bj.png'); ?>');"></div>
<header class="header">
	<div class="var-nav">
		<div class="mdui-toolbar mdui-container">
			<a class="mdui-btn mdui-btn-icon var-min-600-block sidebar-drawer-btn"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
			<span class="mdui-typo-title" style="cursor: default;"><?php $this->options->title() ?></span>
		<div class="mdui-toolbar-spacer"></div>
				<?php if($this->user->hasLogin()): ?>
					<a class="var-min-600-none"><?php $this->user->screenName(); ?></a>
					<a class="var-min-600-none" href="<?php $this->options->adminUrl(); ?>">进入后台</a>
					<a class="var-min-600-none" href="<?php $this->options->logoutUrl(); ?>">注销</a>
			    <?php else: ?>
			       	<a class="var-min-600-none" href="<?php $this->options->adminUrl('login.php'); ?>">Login<i class="mdui-icon material-icons">&#xe8fb;</i></a>
				<?php endif; ?>
			<a class="mdui-btn mdui-btn-icon var-min-600-block header-search-btn"><i class="mdui-icon material-icons">&#xe8b6;</i></a>
			<a class="mdui-btn mdui-btn-icon" href="javascript:alert_Popup('该功能还没有完成',1);"><i class="mdui-icon material-icons">&#xe3b7;</i></a>
		</div>
	</div>
	<div class="var-search" style="margin-top: 0px;">
		<form action="<?php $this->options->siteUrl(); ?>" method="post">
			<button type="submit"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
			<input type="text" name="s" placeholder="请输入关键字搜索"/>
			<a class="header-search-btn"><i class="mdui-icon material-icons">&#xe5cd;</i></a>
		</form>
	</div>
	<div class="var-music">
		
	</div>
</header><!-- end # header -->
<?php $this->need('sidebar.php'); ?>
	<div class="index">

<!--
********** 十种比较舒服的颜色*********
#19caad;
#8cc7b5;
#a0eee1;
#bee7e0;
#beedc7;
#d6d5b7;
#d1ba74;
#e6ceac;
#ecad9e;
#fa606c;
-->