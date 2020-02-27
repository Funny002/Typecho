<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <title><?= $this->options->title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <?php $this->header('commentReply=&template=鸽子_4.0_Beta&generator=&rss1=&rss2='); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/Style/style.min.css'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php $this->options->themeUrl('Image/icon.png'); ?>"/>
</head>
<body class="before-blur" style="background-image: url('<?php $this->options->themeUrl('Image/background.png'); ?>')">
<div class="var-error">
    <div class="var-error-head">
        <div class="var-error-logo">
            <div>
                <img src="<?php $this->options->themeUrl($this->options->logoUrl ? '' : 'Image/logo.png'); ?>" alt="logo">
                <!-- 外框 -->
            </div>
        </div>
        <div class="var-error-line line-b"><!-- 线 --></div>
    </div>
    <div class="var-error-body">
        <span class="var-error-title">404</span>
        <span>对不起，您要找的页面丢失了，(＞人＜)</span>
        <span>欢迎来到我的个人世界!</span>
    </div>
    <div class="var-error-foot">
        <div class="var-error-line line-t"><!-- 线 --></div>
        <div class="var-error-nav">
            <a href="/">首页</a>
            <?php foreach ($this->widget('Widget_Contents_Page_List')->stack as $k => $v): ?>
                <a href="<?= $v['permalink'] ?>"><?= $v['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>