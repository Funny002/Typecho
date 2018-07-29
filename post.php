<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="var-post" id="var-post">
	<div class="var-post-div">
		<div class="var-post-div">			
			<span>&ensp;<?php $this->title() ?></span>
		</div>
		<div class="var-post-ul mdui-typo">			
			<ul style="padding: 0; margin: 0;">
				<li><span>作者:&ensp;<a href="<?php $this->author->permalink(); ?>"><?php $this -> author(); ?></a></span></li>
				<li><span>日期:&ensp;<a><?php $this -> date('Y/m/d'); ?></a></span></li>
				<li><span>分类:&ensp;<a><?php $this -> category(','); ?></a></span></li>
			</ul>
			<!--<span>标签 : <?php $this->tags(', ', true, null); ?></span>-->
		</div>
		<div class="var-post-content">
			 <?php $this->content(); ?>
		</div>
	</div>
</div>

<div class="var-ul">
	<?php $this->thePrev('%s', NULL, array('title' => '<span>上一篇</span>', 'tagClass' => 'post-ul-span'));?>
	<?php $this->theNext('%s',NULL, array('title' => '<span>下一篇</span>', 'tagClass' => 'post-ul-span')); ?>
</div>

<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>
