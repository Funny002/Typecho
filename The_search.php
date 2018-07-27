<?php
/**
 * The_search
 * 
 * @package custom
 */
?>
<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
</form>