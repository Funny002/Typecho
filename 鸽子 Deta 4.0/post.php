<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/* === === === 文章页面 === === === */
$this->need('/public/header.php'); ?>

<div class="var-post">
    <div class="var-post-top">
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

        <div class="var-post-sort">
            <?php foreach ($this->stack[0]['categories'] as $k => $v) { ?>
                <a href="<?= $v['permalink']; ?>">
                    <i class="fa fa-fw fa-lg fa-gg"></i>
                    <span><?= $v['name']; ?></span>
                </a>
            <?php } ?>
            <!-- 分类 -->
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
<!-- #end post-->

<div class="var-post-page">
    <?php $this->thePrev('%s', NULL, array('title' => '上一篇')); ?>
    <?php $this->theNext('%s', NULL, array('title' => '下一篇')); ?>
</div><!-- end #var-page--post -->
<?php $this->need('/public/comments.php');
$this->need('/public/footer.php'); ?>
