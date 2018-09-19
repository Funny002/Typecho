<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>
<div class="var-post-page">
	<div class="post-page-top" href="<?php $this->permalink() ?>">
		<div class="post-page-title">
			<h3><?php $this->title() ?></h3>
			<ul>
				<li><i class="mdui-icon material-icons">&#xe7fd;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></li>
				<li><i class="mdui-icon material-icons">&#xe878;</i><a><?php $this -> date('Y/m/d'); ?></a></li>
				<!--<li><i class="mdui-icon material-icons">&#xe1bd;</i><a><?php $this->category(','); ?></a></li>-->
				<li><i class="mdui-icon material-icons">&#xe417;</i><a><?php get_post_view($this) ?></a></li>
				<li><i class="mdui-icon material-icons">&#xe54e;</i><a><?php $this->tags(',',true, 'none'); ?></a></li>
			</ul>
		</div>
		
		<div class="post-page-content">
			<?php $this->content(); ?>
		</div>
	</div>
	
	<?php $this->need('comments.php'); ?>
		
</div>

<?php $this->need('footer.php'); ?>
