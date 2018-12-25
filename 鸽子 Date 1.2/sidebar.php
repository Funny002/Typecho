<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit ;?>

<div class="var-sidebar">
	<div class="var-sidebar-logo">
		<div class="var-sidebar-logo-img">
			<?php if ($this->options->logoUrl): ?>
			<img src="<?php $this->options->logoUrl() ?>"/>
		<?php else: ?>
			<img src="<?php $this->options->themeUrl('img/logo.png'); ?>"/>
		<?php endif; ?>
		</div>
	</div>
	<div class="var-sidebar-div">
		<span><?php $this->options->description() ?></span>
		<ul>
			<li class="var-sidebar-div-li">
				<a class="search-btn mdui-text-color-theme-accent" title="搜索">
					<i class="mdui-icon material-icons">&#xe8b6;</i>
					<span>搜索</span>
				</a>
			</li>
			
			<li class="var-sidebar-div-li">
				<a class="mdui-text-color-theme-accent" href="<?php $this -> options -> siteUrl(); ?>" title="首页">
					<i class="mdui-icon material-icons">&#xe88a;</i>
					<span>首页</span>
				</a>
			</li>
			
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()): ?>
			<li class="var-sidebar-div-li">
				<a class="mdui-text-color-theme-accent" href="<?php $pages -> permalink(); ?>" title="<?php $pages -> title(); ?>">
					<i class="mdui-icon material-icons">&#xe53b;</i>
					<span class=""><?php $pages -> title(); ?></span>
				</a>
			</li>
			<?php endwhile; ?>
				
			<li class="var-sidebar-div-li">
				<a class="mdui-text-color-theme-accent" title="文章 RSS" href="<?php $this -> options -> feedUrl(); ?>">
					<i class="mdui-icon material-icons">&#xe0e5;</i>
					<span class="">文章 RSS</span>
				</a>
			</li>
			
			<li class="var-sidebar-div-li">
				<a class="mdui-text-color-theme-accent" title="Github" href="https://github.com/Funny002/Typecho">
					<i class="mdui-icon material-icons">&#xe86f;</i>
					<span class="">Github</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="sidebar-btn var-sidebar-nav"></div><!-- end #sidebar -->

<?php $this->need('redt.php'); ?>