<?php
/**
 * 这是集合了多个大佬做出来的主题
 *
 * @package 鸽子的主题
 * @author Funny
 * @version 0.1
 * @link http://bbs.funnyli.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
$this -> need('header.php');
 ?> 

<div class="var-index-article">

<?php while($this->next()): ?>

		<div class="var-article"><!-- 框架 -->
			
			<a class="var-article-img" href="<?php $this->permalink() ?>">
				<div class="var-article-img-img">
					<?php if($this->options->slimg && 'guanbi' == $this->options->slimg): else: if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
						<a href="<?php $this->permalink() ?>" ><?php showThumbnail($this); ?></a>
					<?php else: ?>
						<img src="<?php showThumbnail($this); ?>">
       				<?php endif; endif; ?>
				</div>
       			<div class="var-article-img-div">
       				<div>       					
       					<i class="mdui-icon material-icons">&#xe5cb;</i>
       				</div>
       			</div>
       			<div class="var-article-nav"></div>
			</a>
			
			<div class="var-article-div mdui-typo">
				<span><?php $this->title() ?></span>
				<div class="var-article-div-ul">
					<ul style="padding: 0; margin: 0;">
						<li><span>作者:&ensp;<a href="<?php $this->author->permalink(); ?>"><?php $this -> author(); ?></a></span></li>
						<li><span>时间:&ensp;<a><?php $this -> date('Y/m/d'); ?></a></span></li>
						<li><span>分类:&ensp;<a><?php $this -> category(','); ?></a></span></li>
					</ul>
				</div>
				<div class="var-article-div-span">
					<?php $this -> excerpt(80, '...'); ?>
					<div style="position: absolute; right: 0; bottom: 0; width: 60px; height: 25px; line-height: 25px; margin-bottom: 10px;">
						<a href="<?php $this->permalink() ?>#comments">
							<span><?php $this -> commentsNum('%d'); ?> : </span>
							<i class="mdui-icon material-icons">&#xe3cd;</i>
						</a>
					</div>
				</div>
			</div>
			
		</div>
<?php endwhile; ?>
	<hr style="height: 0; border: 0; padding: 0; margin-bottom: 10px; border-top: 1px solid #ddd;" />
	<div class="var-index-page">
	    <?php $this -> pageNav('上一页', '下一页',0,'...'); ?>
	</div>
</div>
<?php $this -> need('footer.php'); ?>
<script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.1/js/mdui.min.js"></script>