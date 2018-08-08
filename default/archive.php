<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); if ($this->have()): ?>
	<div class="var-archive mdui-typo">
	<span class="mdui-typo-title"><?php $this->archiveTitle(array(
		'category'	=> " ' <a href=''>%s</a> ' 下的文章",
		'search'	=> " ' <a href=''>%s</a> ' 关键字的文章",
		'tag'		=> " ' <a href=''>%s</a> ' 标签下的文章",
		'author'	=> " ' <a href=''>%s</a> ' 发布的文章"
	), '', ''); ?></span>
	</div>
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
		    <div class="var-article-img-div"><div><i class="mdui-icon material-icons">&#xe5cb;</i></div></div>
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
<?php endwhile; else: ?>
    <div class="var-archive mdui-typo">
       	<span class="mdui-typo-title"><?php $this->archiveTitle(array(
		'category'	=> " ' <a href=''>%s</a> ' 下的文章",
		'search'	=> " ' <a href=''>%s</a> ' 关键字的文章",
		'tag'		=> " ' <a href=''>%s</a> ' 标签下的文章",
		'author'	=> " ' <a href=''>%s</a> ' 发布的文章"
    	), '', ''); ?></span>
    	<span class="mdui-typo-title">没有找到该关键字的内容</span>
    </div>
<?php endif; $this->pageNav('<', '>',0,'...');  $this->need('footer.php'); ?>
