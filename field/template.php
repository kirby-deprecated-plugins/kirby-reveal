<?php require 'css.php'; ?>
<?php require 'js.php'; ?>

<div class="splitfield"<?php echo $locked . $padding . $show; ?>
	data-splitfield='<?php echo $data; ?>'
>
	<div class="splitfield-content">
		<div class="splitfield-editor">
			<textarea
				class="input"
				name="<?php echo $field->name(); ?>"
				autocomplete="on"
				id="form-field-<?php echo $field->name(); ?>"
				data-field="editor"><?php echo $value; ?></textarea>
				<?php echo $buttons; ?>
		</div>
	</div>
	<div class="splitfield-preview">
		<?php if( $field->bar() !== false ) : ?>
			<div class="splitfield-bar">
				<div class="splitfield-bar-left">
					<ul>
						<li class="splitfield-refresh"><i class="icon fa fa-refresh"></i></li>
						<li class="splitfield-lock">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<i class="fa fa-unlock" aria-hidden="true"></i>
						</li>
					</ul>
				</div>
				<div class="splitfield-bar-center">
					
				</div>
				<div class="splitfield-bar-right">
					<ul>
						<li class="splitfield-close">
							<i class="fa fa-times"></i>
						</li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<iframe></iframe>
	</div>
</div>