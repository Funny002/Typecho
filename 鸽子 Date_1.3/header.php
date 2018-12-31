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
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.js"></script>
	<link  rel="stylesheet" href="https://cdn.bootcss.com/mdui/0.4.2/css/mdui.min.css">
	<link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('img/icon.png'); ?>" /> 
	<!-- 以上是直接引用的 css 和 js 以及标题图标 -->
    	<script src="<?php $this->options->themeUrl('css-js/style.js'); ?>"></script>
    	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css-js/style.css'); ?>" />
	<!--<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/redt.less'); ?>">
	<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/index.less'); ?>">
	<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/header.less'); ?>">
	<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/footer.less'); ?>">
	<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/sidebar.less'); ?>">
	<link rel="stylesheet/less" href="<?php $this->options->themeUrl('css-js/page-post.less'); ?>">
	<script src="https://cdn.bootcss.com/less.js/3.9.0/less.min.js"></script>-->
	<?php $this->header('commentReply=&template=鸽子 Beta&generator=&rss1=&rss2='); ?>
</head>
<body class="body-sidebar mdui-theme-primary-blue mdui-theme-accent-red">
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
<div id="loding" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; width: 100%; height: 100%; background: #fff; z-index: 100;">
	<div class="loding" style="position: absolute; top: 50%; left: 50%; width: 320px; height: 367px; text-align: center; transform: translate(-50%,-50%);">
		<img src="<?php $this->options->themeUrl('img/loding.gif'); ?>" />
	</div>
</div>
<header class="var-header mdui-color-theme">
	<div class="var-toolbar mdui-toolbar">
		<a class="sidebar-btn mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">&#xe5d2;</i></a>
		<span class="mdui-typo-title" style="height: 50px; line-height: 50px;"><?php $this->options->title() ?></span>
		<div class="mdui-toolbar-spacer"></div>
		<?php if($this->user->hasLogin()): ?>
			<div class="mdui-btn mdui-btn-icon var-toolbar-admin">
				<i class="mdui-icon material-icons">&#xe853;</i>
				<ul>
					<li><i class="mdui-icon material-icons">&#xe7fd;</i>
		   				<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
		   			</li>
		   			<li><i class="mdui-icon material-icons">&#xe068;</i>
		   				<a href="<?php $this->options->adminUrl(); ?>">进入后台</a>
		   			</li>
		   			<li><i class="mdui-icon material-icons">&#xe000;</i>
		   				<a href="<?php $this->options->logoutUrl(); ?>">退出</a>
		   			</li>
				</ul>
			</div>
		<?php else: ?>
			<a class="mdui-btn mdui-btn-icon" href="<?php $this->options->adminUrl('login.php'); ?>" title="login"><i class="mdui-icon material-icons">&#xe853;</i></a>
		<?php endif; ?>
		<a class="mdui-btn mdui-btn-icon search-btn"><i class="mdui-icon material-icons">&#xe8b6;</i></a>
		<a class="mdui-btn mdui-btn-icon themes-btn"><i class="mdui-icon material-icons">&#xe3b7;</i></a>
	</div>
	<div class="var-search">
		<form method="post" action="<?php $this->options->siteUrl(); ?>">
			<a class="search-btn"><i class="mdui-icon material-icons">&#xe14c;</i></a>
			<input type="text" name="s" placeholder="输入关键字搜索" />
			<button type="submit"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
		</form>
	</div>
</header><!-- end #header -->
<?php $this->need('sidebar.php'); ?>
	<div class="var-index" id="var-index">