<?php if (!defined('__TYPECHO_ROOT_DIR__'))exit ; ?>
<div class="var-comments mdui-clearfix mdui-p-l-0 mdui-p-r-0">
    <?php $this->comments()->to($comments); if ($comments->have()): ?>	
	<div class="var-comments-top">
		<div class="var-top-left mdui-float-left">				
			<span><?php $this -> commentsNum(_t('暂无评论,快去评论吧'),_t('%d&ensp;评论'),_t('%d&ensp;评论')); ?></span>
		</div>
		
		<div class="var-top-right mdui-float-right">
	    	<?php $comments -> pageNav('上一页', '下一页', 0, '...'); ?>
		</div>
	</div>
	
	
	<div class="comments-body">
	    <?php $comments -> listComments(); ?>
	<hr style="border: none; height: 0; border-top: 1px solid #ddd;" />
	    <div class="var-top-right">
		   	<?php $comments -> pageNav('上一页', '下一页', 0, '...'); ?>
		</div>
    </div>
    
    <?php endif; ?>
    
    <?php if($this->allow('comment')): ?>
    <div class="var-comments-index" id="<?php $this -> respondId(); ?>">
    	<div class="var-comments-left">
    		<div class="var-comments-left-img">
    			<img class="comments-img" src="<?php $this -> options -> themeUrl('../../uploads/avatarCache/default.jpg'); ?>"/>
    			<?php if($this->user->hasLogin()): ?>
    				<a href="<?php $this -> options -> logoutUrl(); ?>" title="注销">注销</a>
    			<?php else: ?>
    				<a href="<?php $this -> options -> adminUrl('login.php'); ?>"  title="登录" >登录</a>
    			<?php endif; ?>
    			<?php $comments -> cancelReply(); ?>
    		</div>
    	</div>
    	<div class="var-comments-right">
    		<form method="post" action="<?php $this->commentUrl() ?>">
    			<div class="var-post-top">
    				<ul style="padding: 0; margin: 0;">
    					<?php if($this->user->hasLogin()): ?>
    					<li>
    						<span>昵称 : <a class="mdui-m-l-1" style="color: #86a9f8;" href="<?php $this -> options -> profileUrl(); ?>"  title="个人信息"><?php $this -> user -> screenName(); ?></a></span>
    					</li>
    					<?php else: ?>
    					<li>
	   						<span class="span-s">昵称 :</span>
	   						<input type="text"  name="author" value="<?php $this -> remember('author'); ?>" required />
	   					</li>
	   					<li>
	   						<span class="span-s">邮箱 :</span>
	   						<input type="email" name="mail" value="<?php $this -> remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
	   					</li>
	   					<li>		   								
	   						<span class="span-s">网站 :</span>
	   						<input type="url"   name="url" value="<?php $this -> remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />	
	   					</li>
    					<?php endif; ?>
    				</ul>
    			</div>
    			<div class="var-post-index">    					
	    			<div class="var-post-index-text mdui-float-left">
	    				<textarea name="text" required ><?php $this -> remember('text'); ?></textarea>
	   				</div>
	   				<div class="var-post-index-btn mdui-float-left">
	   					<button type="submit" class="submit">发布评论</button>
	   				</div>
    			</div>
		    </form>
	    </div>
	</div>
	<?php else: ?>
	<div>
	 	<span><?php _e('评论已关闭'); ?></span>
	</div>
	<?php endif; ?>
		
			
</div>

<?php function threadedComments($comments, $options) {
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

<div class="comment" id="<?php $comments -> theId(); ?>">
	<div class="comment-author">
		<ul>
			<li><?php $comments -> gravatar('64', ''); ?></li>
			<li><?php $comments -> reply('快速回复'); ?></li>
		</ul>
	</div>
	<div class="comment-author-div">
		<div class="comment-name">
			<ul>
				<li class="mdui-typo"><?php $comments -> author(); ?></li>
				<li>时间 : <?php $comments -> date('Y/m/d H:i'); ?></li>
			</ul>
		</div>
		<div class="comment-content">
			<?php $comments -> content(); ?>
		</div>
	</div>
	<?php if ($comments->children) { ?>
	<div class="comment-children">
		<?php $comments -> threadedComments($options); ?>
	</div>
	<?php } ?>
</div>

<?php } ?>


<?php /*

	 <?php $comments->author(); ?>			作者			a
	 <?php $comments->reply(); ?>			回复			a
	 <?php $comments->content(); ?>			评论			p
	 <?php $comments->gravatar('40',''); ?>	头像			img
	 <?php $comments->date('Y/m/d H:i'); ?> 	时间			无格式
	 <?php $comments->permalink(); ?> 		评论连接地址	无格式

	 */
 ?>