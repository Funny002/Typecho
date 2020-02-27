<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div class="var-icon var-sign">
    <i class="fa fa-fw fa-lg fa-user"></i>
    <div class="var-sign-in">
        <div class="var-sign-input">
            <input id="in-mail" type="text" placeholder="请输入邮箱">
            <input id="in-pass" type="password" placeholder="请输入密码">
            <input id="in-link" type="hidden" value="<?php $this->options->adminUrl('login.php'); ?>">
        </div>
        <div class="var-sign-btn">
            <span id="in-btn">立即登录</span>
            <div class="var-sign-btn-div">
                <label>
                    <input type="checkbox">
                    <span>记住密码</span>
                </label>
                <div style="margin: 0 auto"><!-- 占位符 --></div>
                <?php if ($this->options->row['allowRegister'] === '1') {
                    echo '<span class="var-sign-btn-to">立即注册</span>';
                } ?>
            </div>
        </div>
    </div>
    <?php if ($this->options->row['allowRegister'] === '1'): ?>
        <div class="var-sign-up">
            <div class="var-sign-input">
                <input id="up-name" type="text" placeholder="请输入昵称">
                <input id="up-mail" type="text" placeholder="请输入邮箱">
                <input id="up-link" type="hidden" value="<?php $this->options->adminUrl('register.php'); ?>">
            </div>
            <div class="var-sign-btn">
                <span id="in-btn">立即注册</span>
                <div class="var-sign-btn-div">
                    <div style="margin: 0 auto"><!-- 占位符 --></div>
                    <span class="var-sign-btn-to">立即登录</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>