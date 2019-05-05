<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div id="sidebar">
    <div class="sidebar-top">
        <div class="siebar-logo" style="background-image:url('<?php if($this->options->logoUrl){
            $this->options->logoUrl();
        }else{
            $this->options->themeUrl('Img/logo.jpg');
        } ?>');"></div>
        <span><?php $this->options->description(); ?></span>
    </div>
    <div class="sidebar-maet">
        <ul class="mdui-list">
            <a class="mdui-list-item mdui-ripple" href="<?php $this->options->siteUrl(); ?>">
                <ion-icon class="mdui-list-item-icon mdui-icon" name="home"></ion-icon>
                <div class="mdui-list-item-content">首页</div>
            </a>

            <?php $this->widget('Widget_Contents_Page_List')->to($pages); while($pages->next()):?>

                <a class="mdui-list-item mdui-ripple" href="<?php $pages->permalink(); ?>">
                    <ion-icon class="mdui-list-item-icon mdui-icon" name="<?= ion_icon($pages->row['title']); ?>"></ion-icon>
                    <div class="mdui-list-item-content"><?php $pages->title();?></div>
                </a>
                
            <?php endwhile; ?>

        </ul>
    </div>
</div><!-- end #sidebar -->

<!--
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章');?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
    ->parse('<li><a href="{permalink}">{title}</a></li>');?>
        </ul>
    </section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复');?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments);?>
        <?php while ($comments->next()): ?>
            <li><a href="<?php $comments->permalink();?>"><?php $comments->author(false);?></a>: <?php $comments->excerpt(35, '...');?></li>
        <?php endwhile;?>
        </ul>
    </section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类');?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list');?>
	</section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档');?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
    ->parse('<li><a href="{permalink}">{date}</a></li>');?>
        </ul>
	</section>
    <?php endif;?>
    
</div> -->
