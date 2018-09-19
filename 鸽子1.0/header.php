<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" >
    <title><?php
		$this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ),'',' - ');
        $this->options->title();
	?></title>
	<link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('img/icon.png'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css.js/mdui/css/mdui.min.css'); ?>"/> 
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css.js/style.css'); ?>"/>
	<script src="<?php $this->options->themeUrl('css.js/jquery/jquery3.3.1.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('css.js/style.js'); ?>"></script>
    <?php $this->header("commentReply=&template=鸽子 Beta"); ?>
</head>
<body class="var-body-sidebar">

<header class="var-header">

	<div class="var-toolbar mdui-toolbar">
		<a class="mdui-btn mdui-btn-icon min-600-none sidebar-btn"><i class="mdui-icon material-icons">menu</i></a>
		<a class="mdui-typo-title" href="<?php $this->options->siteUrl();?>"><?php $this->options->title() ?></a>
		<div class="mdui-toolbar-spacer"></div>
			<?php if($this->user->hasLogin()): ?>
				<div class="var-toolbar-div">
					<a title="<?php $this->user->screenName(); ?>"><?php echo $this->author->gravatar(35);?></a>
					<div class="var-login-div">
						<ul>
							<div class="var-login-div-span">
								<?php echo $this->author->gravatar(50);?>
								<span>ID : <?php $this->user->screenName(); ?></span>							
							</div>
							<li><a href="<?php $this->options->adminUrl(); ?>">
								<i class="mdui-icon material-icons">input</i>进入后台</a>
							</li>
							<li style="margin-top: -1px;"><a href="<?php $this->options->logoutUrl(); ?>">
								<i class="mdui-icon material-icons">error_outline</i>注销</a>
							</li>
						</ul>
					</div>
				</div>
		   <?php else: ?>
		       	<a title="登陆" href="<?php $this->options->adminUrl('login.php'); ?>"><i class="mdui-icon material-icons">account_circle</i></a>
			<?php endif; ?>
		<a class="mdui-btn mdui-btn-icon var-search-btn"><i class="mdui-icon material-icons">search</i></a>
		<a class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">color_lens</i></a>
	</div><!-- end # header -> toolbar -->

	<div class="var-search">
		<form action="<?php $this->options->siteUrl(); ?>" method="post">
			<button type="submit"><i class="mdui-icon material-icons">search</i></button>
			<input type="text" name="s" placeholder="请输入关键字搜索"/>
			<a class="var-search-btn"><i class="mdui-icon material-icons">close</i></a>
		</form>
	</div><!-- end # header -> search -->
	<div class="var-music"></div><!-- end # header -> music -->
</header><!-- end # header -->
<div class="var-index">
