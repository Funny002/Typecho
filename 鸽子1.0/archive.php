<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>
<h3 class="var-archive-title">
	<?php $this->archiveTitle(array(
		'category'  =>  _t('分类 %s 下的文章'),
		'search'    =>  _t('包含关键字 %s 的文章'),
		'tag'       =>  _t('标签 %s 下的文章'),
		'author'    =>  _t('%s 发布的文章')
    ), '', ''); ?>
</h3>
<div class="var-arrticle-div">
        <?php if ($this->have()): while($this->next()): ?>
        	<div class="arrticle">
				<div class="arrticle-img">
					<a href="<?php $this->permalink() ?>">
						<?php if($this->options->slimg && 'guanbi' == $this->options->slimg): else: if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
							<a href="<?php $this->permalink() ?>"><?php showThumbnail($this); ?></a>
						<?php else: ?>
							<div class="arrtitle-a-img" style="background-image: url('<?php showThumbnail($this); ?>');"></div>
				       	<?php endif; endif; ?>
					</a>
					<div class="arrticle-img-nav">
						<a href="<?php $this->permalink() ?>"><i class="mdui-icon material-icons">&#xe5cb;</i></a>
					</div>
					<div class="arrticle-img-nav-nav"></div>
				</div>
				<div class="arrticle-content">
					<h3><?php $this->title() ?></h4>
					<div class="arrticle-content-ul">
						<ul style="padding: 0; margin: 0;">
							<li>
								<span><i class="mdui-icon material-icons">person</i><a href="<?php $this -> author -> permalink(); ?>"><?php $this -> author(); ?></a></span>
							</li>
							<li>
								<span><i class="mdui-icon material-icons">event</i><?php $this -> date('Y/m/d'); ?></span>								
							</li>
							<li>
								<span><i class="mdui-icon material-icons">chat</i><a href="<?php $this->permalink() ?>#comments" ><?php $this -> commentsNum('暂无评论', '仅%d条评论', '有%d条评论'); ?></a></span>								
							</li>
							<li><span><i class="mdui-icon material-icons">widgets</i><?php $this->category(','); ?></span></li>
						</ul>
						<div class="arrticle-content-span"><?php $this -> excerpt(90, '...'); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; else: ?>
            <div class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </div>
        <?php endif; ?>

        <div class="page">			
			<?php $this -> pageNav('上一页', '下一页', 0, '...'); ?>
		</div>
	
</div>
<?php $this->need('footer.php'); ?>
