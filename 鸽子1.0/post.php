<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="post" style="background: none;">
	<div class="post-content">
		<div class="post-content-top">
			<span class="mdui-typo-title"><?php $this->title() ?></span>
			<ul>
				<li><span><i class="mdui-icon material-icons">&#xe7fd;</i>&ensp;<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe878;</i>&ensp;<?php $this -> date('Y/m/d'); ?></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe1bd;</i>&ensp;<?php $this->category(','); ?></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe417;</i>&ensp;<?php get_post_view($this) ?></span></li>
				<li class="post-ul-li"><span><i class="mdui-icon material-icons">&#xe54e;</i>&ensp;<?php $this->tags(',',true, 'none'); ?></span></li>
			</ul>
		</div>
		<div class="post-content-span">
			<?php $this->content(); ?>
		</div>
	</div>

	<div class="post-bot">
		<?php $this->thePrev('%s', NULL, array('title' => '<span>上一篇</span>', 'tagClass' => 'post-bot-span post-span-1'));?>
		<?php $this->theNext('%s',NULL, array('title' => '<span>下一篇</span>', 'tagClass' => 'post-bot-span post-span-2')); ?>
	</div>

	<?php $this->need('comments.php'); ?>

</div>

<?php $this->need('footer.php'); ?>