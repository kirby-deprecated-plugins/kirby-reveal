<?php
$url = url('reveal/' . $page->id());
if(site()->language()) {
	if(site()->defaultLanguage()->code() != site()->language()->code()) {
		$url = $page->url('de');
	}
}
?>

<div class="rvl-preview">
	<div class="rvl-notify">
		<i class="fa fa-check"></i>
	</div>

	<div class="rvl-iframe">
		<iframe src="<?php echo $url; ?>"></iframe>
		<iframe src="<?php echo $url; ?>"></iframe>
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