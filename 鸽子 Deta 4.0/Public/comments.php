<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->comments()->to($comments); ?>
    <div class="comment">
        <?php if ($comments->have()): ?>
            <div class="comment-top">
                <a href="#<?php $this->respondId(); ?>">
                    <span><?php $this->commentsNum('暂无评论', '已有 %d 条评论'); ?></span>
                    <span>- 去评论</span>
                </a>
                <div class="comment-top-page"></div>
                <!-- top -->
            </div>
            <?php $comments->listComments();
            $comments->pagenav('<i class="fa fa-fw fa-lg fa-angle-double-left"></i> ', '<i class="fa fa-fw fa-lg fa-angle-double-right"></i>', 2, ''); ?>
        <?php endif;
        if ($this->allow('comment')): ?>
            <div class="comment-body" id="<?php $this->respondId(); ?>">
                <form method="post" action="<?php $this->commentUrl() ?>">
                    <div class="comment-body-top">
                        <?php if ($this->user->hasLogin()): ?>
                            <span class="comment-body-top-user">
	    					    <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
	    					    <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a>
    					    </span>
                        <?php else: ?>
                            <a class="comment-body-top-user" href="<?php $this->options->adminUrl('login.php'); ?>" title="Login">去登录？</a>
                        <?php endif; ?>
                        <div class="comment-body-top-reply">您正在回复 '<a></a>'<?php $comments->cancelReply(); ?></div>
                    </div>
                    <div class="comment-body-container <?= $this->user->hasLogin() ? 'login' : ''; ?>">
                        <?php if (!$this->user->hasLogin()): ?>
                            <div class="comment-body-input">
                                <div>
                                    <i class="fa fa-fw fa-lg fa-user-circle"></i>
                                    <input type="text" name="author" placeholder="昵称  (必须)" value="<?php $this->remember('author'); ?>" required/>
                                </div>
                                <div>
                                    <i class="fa fa-fw fa-lg fa-envelope-o"></i>
                                    <input type="email" name="mail" placeholder="邮箱  (必须)" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                                </div>
                                <div>
                                    <i class="fa fa-fw fa-lg fa-paperclip"></i>
                                    <input type="url" name="url" placeholder="http:// (可选)" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="comment-body-text">
                            <textarea name="text" required><?php $this->remember('text'); ?></textarea>
                        </div>
                        <button class="comment-body-btn" type="submit">
                            <i class="fa fa-fw fa-lg fa-paper-plane-o"></i>
                            <span>提交评论</span>
                        </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <h3>评论已关闭</h3>
        <?php endif; ?>
        <script>
            $(function () {
                (function () {
                    let id = $('.page-navigator');
                    if (id.length === 1) {
                        const row = id.find('.current > a').text() - 0;
                        const link = (id.find('.current > a').attr('href')).replace(/\d{1,3}#[\w]+/, '');
                        const max = id.find('li').eq(id.find('.next').length === 1 ? id.find('li').length - 2 : id.find('li').length - 1).text() - 0;
                        const last = row > 1 ? `<a  class="comment-top-page-a" href="${link + (row - 1)}"> <i class="fa fa-fw fa-lg fa-angle-double-left"></i> </a>` : '';
                        const next = max > row ? `<a class="comment-top-page-a" href="${link + (row + 1)}"><i class="fa fa-fw fa-lg fa-angle-double-right"></i></a>` : '';
                        $('.comment-top-page').html(function (i, y) {
                            return y + last + next + `<div class="comment-top-page-nav">
                                <span class="comment-top-page-t"><em>|</em>${max}</span>
                                <input class="comment-top-page-input" placeholder="${row}">
                                <span class="comment-top-page-btn" data-link="${link}" data-max="${max}">Go</span>
                            </div>`;
                        });
                    } else {
                        $('.comment-top-page').remove();
                    }
                })();
                /** === === === 动态按钮事件 === === ===*/
                $('.comment-top-page-input').keydown(function (e) {
                    if (e.keyCode === 13) $('.comment-top-page-btn').click();
                });
                $('.comment-top-page-btn').click(function () {
                    const id = $('.comment-top-page-input');
                    const max = $(this).attr('data-max');
                    const row = id.val();
                    if (row + '' !== 'NaN' && row > 0 && row <= max) {
                        window.location.href = $(this).attr('data-link') + row;
                    } else {
                        console.log('No'); // 无效
                    }
                });
            });
        </script>
    </div>
    <!-- #end comments -->
<?php
/**
 * ======================================================
 * ============== 自定义评论 =============================
 * ======================================================
 */
function threadedComments($comments, $options)
{ ?>
    <li id="comment-<?= $comments->coid; ?>">
        <div class="comment-list-container">
            <div class="comment-list-user">
                <div class="comment-list-avatar">
                    <img src="<?= mailAvatar($comments->mail); ?>" alt="<?= $comments->author; ?>">
                </div>
                <div class="comment-list-user-container">
                    <div class="comment-list-user-name">
                        <a <?= $comments->url ? 'href="' . $comments->url . '"' : '' ?> data-id="#comment-<?= $comments->coid; ?>"><?= $comments->author; ?></a>
                        <!-- <span style="background-color: #aaa;">#<? //= $comments->coid;
                        ?></span>-->
                        <?php if ($comments->authorId && $comments->authorId == $comments->ownerId) {
                            echo '<span>作者</span>';
                        } ?>
                    </div>
                    <div class="comment-list-user-time"><?php $comments->date('Y/m/d H:i:s'); ?></div>
                    <div class="comment-list-user-other">
                        <?php $browser = browser($comments->agent); ?>
                        <div class="comment-list-user-other-browser <?= strtolower($browser[0]); ?>">
                            <span><?= $browser[0]; ?></span><!-- 浏览器 --><span><?= $browser[1]; ?></span>
                        </div>
                    </div>
                    <!-- 评论用户 -->
                </div>
            </div>
            <?php $comments->reply('<i class="fa fa-fw fa-lg fa-share"></i>'); ?>
            <div class="comment-list-text"><?php $comments->content(); ?></div>
        </div>
        <?php if ($comments->children): ?>
            <div class="comment-list-body">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php endif; ?>
    </li>
<?php } ?>