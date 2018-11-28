<?php
/**
 * 这是 Typecho 0.9 系统的一套默认皮肤
 * 
 * @package Typecho Replica Theme 
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this->need('header.php');?>
<div class="var-article">
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
	<?php endwhile; ?>
	<div class="var-article-pagenav"><?php $this->pageNav(); ?>
		<script type="text/javascript">
			$(function(){
				function pagenav(){
					var html = "<?php $this->options->siteUrl(); ?>"+"index.php/page/";
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
						+"var _avl = $('.var-article-pagenav input').val()-0;"
						+"var _max = $('.var-article-pagenav span:last').text() - 0;if(_avl >= 1 && _avl <= _max){"
						+"if(e.which == 13){window.location.href = '<?php $this->options->siteUrl(); ?>'+'index.php/page/'+_avl;}}});})</"+"script>";
					});
				}else{
					$(".var-article-pagenav").remove();									
				}
			});
		</script>
	</div><!-- end #pagenav -->
</div>
<?php $this->need('footer.php'); ?>