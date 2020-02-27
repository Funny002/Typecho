<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/** === === === 不知道作用 === === === */
$this->need('/public/header.php'); ?>
    <style>
        .var-archive {
            width: 90%;
            max-width: 1024px;
            border-radius: 8px;
            margin: 8px 0 16px;
            transition: width .3s;
            background-color: #fff;
            box-shadow: 0 0 3px #ddd;
        }

        .var-archive > * {
            width: 100%;
            display: block;
        }

        .var-archive-title {
            height: 40px;
            font-size: 18px;
            font-weight: 600;
            line-height: 40px;
            padding-left: 8px;
        }

        .var-archive-title > span {
            padding: 0 4px;
            font-size: 16px;
            font-weight: 600;
        }

        .var-archive-body {
            height: 25px;
            margin-left: 8px;
            line-height: 25px;
            padding-left: 8px;
            margin-bottom: 8px;
            width: calc(100% - 7px);
            border-left: 4px solid #ddd;
        }

    </style>
    <div class="var-index-container">
        <div class="var-archive">
            <span class="var-archive-title">
            <?php $this->archiveTitle(array(
                'tag' => _t('标签<span>%s</span>下的文章'),
                'author' => _t('<span>%s</span>发布的文章'),
                'category' => _t('分类<span>%s</span>下的文章'),
                'search' => _t('包含关键字<span>%s</span>的文章')
            ), '', ''); ?>
            </span>
            <?= $this->have() ? '' : '<span class="var-archive-body">没有找到内容</span>'; ?>
        </div>
        <?php $this->need('/public/article.php'); ?>
    </div>

<?php $this->need('/public/pagenav.php'); ?>
<?php $this->need('/public/footer.php'); ?>