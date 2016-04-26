<style>/*
.splitfield {
	display: flex;
}
.splitfield-content {
	width: 50%;
}
*/
.splitfield {
	display: flex;
}
.splitfield-content,
.splitfield-preview {
	width: 50%;
}
.splitfield-content {
	position: relative;
}
.splitfield-preview {
	padding: .5em;
	background: #fff;
	border: 2px solid #ddd;
}

.splitfield-editor {
	position: relative;
}

.splitfield iframe {
	border: none;
	/*border: 1px solid #eee;*/
	width: 100%;
}

.field-name-<?php echo $field->name(); ?> .field-content {
	background: #fff;
	border: 2px solid #ddd;
}

.field-name-<?php echo $field->name(); ?> .field-content:after {
	content: '';
	clear: both;
	display: table;
}

.field-name-<?php echo $field->name(); ?> textarea {
	border: none;
	border: 2px solid #ddd;
}

</style>

<script>

(function($) {
	$.fn.splitfield = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'splitfield';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			var blueprint_key = $('[data-field="' + fieldname + '"]').find('[name]').attr('name');
			var selector = '.field-name-' + blueprint_key;
			var data_obj = $(selector + ' textarea');
			var data = data_obj.val();
			console.log(data);

			// Ajax call - Ajax is optional
			$.fn.ajax(fieldname, data);

			$( ".field-button-refresh" ).click(function() {
				console.log('Refresh');
				$.fn.ajax(fieldname, data);
			});

		});
	};

	// Ajax function - Ajax is optional
	/*$.fn.ajax = function(fieldname, data) {
		var blueprint_key = $('[data-field="' + fieldname + '"]').find('[name]').attr('name');
		var base_url = window.location.href.replace('/edit', '/field') + '/' + blueprint_key + '/' + fieldname + '/ajax/';

		var selector = '.field-name-' + blueprint_key;
		console.log( base_url + 'test/test' );
		$.ajax({
			url: base_url + 'test/test',
			type: 'GET',
			success: function(result) {
				var obj = $(selector + ' iframe').attr('srcdoc', result + Date.now());

				obj.load(function() {
					this.style.height = $(this).contents().height() + 'px';
				});
			}
		});
	};*/

	$.fn.ajax = function(fieldname, data) {
		var blueprint_key = $('[data-field="' + fieldname + '"]').find('[name]').attr('name');
		var base_url = window.location.href.replace('/edit', '/field') + '/' + blueprint_key + '/' + fieldname + '/ajax/';

		var selector = '.field-name-' + blueprint_key;
		console.log( data );
		$.ajax({
			url: base_url,
			type: 'POST',
			data: data,
			success: function(result) {
				var obj = $(selector + ' iframe').attr('srcdoc', result + Date.now());

				obj.load(function() {
					this.style.height = $(this).contents().height() + 'px';
				});
			}
		});
	};
})(jQuery);
</script>

<div class="splitfield">
	<div class="splitfield-content">
		<div class="splitfield-editor">
			<textarea
				class="input"
				name="<?php echo $field->name(); ?>"
				autocomplete="on"
				id="form-field-<?php echo $field->name(); ?>"
				data-field="editor"><?php echo $value; ?></textarea>
				<?php echo str_replace( '</ul>', $refresh . '</ul>', $buttons ); ?>
		</div>
	</div>
	<div class="splitfield-preview">
			<iframe></iframe>
	</div>
</div>