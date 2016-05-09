<div class="reveal"<?php echo $locked . $padding . $show; ?>
	data-reveal='<?php echo $data; ?>'
>
	<div class="reveal-content">
		<div class="reveal-editor">
			<textarea
				class="input"
				name="<?php echo $field->name(); ?>"
				autocomplete="on"
				id="form-field-<?php echo $field->name(); ?>"
				data-field="editor"><?php echo $value; ?></textarea>
				<?php echo $buttons; ?>
		</div>
	</div>
	<div class="reveal-preview">
		<?php if( $field->bar() !== false ) : ?>
			<div class="reveal-bar">
				<div class="reveal-bar-left">
					<ul>
						<li class="reveal-refresh"><i class="icon fa fa-refresh"></i></li>
						<li class="reveal-lock">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<i class="fa fa-unlock" aria-hidden="true"></i>
						</li>
					</ul>
				</div>
				<div class="reveal-bar-center">
					
				</div>
				<div class="reveal-bar-right">
					<ul>
						<li class="reveal-close">
							<i class="fa fa-times"></i>
						</li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<div class="reveal-preview-wrap">
			<iframe></iframe>
		</div>
	</div>
</div>

<?php require 'css.php'; ?>
<?php require 'js.php'; ?>