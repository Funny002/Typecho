<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	<link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('img/icon.png'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css.js/mdui/css/mdui.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css.js/style.css'); ?>">
    	<script src="<?php $this->options->themeUrl('css.js/jquery.min.js'); ?>"></script>
    	<script src="<?php $this->options->themeUrl('css.js/style.js'); ?>"></script>
    <?php $this->header('commentReply=&template=鸽子 Beta&generator=&rss1=&rss2='); ?>
</head>
<body class="var-body-sidebar">
<!--[if lt IE 9]>
	<div class="body-index" style="posi">当前网页样式部分或全部 <strong>不支持</strong> 你正在使用的浏览器，为了您的正常体验，请升级或更换你当前的浏览器。
		<style type="text/css">
		.body-index{
			position: fixed;
			top: 10px;
			left: 50%;
			height: 30px;
			padding: 0 8px;
			cursor: pointer;
			line-height: 30px;
			border-radius: 3px;
			background: #f1f1f1;
			transform: translate(-50%);
			box-shadow: 0 0 3PX #a1a1a1;
		}
		</style>
		<script type="text/javascript">$(function(){$(".body-index").click(function(){$(this).remove();});});</script>
	</div>
<![endif]-->
<header class="var-header">
	<div class="var-toolbar mdui-toolbar">
		<a class="mdui-btn mdui-btn-icon sidebar-btn min-1024-none"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
	    <a class="mdui-typo-title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
	   	<div class="mdui-toolbar-spacer"></div>
	   	<?php if($this->user->hasLogin()): ?>
	   		<div class="var-header-admin">
	   			<i class="mdui-icon material-icons">&#xe853;</i>
	   			<div>
		   			<ul class="list-none">
		   				<li><a><?php $this->user->screenName(); ?></a></li>
		   				<li><a href="<?php $this->options->profileUrl(); ?>">个人资料</a></li>
		   				<li><a href="<?php $this->options->adminUrl(); ?>">进入后台</a></li>
		   				<li><a href="<?php $this->options->logoutUrl(); ?>">退出</a></li>
		   			</ul>
	   			</div>
	   		</div>
	   	<?php else: ?>
	   		<a title="登录" href="<?php $this->options->adminUrl('login.php'); ?>" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe853;</i></a>
	   	<?php endif; ?>
	    <a class="mdui-btn mdui-btn-icon var-search-btn"><i class="mdui-icon material-icons">&#xe8b6;</i></a>
	    <a class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe3b7;</i></a>
	</div>
	<div class="var-search">
		<form method="post" action="<?php $this->options->siteUrl(); ?>">
			<a class="var-search-btn"><i class="mdui-icon material-icons">&#xe14c;</i></a>
			<input type="text" name="s" placeholder="输入关键字搜索"/>
			<button type="submit"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
		</form>
	</div>
</header><!-- end #header -->
<?php $this->need('sidebar.php'); ?>
	<div class="var-index">