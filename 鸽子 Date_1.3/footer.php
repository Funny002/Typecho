<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div><!-- end #index -->
	<footer class="var-footer">
		&copy; <?php echo date('Y'); ?> <a class="mdui-text-color-theme-accent" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
		<?php _e('由 <a class="mdui-text-color-theme-accent" href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
	</footer><!-- end #footer -->
<?php $this->footer(); ?>
</body>
</html>
