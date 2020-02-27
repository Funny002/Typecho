<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="var-search var-search-btn">
    <div class="var-search-container">
        <div class="var-search-form">
            <input class="var-search-input" type="text" placeholder="请输入关键字">
            <span class="var-search-submit">
                <i class="fa fa-fw fa-lg fa-search"></i>
            </span>
            <!-- 查询 -->
        </div>
        <script>
            $(function () {
                $('.var-search-input').keydown(function (e) {
                    if (e.keyCode === 13) $('.var-search-submit').click();
                });
                $(".var-search-submit").click(function () {
                    const id_ = $(".var-search-input");
                    window.location.href = "<?=Typecho_Router::url('search', array('keywords' => ""), $this->options->index);?>" + id_.val();
                });
            });
        </script>
        <div class="var-search-body" style="display: none;">
            <hr class="var-search-body-hr"/>
            <div class="var-search-body-container">
                <?php for ($i = 0; $i < 1000; $i++) {
                    echo '测试<br/>';
                } ?>
                <!-- 查询内容 -->
            </div>
        </div>
    </div>
</div>
<!-- #end search -->