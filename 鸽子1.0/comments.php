<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="comments">
	<?php $this->comments()->to($comments); ?>
	<div class="comments-top">
		<a href="#<?php $this->respondId(); ?>">
			<?php $this->commentsNum('暂无评论', '仅%d条评论', '有%d条评论'); ?>
			<span> - <i class="mdui-icon material-icons">&#xe2bc;</i></span>
		</a>
	</div>
	<div class="comments-ol">
	    <?php $comments->listComments(); ?>
	</div>
    <?php if($this->allow('comment')): ?>
    <div class="comments-allow" id="<?php $this->respondId(); ?>">
        <div class="comments-allow-top">
        	<!--<span>你正在回复：<a></a></span>-->
        	<?php $comments->cancelReply(); ?>
        </div>
		<form class="comments-form" method="post" action="<?php $this->commentUrl() ?>">
			<?php if($this->user->hasLogin()): ?>
				<div class="comments-form-top">
					<span>
						<a href="<?php $this->options->profileUrl(); ?>">账号：<?php $this->user->screenName(); ?></a>
						<a href="<?php $this->options->logoutUrl(); ?>" title="注销">注销</a>
					</span>
			<?php else: ?>
				<div class="comments-form-ul">
					<ul>
						<li><input type="text" name="author" placeholder="昵称  (必须)" value="<?php $this->remember('author'); ?>" required /></li>
						<li><input type="email" name="mail" placeholder="邮箱  (必须)" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> /></li>
						<li><input type="url" name="url" placeholder="http:// (可选)" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> /></li>
					</ul>
			<?php endif; ?>
					<div class="comments-form-text">
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
			function pagnav(){
				var pagnav = '<?php $comments->pageNav('上一页','下一页',0,'...');?>';
				$(".comments-top").html(function(i,y){ return y + pagnav ; });
				$(".comments-allow-top").html(function(i,y){ return y + pagnav; });
			}
		pagnav();
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
<div id="<?php $comments -> theId(); ?>" class="comments-content<?php echo $commentClass; ?>">
		<div class="comments-content-top">
			<?php $comments -> gravatar('64', ''); ?>
			<ul>
				<li>&ensp;<span><i class="mdui-icon material-icons">&#xe7fd;</i><?php $comments -> author(); ?></span></li>
				<li>&ensp;
					<span><?php $comments -> date('Y / m / d H:i'); ?></span>
					<?php $comments -> reply('— 回复'); ?>
				</li>
			</ul>
		</div>
		<div class="comments-content-span">
			<?php $comments -> content(); ?>
		</div>
	<?php if ($comments->children) { ?>
	<div class="comments-content-for">
		<?php $comments -> threadedComments($options); ?>
	</div>
	<?php } ?>
</div>
<?php } ?>