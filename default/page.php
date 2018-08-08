<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="var-page">
	<span class="page-title mdui-typo-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></span>
	<div class="page-name">
		<ul class="mdui-typo">
			<li><span>浏览 : <?php echo ViewsCounter_Plugin::getViews(); ?></span></li>
			<li><span><?php $this->date('Y / F j'); ?></span></li>
			<li><a><?php $this->author() ?></a></li>
		</ul>
	</div>
	<div class="page-content">
        <?php $this->content(); ?>
    </div>
</div>
<?php $this->need('comments.php'); ?>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
