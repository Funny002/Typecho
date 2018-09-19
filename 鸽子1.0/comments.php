<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="var-comments">
	<?php $this->comments()->to($comments); ?>
	<div class="var-comments-top">
		<a href="#<?php $this->respondId(); ?>">
			<?php $this->commentsNum('暂无评论', '仅%d条评论', '有%d条评论'); ?>
			<span> - <i class="mdui-icon material-icons">&#xe2bc;</i></span>
		</a>
	</div>
	<div class="var-comments-ol">
	    <?php $comments->listComments(); ?>
	</div>
    <?php if($this->allow('comment')): ?>
    <div class="var-comments-form" id="<?php $this->respondId(); ?>">
        <div class="var-comments-form-top">
        	<span>你正在回复："<a>&ensp;</a>"&ensp;</span>
        	<?php $comments->cancelReply(); ?>
        </div>
		<form method="post" action="<?php $this->commentUrl() ?>">
			<?php if($this->user->hasLogin()): ?>
				<div class="var-comments-form-admin">
					<span>
						<a href="<?php $this->options->profileUrl(); ?>">账号：<?php $this->user->screenName(); ?></a>
						<a href="<?php $this->options->logoutUrl(); ?>" title="注销">注销</a>
					</span>
			<?php else: ?>
				<div class="var-comments-form-div">
					<ul>
						<li><input type="text" name="author" placeholder="昵称  (必须)" value="<?php $this->remember('author'); ?>" required /></li>
						<li><input type="email" name="mail" placeholder="邮箱  (必须)" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> /></li>
						<li><input type="url" name="url" placeholder="http:// (可选)" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> /></li>
					</ul>
			<?php endif; ?>
					<div class="var-comments-form-remember">
						 <textarea name="text" required ><?php $this->remember('text'); ?></textarea>
					</div>
					<input type="submit" value="提交评论" />
				</div>
		</form>
    <?php else: ?>
    	<h3>评论已关闭</h3>
    <?php endif; ?>
    </div>
</div>

<?php if ($comments->have()): ?><!-- 页面导航    -->
	<script type="text/javascript">
		$(function(){
			if($(".var-index").scrollTop() > 50){
				$(".var-other-btn-1").css("margin-top", "5px");
				$(".var-other-btn-2").css("margin-top", "60px");
			}			
			function pagnav(){
				var pagnav = '<?php $comments->pageNav('上一页','下一页',0,'...');?>';
				$(".var-comments-top").html(function(i,y){ return y + pagnav ; });
				$(".var-comments-form-top").html(function(i,y){ return y + pagnav; });
			}
			function comments_form(){
				var form_action = "<?php $this->commentUrl() ?>";
				console.log(form_action);
				var form_action_id = form_action.substr(form_action.indexOf("=")+1,form_action.length);
				console.log(form_action_id);
				if(form_action.indexOf("=") != -1){
					var form_action_admin = $("#comment-" + form_action_id).find(".comments-top:first").find(".var-comments-admin").text();
					console.log(form_action_admin);
					$(".var-comments-form-top").find("span").find("a").text(" "+form_action_admin.substr(1,form_action_admin.length)+" ");
				}
			}
		pagnav();
		comments_form();
		});
	</script>
<?php endif; ?>
<?php
/** 
 * ========================================================================
 * ********** 自定义 样式 ************
 * ========================================================================
 */
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加{ .xxx }样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 { .xxx }样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
<div id="<?php $comments -> theId(); ?>" class="comments<?php echo $commentClass; ?>">
		<div class="comments-top">
			<?php $comments -> gravatar('64', ''); ?>
			<ul>
				<li class="var-comments-admin"><span><i class="mdui-icon material-icons">&#xe7fd;</i><?php $comments -> author(); ?></span></li>
				<li><span><i class="mdui-icon material-icons">&#xe878;</i><?php $comments -> date('Y / m / d H:i'); ?></span><?php $comments -> reply('&ensp;-&ensp;回复'); ?></li>
			</ul>
		</div><script>comments('<?php $comments -> theId(); ?>','<?php  //qq_img($comments->mail); ?>'); </script>
		<div class="comments-content">
			<?php $comments -> content(); ?>
		</div>
	<?php if ($comments->children) { ?>
		<div class="comments-for">
			<?php $comments -> threadedComments($options); ?>
		</div>
	<?php } ?>
</div>
<?php } ?>
