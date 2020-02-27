<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/* === === === 独立页面 === === === */
$this->need('/public/header.php'); ?>

<div class="var-post">
    <div class="var-post-top" style="padding-top: 50px;">
        <div class="var-post-image" style="background-image: url('<?= article_image(''); ?>');"><!-- 背景 --></div>
        <div class="var-post-title">
            <span><?php $this->title() ?></span>
            <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?> : 著</a>
            <!-- 标题 & 作者 -->
        </div>
        <div class="var-post-time">
            <a>
                <i class="fa fa-fw fa-lg fa-calendar"></i>
                <span><?php $this->date('m/d H:i:s'); ?></span>
            </a>
            <a>
                <i class="fa fa-fw fa-lg fa-calendar-check-o"></i>
                <span><?= date('m/d H:i:s', $this->stack[0]['modified']); ?></span>
            </a>
            <!-- 时间 -->
        </div>

        <div class="var-post-tags">
            <?php $tga_color = array('FF3F63', 'D3DD00', '498CF6', '00DD75', '00DD75', 'DD50DC', '9744DD');
            if ($this->tags): foreach ($this->tags as $k => $v) { ?>
                <a href="<?= $v['permalink']; ?>" style="background-color: #<?= $tga_color[$k]; ?>;">
                    <i class="fa fa-fw fa-lg fa-tags"></i>
                    <span><?= $v['name']; ?></span>
                </a>
            <?php } else: echo '<a><i class="fa fa-fw fa-lg fa-tags"></i><span>none</span></a>'; endif; ?>
            <!-- 标签 -->
        </div>

    </div>
    <div class="var-post-content">
        <?php $this->content(); ?>
        <!-- 内容 -->
    </div>
</div>
<!-- #end page-->

<?php
$this->need('/public/comments.php');
$this->need('/public/footer.php');
?>