<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>
<div class="var-article">
	<div class="var-page_post  theme-typo">
		<div class="var-page_post-top">
			<span class="mdui-typo-title"><?php $this->title() ?></span>
			<ul>
				<li>
					<i class="mdui-icon material-icons">&#xe7fd;</i>
					<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
				</li>
				<li>
					<i class="mdui-icon material-icons">&#xe878;</i>
					<a><?php $this -> date('Y/m/d'); ?></a>
				</li>
				<li>
					<i class="mdui-icon material-icons">&#xe1bd;</i>
					<?php $this->category(','); ?>
				</li>
				<li>
					<i class="mdui-icon material-icons">&#xe417;</i>
					<a><?php get_post_view($this) ?></a>
				</li>
				<li>
					<i class="mdui-icon material-icons">&#xe54e;</i>
					<a><?php $this->tags(',',true, 'none'); ?></a>
				</li>
			</ul>
		</div>
		<div class="var-page_post-content"><?php $this->content(); ?></div>
	</div><!-- end #page_post -->
	<div class="var-page_post-nav">
		<?php $this->thePrev('%s', NULL, array('title' => '<span>上一篇</span>', 'tagClass' => 'page_post-nav-1'));?>
		<?php $this->theNext('%s',NULL, array('title' => '<span>下一篇</span>', 'tagClass' => 'page_post-nav-2')); ?>
	</div>
	<?php $this->need('comments.php'); ?>
</div><!-- end #article -->

<?php $this->need('footer.php'); ?>
