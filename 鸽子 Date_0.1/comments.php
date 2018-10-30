<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="var-comments  theme-typo">

	 <?php $this->comments()->to($comments); if ($comments->have()): ?>

	 <div class="var-comments-top">
	 	<a href="#<?php $this->respondId(); ?>"><span class="var-comments-top-1"><?php $this->commentsNum(_t('暂无评论'), _t('仅有 %d 条评论'), _t('已有 %d 条评论')); ?></span>
	 	<span class="var-comments-top-2">- 去评论</span></a>
	
		<div class="var-article-pagenav"><?php $comments->pageNav(); ?>
			<script type="text/javascript">
				$(function(){
					function pagenav(){
						var html = "<?php $this->commentUrl() ?>"+"-page-";
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
							+"if(e.which == 13){window.location.href = '<?php $this->commentUrl() ?>'+'-page-'+_avl;}}});})</"+"script>";
						});
					}else{
						$(".var-article-pagenav").remove();									
					}
				});
			</script>
		</div>
	</div>
	
    <div class="var-comments-ol"><?php $comments->listComments(); ?></div>
    
    <?php endif; if($this->allow('comment')): ?>

    	<div class="var-comments-body" id="<?php $this->respondId(); ?>">
    		<span>添加新评论</span>
    		<form method="post" action="<?php $this->commentUrl() ?>">
    			<div class="var-comments-form-top">
    				<?php if($this->user->hasLogin()): ?>
    					<span class="var-comments-form-top-1">    						
	    					<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
	    					<a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a>
    					</span>
    				<?php else: ?>
    					<a href="<?php $this->options->adminUrl('login.php'); ?>" title="Login">去登录？</a>
    				<?php endif; ?>
    				<span class="var-comments-form-top-2">您正在回复' <span></span> '<?php $comments->cancelReply(); ?></span>
    			</div>
    			 <?php if($this->user->hasLogin()): ?>
    			 	<div class="var-comments-admin">
    			 <?php else: ?>
    			 	<div class="var-comments-input">
    			 		<ul class="list-none">
						<li><input type="text" name="author" placeholder="昵称  (必须)" value="<?php $this->remember('author'); ?>" required /></li>
						<li><input type="email" name="mail" placeholder="邮箱  (必须)" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> /></li>
						<li><input type="url" name="url" placeholder="http:// (可选)" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> /></li>
					</ul>
    			 <?php endif; ?>
    			 		<div class="var-comments-remember">
						 <textarea name="text" required ><?php $this->remember('text'); ?></textarea>
					</div>
					<input type="submit" value="提交评论" />
    			 	</div>
    		</form>
    	</div>
    <?php else: ?>
    		<h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div><!-- end #comments -->
<script type="text/javascript">
$(function(){
	function comments(){
		var comments = "<?php $this->commentUrl() ?>";
		if(comments.indexOf("parent=") >= 0){
			var _comments = comments.substring(comments.indexOf("=")+1,comments.length) - 0;
			$(".var-comments-form-top").find("span.var-comments-form-top-2>span").text(
				$("#comment-"+_comments).find(".comments-top li:first>a").text()
			);
		}
	}
	comments();
});
</script>
<?php
/**
 * ==========================================================
 * ************ 自定义评论 ************ 
 * ========================================================== 
 */
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-author';	//如果是文章作者的评论添加 .comment-author 样式
        } else {
            $commentClass .= ' comment-user';	//如果是评论作者的添加 .comment-user 样式
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';	//评论层数大于0为子级，否则是父级
?>
<li id="<?php $comments->theId(); ?>" class="comments-body<?php echo $commentClass; ?>">
	<div class="comments-top">
		<?php $comments->gravatar('55',''); ?>
		<ul>
			<li><?php $comments->author(); ?></li>
			<li><span><a><?php $comments->date('Y-m-d H:i'); ?></a><?php $comments->reply(' - 回复'); ?></span></li>
		</ul>
		<script type="text/javascript">
			$(function(){
				function _comments(obj_1,obj_2){if(obj_2 != ""){$("#"+obj_1).find(".comments-top>.avatar").attr("src",obj_2);}}
				_comments('<?php $comments -> theId(); ?>','<?php qq_img($comments->mail); ?>');
			});
		</script>
	</div>
	<div class="comments-content"><?php $comments->content(); ?></div>
<?php if ($comments->children) { ?>
	<div class="comment-children">
		<?php $comments->threadedComments($options); ?>
	</div>
<?php } ?>
</li>
<?php } ?>