<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="var-sidebar">

	<div class="var-sidebar-top">
		<div class="var-sidebar-top-btn">
			<a class="sidebar-btn"><i class="mdui-icon material-icons">arrow_back</i></a>
		</div>
		<div class="var-sidebar-top-logo">
			<?php if ($this->options->logoUrl): ?>
				<img src="<?php $this->options->logoUrl() ?>"/>
            <?php else: ?>
            	<img src="<?php $this->options->themeUrl('img/logo.png'); ?>"/>
            <?php endif; ?>	
		</div>
	</div><!-- end #sidebar -> top -->
	
	<div class="var-sidebar-content">
		<span><?php $this->options->description() ?></span>
		<ul>
			
			<?php if($this->user->hasLogin()): ?>
				
			<li class="var-sidebar-content-li">
				<a title="进入后台" href="<?php $this->options->adminUrl(); ?>">						
					<i class="mdui-icon material-icons">input</i>
					<span>进入后台</span>
				</a>
			</li>
			
			<li class="var-sidebar-content-li">
				<a title="注销" href="<?php $this->options->logoutUrl(); ?>">
					<i class="mdui-icon material-icons">error_outline</i>
					<span>注销</span>
				</a>
			</li>
			
			<?php else: ?>
				
			<li class="var-sidebar-content-li ">
				<a title="Login" href="<?php $this->options->adminUrl('login.php'); ?>">
					<i class="mdui-icon material-icons">account_circle</i>
					<span>Login</span>
				</a>
			</li>
			
			<?php endif; ?>

			<li class="var-sidebar-content-li">
				<a title="搜索" href="javascript:;" class="var-search-btn">
					<i class="mdui-icon material-icons">&#xe8b6;</i>
					<span>搜索</span>
				</a>
			</li>
			
			<li class="var-sidebar-content-li">
				<a title="首页" href="<?php $this->options->siteUrl();?>">
					<i class="mdui-icon material-icons">home</i>
					<span>首页</span>
				</a>
			</li>
			
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()): ?>
			
			<li class="var-sidebar-content-li">
				<a title="<?php $pages->title(); ?>" href="<?php $pages->permalink(); ?>">
					<i class="mdui-icon material-icons">linear_scale</i>
					<span><?php $pages->title(); ?></span>
				</a>
			</li>
			
			<?php endwhile; ?>

			<li class="var-sidebar-content-li">
				<a title="文章 RSS" href="<?php $this->options->feedUrl(); ?>">
					<i class="mdui-icon material-icons">rss_feed</i>
					<span>文章 RSS</span>
				</a>
			</li>
			
			<li class="var-sidebar-content-li">
				<a title="Github" href="https://github.com/Funny002/Typecho">
					<i class="mdui-icon material-icons">code</i>
					<span>Github</span>
				</a>
			</li>
			
		</ul>
	</div>
</div><!-- end #content -->
<div class="sidebar-nav sidebar-btn"></div>

<div class="var-other-nav">
	<a class="var-other-btn-1"><i class="mdui-icon material-icons">expand_less</i></a>
	<div class="var-other-div">
		<a class="var-other-btn"><i class="mdui-icon material-icons">view_headline</i></a>
		<ul style="list-style: none;">
			<li><span>文章</span></li>
			<li><span>回复</span></li>
			<li><span>分类</span></li>
			<li><span class="before-none">归档</span></li>
		</ul>
	</div>
	<a class="var-other-btn-2"><i class="mdui-icon material-icons">expand_more</i></a>
</div><!-- end #sidebar -->

<!--
<div class="var-other-btn">
	<a class="var-other-btn-top"><i class="mdui-icon material-icons">&#xe5ce;</i></a>
	<div class="var-other-btn-div">
		<a><i class="mdui-icon material-icons">&#xe8ee;</i></a>
		<ul>
			<li><span class="other-btn">文章</span></li>
			<li><span class="other-btn">回复</span></li>
			<li><span class="other-btn">分类</span></li>
			<li class="none"><span class="other-btn">归档</span></li>
		</ul>
	</div>
	<a><i class="mdui-icon material-icons">&#xe5cf;</i></a>
</div>

<div class="var-other">
	<div class="other" style="background: #fff;">
		<div class="other-top">
			<ul style="padding: 0; margin: 0;">
				<li><a class="other-btn other-btn-1 other-btn-x" href="javascript:;">最近回复</a></li>
				<li><a class="other-btn other-btn-2" href="javascript:;">最新文章</a></li>
				<li><a class="other-btn other-btn-3" href="javascript:;">分类</a></li>
				<li><a class="other-btn other-btn-4" href="javascript:;">归档</a></li>
			</ul>
		</div>
		<div class="other-content">
			
			<div class="other-content span-1 other-content-block">
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
					<ul>
						<?php $this->widget('Widget_Comments_Recent')->to($comments); while($comments->next()): ?>
							<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(40, '...'); ?></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			
			<div class="other-content span-2">
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
					<ul>
						<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
					</ul>
				<?php endif; ?>
			</div>
			
			<div class="other-content span-3">
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
					<ul>
						<li><?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?></li>
					</ul>
				<?php endif; ?>
			</div>
			
			<div class="other-content span-4">
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
					<ul class="widget-list">
			        	<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
			       </ul>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div><!-- end #other-->