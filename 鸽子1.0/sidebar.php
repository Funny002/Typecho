<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="sidebar">
	<div class="sidebar-logo">
		<div class="sidebar-logo-btn">
			<a class="sidebar-drawer-btn"><i class="mdui-icon material-icons">&#xe5c4;</i></a>
		</div>
		<div class="sidebar-logo-img">
			<?php if ($this->options->logoUrl): ?>
				<img src="<?php $this->options->logoUrl() ?>"/>
            <?php else: ?>
            	<img src="<?php $this->options->themeUrl('img/logo.png'); ?>"/>
            <?php endif; ?>	
		</div>
	</div>
	<div class="sidebar-content">
		<?php if($this->user->hasLogin()): ?>
			<span>ID : <a><?php $this->user->screenName(); ?></a></span>
		<?php else: ?>
			<span><?php $this->options->description() ?></span>
		<?php endif; ?>
			<ul>
			<?php if($this->user->hasLogin()): ?>
				<li class="sidebar-content-li">
					<a title="注销" href="<?php $this->options->logoutUrl(); ?>">
						<i class="mdui-icon material-icons">&#xe001;</i>
						<span class="">注销</span>
					</a>
				</li>
				
				<li class="sidebar-content-li">
					<a title="进入后台" href="<?php $this->options->adminUrl(); ?>">
						<i class="mdui-icon material-icons">&#xe40a;</i>
						<span class="">进入后台</span>
					</a>
				</li>
	        <?php else: ?>
	        	
        	<li class="sidebar-content-li">
				<a title="Login" href="<?php $this->options->adminUrl('login.php'); ?>">
					<i class="mdui-icon material-icons">&#xe8fb;</i>
					<span class="">Login</span>
				</a>
			</li>
			
			<?php endif; ?>
			
			<li class="sidebar-content-li">
				<a class="header-search-btn" title="搜索">
					<i class="mdui-icon material-icons">&#xe8b6;</i>
					<span class="">搜索</span>
				</a>
			</li>
			
			<li class="sidebar-content-li">
				<a title="首页" href="<?php $this->options->siteUrl();?>">
						<i class="mdui-icon material-icons">&#xe88a;</i>
					<span class="">首页</span>
				</a>
			</li>
			
			<?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()): ?>
			<li class="sidebar-content-li">
				<a title="<?php $pages->title(); ?>" href="<?php $pages->permalink(); ?>">
					<i class="mdui-icon material-icons">&#xe53b;</i>
					<span class=""><?php $pages->title(); ?></span>
				</a>
			</li>
			<?php endwhile; ?>
			<li class="sidebar-content-li">
				<a title="文章 RSS" href="<?php $this->options->feedUrl(); ?>">
					<i class="mdui-icon material-icons">&#xe0e5;</i>
					<span class="">文章 RSS</span>
				</a>
			</li>
			
			<li class="sidebar-content-li">
				<a title="Github" href="https://github.com/Funny002/Typecho">
					<i class="mdui-icon material-icons">&#xe86f;</i>
					<span class="">Github</span>
				</a>
			</li>

		</ul>
	</div>
</div><!-- end #sidebar-->
<div class="var-cover_layer sidebar-drawer-btn"></div>
<div class="var-other-nav">
	<a class="other-a-top"><i class="mdui-icon material-icons">&#xe5ce;</i></a>
	<div>
		<a class="other-a-btn"><i class="mdui-icon material-icons">&#xe8ee;</i></a>
		<ul>
			<li><span>文章</span></li>
			<li><span>回复</span></li>
			<li><span>分类</span></li>
			<li><span class="other-span-bot" onclick="alert_Popup('该功能还没有完成',2);">归档</span></li>
		</ul>
	</div>
	<a><i class="mdui-icon material-icons">&#xe5cf;</i></a>
</div>
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





<!--
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div>-->
