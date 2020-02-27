<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
foreach ($this->stack as $k => $v): $article = article_generate($v, $this->author->stack); ?>
    <article class="var-article">
        <div class="var-article-top">
            <div class="var-article-top-img" style="background-image: url('<?= $article['image'] ?>')"></div>
            <div class="var-article-top-nav"><!-- 罩层 --></div>
            <a class="var-article-top-btn" href="<?= $article['link']; ?>">
                <i class="fa fa-fw fa-2x fa-angle-right"></i>
            </a>
        </div>
        <div class="var-article-container">
            <span class="var-article-title"><?= $article['title']; ?></span>
            <div class="var-article-menu">
                <a class="var-article-menu-list" href="<?= $article['user']['link'] ?>">
                    <i class="fa fa-fw fa-lg fa-user-circle"></i>
                    <span><?= $article['user']['name'] ?></span>
                    <!-- 用户 -->
                </a>
                <div class="var-article-menu-list">
                    <i class="fa fa-fw fa-lg fa-calendar"></i>
                    <span><?= $article['time']; ?></span>
                    <!-- 时间 -->
                </div>
                <a class="var-article-menu-list" href="<?= $article['categories']['link']; ?>">
                    <i class="fa fa-fw fa-lg fa-gg"></i>
                    <span><?= $article['categories']['name']; ?></span>
                    <!-- 分类 -->
                </a>
                <div class="var-article-menu-list">
                    <i class="fa fa-fw fa-lg fa-comments"></i>
                    <span><?= $article['commentsNum']; ?></span>
                    <!-- 评论 -->
                </div>
            </div>
            <div class="var-article-text">
                <?php
                $text = Typecho_Common::subStr(strip_tags($article['text']), 0, 80, '...');
                echo $text === "" ? '没有文字内容' : $text;
                ?>
            </div>
        </div>
    </article>
<?php endforeach; ?>