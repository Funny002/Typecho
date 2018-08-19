<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>

<div class="post">
	<div href="<?php $this->permalink() ?>" class="post-content" style="margin-bottom: 50px;">
		<div class="post-content-top">
			<span class="mdui-typo-title"><?php $this->title() ?></span>
			<ul>
				<li><span><i class="mdui-icon material-icons">&#xe7fd;</i>&ensp;<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe878;</i>&ensp;<?php $this -> date('Y/m/d'); ?></span></li>
				<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
					<?php $this -> widget('Widget_Contents_Post_Date', 'type=month&format') -> parse('<li><span><i class="mdui-icon material-icons">&#xe260;</i>&ensp;<a href="{permalink}">{date}</a></span></li>'); ?>
				<?php endif; ?>
				<li><span><i class="mdui-icon material-icons">&#xe417;</i>&ensp;<?php get_post_view($this) ?></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe54e;</i>&ensp;<?php $this->tags(',',true, 'none'); ?></span></li>
			</ul>
		</div>
		<div class="post-content-span">
			<?php $this->content(); ?>
		</div>
	</div>

	<?php $this->need('comments.php'); ?>

</div>

<?php $this->need('footer.php'); ?>
