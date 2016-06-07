<style>
.field-name-<?php echo $field->name(); ?> .reveal-iframe {
	padding-top: <?php echo RevealTemplate::padding($field); ?>;
	padding-left: <?php echo RevealTemplate::padding($field); ?>;
}
</style>

<?php
#echo "#" . $field->selector() . "#";
#echo "#" . site()->language() . "#";
#echo $page->uri();
?>

<div class="reveal" data-reveal='<?php echo $data; ?>'>
	<div class="reveal-open-trigger">
		<i class="fa fa-chevron-right"></i>
	</div>

	<div class="reveal-preview">
		<div class="reveal-bar">
			<div class="reveal-bar-left">
				<div class="reveal-refresh-trigger reveal-button">
					<i class="fa fa-repeat"></i>
				</div>
			</div>
			<div class="reveal-bar-center">
				<strong><?php echo $field->label; ?></strong> <em>[<?php echo $field->name(); ?>]</em>
			</div>
			<div class="reveal-bar-right">
				<div class="reveal-close-trigger reveal-button">
					<i class="fa fa-times"></i>
				</div>
			</div>
		</div>
		<div class="reveal-iframe">
			<iframe id="iframe-<?php echo $field->name(); ?>"></iframe>
		</div>
	</div>
</div>