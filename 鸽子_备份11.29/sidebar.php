<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="var-sidebar">
	<div class="var-sidebar-top">
		<div class="var-sidebar-top-btn">
			<a class="sidebar-btn"><i class="mdui-icon material-icons">&#xe5c4;</i></a>
		</div>
		<div class="var-sidebar-top-img">
			<?php if ($this->options->logoUrl): ?>
				<img src="<?php $this->options->logoUrl() ?>"/>
            <?php else: ?>
            		<img src="<?php $this->options->themeUrl('img/logo.png'); ?>"/>
            <?php endif; ?>	
		</div>
	</div>
	<div class="var-sidebar-div">
		<span><?php $this->options->description() ?></span>
		<ul class="list-none">
			<li class="var-sidebar-div-li">
				<a class="var-search-btn" title="搜索">
					<i class="mdui-icon material-icons">&#xe8b6;</i>
					<span>搜索</span>
				</a>
			</li>
			
			<li class="var-sidebar-div-li" id="shoy">
				<a href="<?php $this->options->siteUrl();?>" title="首页">
					<i class="mdui-icon material-icons">&#xe88a;</i>
					<span>首页</span>
				</a>
			</li>
			
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()): ?>
			<li class="var-sidebar-div-li">
				<a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
					<i class="mdui-icon material-icons">&#xe53b;</i>
					<span class=""><?php $pages->title(); ?></span>
				</a>
			</li>
			<?php endwhile; ?>
				
			<li class="var-sidebar-div-li">
				<a title="文章 RSS" href="<?php $this->options->feedUrl(); ?>">
					<i class="mdui-icon material-icons">&#xe0e5;</i>
					<span class="">文章 RSS</span>
				</a>
			</li>
			
			<li class="var-sidebar-div-li">
				<a title="Github" href="https://github.com/Funny002/Typecho">
					<i class="mdui-icon material-icons">&#xe86f;</i>
					<span class="">Github</span>
				</a>
			</li>
			
		</ul>
	</div>
</div><!-- end #sidebar -->
<div class="var-sidebar-cover_layer sidebar-btn"></div>
<?php $this->need('redt.php'); ?>
