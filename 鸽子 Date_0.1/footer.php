<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
		<footer class="var-footer">
		    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
		    <?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
		</footer><!-- end #footer -->
	</div><!-- end #index -->
<?php $this->footer(); ?>
</body>
</html>
