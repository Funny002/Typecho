<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php'); ?>
<style>
.var-article-top{
	width: 100%;
	display: table;
	background: #fff;
	margin-bottom: 16px;
	box-shadow: 0 0 3px #a1a1a1;
}
.var-article-top>span{
	width: calc(100% - 16px);
	padding: 8px;
	height: 20px;
	display: block;
	line-height: 20px;
}
</style>
<div class="var-article">
	<div class="var-article-top"><span><?php $this->archiveTitle(array(
		'category'  =>  _t('分类<span>%s</span>下的文章'),
		'search'    =>  _t('包含关键字<span>%s</span>的文章'),
		'tag'       =>  _t('标签<span>%s</span>下的文章'),
		'author'    =>  _t('<span>%s</span>发布的文章')
	), '', ''); ?></span>
	
	<?php if ($this->have()): ?>
		</div>
	<?php while($this->next()): ?>
		<div class="arrticle">
			<div class="arrticle-top">
				<a href="<?php $this->permalink() ?>">
					<?php if($this->options->slimg && 'guanbi' == $this->options->slimg): else: if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
						<a href="<?php $this->permalink() ?>"><?php showThumbnail($this); ?></a>
					<?php else: ?>
						<div class="arrtitle-a-img" style="background-image: url('<?php showThumbnail($this); ?>');"></div>
					<?php endif; endif; ?>
				</a>
				<div class="arrticle-top-btn">
					<a class="mdui-text-color-theme-accent" href="<?php $this->permalink() ?>"><i class="mdui-icon material-icons">&#xe5cb;</i></a>
				</div>
				<div class="arrticle-top-nav"></div>
			</div>
			<div class="arrticle-content">
				<h3 class="mdui-text-color-theme"><?php $this->title() ?></h3>
				<div class="arrticle-content-ul">
					<ul>
						<li class="mdui-text-color-theme-accent">
							<span><i class="mdui-icon material-icons">&#xe7fd;</i>
							<a href="<?php $this -> author -> permalink(); ?>"><?php $this -> author(); ?></a></span>
						</li>
						<li class="mdui-text-color-theme-accent">
							<span><i class="mdui-icon material-icons">&#xe878;</i>
							<a><?php $this -> date('Y/m/d'); ?></a></span>
						</li>
						<li class="mdui-text-color-theme-accent">
							<span><i class="mdui-icon material-icons">&#xe0b7;</i>
							<a href="<?php $this->permalink() ?>#comments" ><?php $this -> commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></span>
						</li>
						<li class="mdui-text-color-theme-accent">
							<span><i class="mdui-icon material-icons">&#xe1bd;</i><?php $this->category(','); ?></span>
						</li>
					</ul>
					<div class="arrticle-content-excertp"><?php $this -> excerpt(80, '...'); ?></div>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
			<span>没有找到内容</span>
		 </div>
	<?php endif; ?>
	<div class="var-article-pagenav"><?php $this->pageNav(); ?>
		<script type="text/javascript">
			$(function(){
				function pagenav(){
					var search = $(".var-article-top>span>span").text();
					var html = "<?php $this->options->siteUrl(); ?>"+"index.php/search/"+search+"/";
					var current = $(".var-article-pagenav .current").text() - 0;
					if($(".var-article-pagenav .next").index() != -1){
						var current_max = $(".var-article-pagenav li").eq($(".var-article-pagenav li").length - 2).text() - 0;
					}else{
						var current_max = $(".var-article-pagenav li:last").text() - 0;
					}
					var current_prev = (current-1) >= 1 ? "<a class='pagenav-prev' href='"+ (html+(current-1)) +"'>上一页</a>" : "" ;
					var current_next = (current+1) <= current_max ? "<a class='pagenav-next' href='"+ (html+(current+1)) +"'>下一页</a>" : "" ;
					$(".var-article-pagenav").html(
						current_prev+current_next+"<div><span>页码</span><input type='text' placeholder='"+current+"'/><span>/</span><span>"+current_max+"</span></div>"
					);
				}
				if($(".var-article-pagenav>ol").length > 0){					
					pagenav();
					$(".var-article-pagenav").html(function(i,y){
						return y+"<script type='text/javascript'>$(function(){$('.var-article-pagenav input').keypress(function(e){"
						+"var _search = $('.var-article-top>span>span').text(); var _avl = $('.var-article-pagenav input').val()-0;"
						+"var _max = $('.var-article-pagenav span:last').text() - 0;if(_avl >= 1 && _avl <= _max){"
						+"if(e.which == 13){window.location.href = '<?php $this->options->siteUrl(); ?>'+'index.php/search/'+_search+'/'+_avl;}}});})</"+"script>";
					});
				}else{
					$(".var-article-pagenav").remove();									
				}
			});
		</script>
	</div>
</div><!-- end #article -->
<?php $this->need('footer.php'); ?>
