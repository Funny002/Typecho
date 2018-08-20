<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>
<div class="arrticle">
        <h3 class="archive-title">
        	<?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?>
        </h3>
        <?php if ($this->have()): while($this->next()): ?>
			<div class="arrticle-div">
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
					<span class="mdui-typo-title"><?php $this->title() ?></span>
					<div class="arrticle-content-ul">
						<ul style="padding: 0; margin: 0;">
							<li>
								<span><i class="mdui-icon material-icons">&#xe7fd;</i>&ensp;<a href="<?php $this -> author -> permalink(); ?>"><?php $this -> author(); ?></a></span>
							</li>
							<li>
								<span><i class="mdui-icon material-icons">&#xe878;</i>&ensp;<?php $this -> date('Y/m/d'); ?></span>								
							</li>
							<li>
								<span><i class="mdui-icon material-icons">&#xe0b7;</i>&ensp;<a href="<?php $this->permalink() ?>#comments" ><?php $this -> commentsNum('暂无评论', '仅%d条评论', '有%d条评论'); ?></a></span>								
							</li>
							<li>
							<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
								<?php $this -> widget('Widget_Contents_Post_Date', 'type=month&format') -> parse('<span><i class="mdui-icon material-icons">&#xe260;</i>&ensp;<a href="{permalink}">{date}</a></span>'); ?>
							<?php endif; ?>								
							</li>
						</ul>
						<div class="arrticle-content-span"><?php $this -> excerpt(80, '...'); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <div class="page">			
			<?php $this -> pageNav('上一页', '下一页', 0, '...'); ?>
			<div></div>
			<script>
				$(function(){
					if( $(".page-navigator").length == 0 ){
						$(".page").css("display","none");
					}
					$(".page-text-btn").bind('keypress',function(event){ 
						var href = "<?php $this->options->siteUrl();?>"+"index.php/page/"+$(".page-text-btn").val();
						if(event.keyCode == 13){
							window.location.replace(href.substring(5));
						}  
					});
				});
			</script>
		</div>
	
</div>
<?php $this->need('footer.php'); ?>
