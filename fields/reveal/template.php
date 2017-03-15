<div class="rvl-preview">
	<?php #include __DIR__ . DS . 'bar.php'; ?>
	<div class="rvl-iframe">
		<iframe src="<?php echo $page->url(); ?>"></iframe>
	</div>
	<?php if(site()->language()) : ?>
		<?php echo site()->language(); ?>
		<style>
		.rvl-action {
			margin-right: 8.5em;
		}
		</style>
	<?php endif; ?>
</div>