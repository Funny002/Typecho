<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="footer">
&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
<?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>.
</footer>
<?php $this->footer(); ?>
	</div><!-- end # index -->
</body>
</html>