<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>

<div class="var-post-page">
	<div class="post-page-top">
		<div class="post-page-title">
			<h3><?php $this->title() ?></h3>
			<ul>
				<li><i class="mdui-icon material-icons">&#xe7fd;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
				<li><i class="mdui-icon material-icons">&#xe878;</i><a><?php $this -> date('Y/m/d'); ?></a></li>
				<li><i class="mdui-icon material-icons">&#xe1bd;</i><?php $this->category(','); ?></li>
				<li><i class="mdui-icon material-icons">&#xe417;</i><a><?php get_post_view($this) ?></a></li>
				<li><i class="mdui-icon material-icons">&#xe54e;</i><a><?php $this->tags(',',true, 'none'); ?></a></li>
			</ul>
		</div>
		<div class="post-page-content">
			<?php $this->content(); ?>
		</div>
	</div>
	
	<div class="post-page-btn">
		<?php $this->thePrev('%s', NULL, array('title' => '<span>上一篇</span>', 'tagClass' => 'post-bot-span post-span-1'));?>
		<?php $this->theNext('%s',NULL, array('title' => '<span>下一篇</span>', 'tagClass' => 'post-bot-span post-span-2')); ?>
	</div>

	<?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>