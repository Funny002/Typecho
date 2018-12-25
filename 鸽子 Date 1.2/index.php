<?php
/**
 * 这是 Typecho 0.9 系统的一套默认皮肤
 *
 * @package Typecho Replica Theme
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; $this -> need('header.php');?>
	<?php while($this->next()): ?>
		<article class="var-article">
			<div class="var-artcle-top">
				<a href="<?php $this->permalink() ?>">
					<?php if($this->options->slimg && 'guanbi' == $this->options->slimg): else: if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
						<a href="<?php $this->permalink() ?>"><?php showThumbnail($this); ?></a>
					<?php else: ?>
						<div class="var-artcle-top-img" style="background-image: url('<?php showThumbnail($this); ?>');"></div>
					<?php endif; endif; ?>
				</a>
				<div class="var-artcle-top-nav"></div>
				<div class="var-artcle-top-btn">
					<a class="mdui-text-color-theme-accent" href="<?php $this->permalink() ?>"><i class="mdui-icon material-icons">&#xe5cb;</i></a>
				</div>
			</div>
			<div class="var-artcle-content">
				<h3 class="mdui-text-color-theme"><?php $this->title() ?></h3>
				<div class="var-artcle-content-div">
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
							<span><i class="mdui-icon material-icons">&#xe1bd;</i><?php $this -> category(','); ?></span>
						</li>
					</ul>
					<div class="var-artcle-content-excertp"><?php $this -> excerpt(80, '...'); ?></div>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
	<div class="var-index-pagenav"><?php $this -> pageNav(); ?>
		<script type="text/javascript">
			$(function() {
				function pagenav() {
					var ol_ = $(".var-index-pagenav").find("ol"); // 获取全部ol
					var current = parseInt(ol_.find(".current").text()); // 获取当前的页码
					var html = "<?php $this->options->siteUrl(); ?>"+"index.php/page/";
					if(ol_.find(".next").index() == -1) { // 没有下一页，表示当前已是最后一页
						var next = current;
					} else { // 有下一页，表示当前不是最后一页
						var next = parseInt(ol_.find("li").eq( ol_.find("li").length - 2).text());
					}
					var prev_html = current > 1 ? '<a class="pagenav-prev mdui-text-color-theme-accent" href="' + html + (current - 1) + '">上一页</a>' : "" ;
					var naxt_html = current < next ? '<a class="pagenav-prev mdui-text-color-theme-accent" href="' + html + (current + 1) + '">下一页</a>': "";
					$(".var-index-pagenav").html(
						prev_html+naxt_html+'<div><span>页码</span><input type="text" placeholder="'+current+'"/><span>/</span><span>'+ next +'</span></div>'
					);
				}
				if($(".var-index-pagenav ol").index() == -1) {
					$(".var-index-pagenav").remove();
				} else {
					pagenav();
					$(".var-index-pagenav").html(function(i,y){
						return y+"<script type='text/javascript'>$(function(){$('.var-index-pagenav input').keypress(function(e){"
						+"var _avl = $('.var-index-pagenav input').val()-0;"
						+"var _max = $('.var-index-pagenav span:last').text() - 0;if(_avl >= 1 && _avl <= _max){"
						+"if(e.which == 13){window.location.href = '<?php $this->options->siteUrl(); ?>'+'index.php/page/'+_avl;}}});})</"+"script>";
					});
				}
			});
		</script>
	</div>
<?php $this -> need('footer.php'); ?>