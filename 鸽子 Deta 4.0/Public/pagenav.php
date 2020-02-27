<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$page = array(
    'max' => $this->getTotal(), // 文章总数
    'page' => $this->parameter->pageSize, // 一页几篇文章
    'link' => $this->options->index . '/page/', // 链接
    'row' => is_null($this->request->page) ? 1 : $this->request->page, // 当前分页
);
$page['nav'] = ceil($page['max'] / $page['page']);
if ($page['max'] > $page['page']): ?>
    <div class="var-page">
        <?php if ($page['row'] > 1) { ?>
            <a class="var-page-last" href="<?= $page['link'] . ($page['row'] - 1); ?>">上一页</a>
        <?php } ?>
        <?php if ($page['nav'] > $page['row']) { ?>
            <a class="var-page-next" href="<?= $page['link'] . ($page['row'] + 1); ?>">下一页</a>
        <?php } ?>
        <div class="var-page-nav">
            <span><em>|</em><?= $page['nav']; ?></span>
            <input class="var-page-value" type="text" placeholder="<?= $page['row']; ?>">
            <span class="var-page-btn" data-link="<?= $page['link']; ?>" data-val="<?= $page['nav']; ?>">Go</span>
        </div>
    </div>
<?php endif; ?>