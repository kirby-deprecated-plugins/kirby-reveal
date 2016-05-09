<style>
.reveal-content {
	position: relative;
}
.reveal-preview {
	background: #fff;
	border: 2px solid #ddd;
	margin-top: .5em;
	display: none;
}

/* Padding */
.reveal[data-padding="true"] ..reveal-preview-wrap {
	padding: .5em;
}

/* Lock */
.reveal .reveal-lock .fa-lock {
	display: none;
}
.reveal .reveal-lock .fa-unlock {
	display: block;
	opacity: .25;
}

.reveal[data-show="true"] .reveal-preview {
	display: block;
}
.reveal[data-lock="true"] .reveal-lock .fa-lock {
	display: block;
}
.reveal[data-lock="true"] .reveal-lock .fa-unlock {
	display: none;
}

.reveal-editor {
	position: relative;
}

.reveal iframe {
	border: none;
	width: 100%;
	vertical-align: bottom;
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
	border: 2px solid #ddd;
}

.reveal-bar {
	border-bottom: 1px solid #efefef;
	display: flex;
	align-items: center;
	justify-content: center;
}

.reveal-bar ul {
	display: flex;
	align-items: center;
	justify-content: center;
}

.reveal-bar li {
	list-style: none;
	padding: .5em 1.5em;
	cursor: pointer;
	border-left: 1px solid #efefef;
	width: 70px;
	text-align: center;
}

.reveal-bar li:first-child {
	border-left: none;
}

.reveal-bar-center {
	flex-grow: 1;
}
</style>