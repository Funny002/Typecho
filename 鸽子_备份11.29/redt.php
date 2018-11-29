<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="var-redt-pagenav">
	<a class="var-redt-pagenav-btn-1"><i class="mdui-icon material-icons">&#xe316;</i></a>
	<div class="var-redt-pagenav-div">
		<a class="var-redt-pagenav-btn-2"><i class="mdui-icon material-icons">&#xe318;</i></a>
		<ul>
			<li><span class="pagenav-sapn-1">文章</span></li>
			<li><span class="pagenav-sapn-2">回复</span></li>
			<li><span class="pagenav-sapn-3">分类</span></li>
			<li><span class="pagenav-sapn-4">归档</span></li>
		</ul>
	</div>
	<a class="var-redt-pagenav-btn-3"><i class="mdui-icon material-icons">&#xe313;</i></a>
</div>

<div class="var-redt-content" style="display: none;">
	<div class="var-redt-content-top">
		<a class="pagenav-sapn-1">文章</a>
		<a class="pagenav-sapn-2">回复</a>
		<a class="pagenav-sapn-3">分类</a>
		<a class="pagenav-sapn-4">归档</a>
	</div>
	<div class="var-redt-content-ul">
		
		<ul class="var-redt-content-ul-1">
			<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
				<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            <?php endif; ?>
		</ul><!-- 文章 -->
		
		<ul class="var-redt-content-ul-2">	
			<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
			<?php $this->widget('Widget_Comments_Recent')->to($comments); while($comments->next()): ?>
				<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
			<?php endwhile; endif; ?>
		</ul><!-- 回复 -->
		
		<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
			<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=var-redt-content-ul-3'); ?><!-- 分类 -->
		<?php endif; ?>
		
		<ul class="var-redt-content-ul-4">
		 <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
		 	<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
		 <?php endif; ?>
		</ul><!-- 归档 -->
		
	</div>
</div>
