<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="var-sidebar" id="sidebar">
	<!--| logo |-->
	<div class="var-logo">
		<div class="var-logo-btn">
			<a><i class="mdui-icon material-icons">&#xe163;</i></a>
		</div>
		<div class="var-logo-img">
			<?php if ($this->options->logoUrl): ?>
				<img src="<?php $this->options->logoUrl() ?>"/>
           <?php else: ?>
				<img src="<?php $this->options->themeUrl('img/logo.png'); ?>" />
            <?php endif; ?>
		</div>
	</div>
	<!--| content / rest |-->
	<div class="var-sidebar-content">
		<div class="var-content-top var-span">
			<span class="var-span" style="color: rgba(0,0,0,.4);"><?php $this->options->description(3) ?></span>
		</div>
		<div class="var-content-nav">
			<ul>
				<li class="var-nav-li">
					<a href="" title="搜索">
						<i class="mdui-icon material-icons">&#xe8b6;</i>
						<span class="var-span">搜索</span>
					</a>
				</li>
				<li class="var-nav-li">
					<a href="<?php $this->options->siteUrl();?>" title="首页">
						<i class="mdui-icon material-icons">&#xe88a;</i>
						<span class="var-span">首页</span>
					</a>
				</li>
				<?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()): ?>
				<li class="var-nav-li">
					<a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
						<i class="mdui-icon material-icons">&#xe53b;</i>
						<span class="var-span"><?php $pages->title(); ?></span>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div class="var-sidebar-rest">
			<ul>
				<li class="var-nav-li">
					<a title="文章 RSS" target="_blank" href="<?php $this->options->feedUrl(); ?>">
						<i class="mdui-icon material-icons">&#xe0e5;</i>
						<span class="var-span">文章 RSS</span>
					</a>
				</li>
				
				<li class="var-nav-li">
					<a title="评论 RSS" target="_blank" href="<?php $this->options->commentsFeedUrl(); ?>">
						<i class="mdui-icon material-icons">&#xe0e5;</i>
						<span class="var-span">评论 RSS</span>
					</a>
				</li>
				
				<li class="var-nav-li">
					<a title="Github" target="_blank" href="https://github.com/Funny002/Typecho">
						<img style="width: 30px; height: 30px ;" src="<?php $this->options->themeUrl('img/github.png'); ?>" />
						<span class="var-span">Github</span>
					</a>
				</li>

			</ul>
		</div>
		<!--| popup |-->
		
		<div class="var-sidebar-popup var-span" style="display: none;">
			<div class="var-popup-top">
				<a href="#popup_1" target="_self">最新文章</a>
				<a href="#popup_2" target="_self">最近回复</a>
				<a href="#popup_3" target="_self">分类</a>
			</div>
			<div class="var-popup-div">
				
				<div id="popup_1">
					<?php $this->widget('Widget_Contents_Post_Recent')->parse('
            	
            	<li><a href="{permalink}">{title}</a></li>
            	'); ?>
				</div>
				
				<div id="popup_2">
					<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        		<?php while($comments->next()): ?>
            	<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        		<?php endwhile; ?>
				</div>
				
				<div id="popup_3">
					 <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
				</div>
				
			</div>
		</div>
		
	</div>
</div><!-- end #sidebar -->