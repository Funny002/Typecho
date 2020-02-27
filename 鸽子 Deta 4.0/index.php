<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 这是"鸽子"的Typecho主题它已经到4.0了
 * @package 鸽子 Theme
 * @author Re Funny
 * @version 4.0 Date
 * @link https://github.com/Funny002/Typecho
 */
$this->need('/public/header.php'); ?>
    <div class="var-index-container">
        <?php $this->need('/public/article.php'); ?>
    </div>
<?php $this->need('/public/pagenav.php'); ?>
<?php $this->need('/public/footer.php'); ?>