<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>

<div class="var-article">
	<div class="var-page_post">
		<div class="var-page_post-top">
			<span class="mdui-typo-title mdui-text-color-theme"><?php $this->title() ?></span>
			<ul class="mdui-text-color-theme-accent">
				<li>
					<i class="mdui-icon material-icons">&#xe7fd;</i>
					<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
				</li>
				<li>
					<i class="mdui-icon material-icons">&#xe878;</i>
					<a><?php $this -> date('Y/m/d'); ?></a>
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
	</div><!-- end #page_post-->
	<?php $this->need('comments.php'); ?>
</div><!-- end #article-->

<?php $this->need('footer.php'); ?>
