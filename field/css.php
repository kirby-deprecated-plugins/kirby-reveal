<style>
.splitfield-content {
	position: relative;
}
.splitfield-preview {
	background: #fff;
	border: 2px solid #ddd;
	margin-top: .5em;
	display: none;
}

/* Padding */
.splitfield[data-padding="true"] .splitfield-preview {
	padding: .5em;
}

/* Lock */
.splitfield .splitfield-lock .fa-lock {
	display: none;
}
.splitfield .splitfield-lock .fa-unlock {
	display: block;
	opacity: .25;
}

.splitfield[data-show="true"] .splitfield-preview {
	display: block;
}
.splitfield[data-lock="true"] .splitfield-lock .fa-lock {
	display: block;
}
.splitfield[data-lock="true"] .splitfield-lock .fa-unlock {
	display: none;
}

.splitfield-editor {
	position: relative;
}

.splitfield iframe {
	border: none;
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
	border: 2px solid #ddd;
}

.splitfield-bar {
	border-bottom: 1px solid #efefef;
	margin: -.5em;
	display: flex;
	align-items: center;
	justify-content: center;
}

.splitfield-bar ul {
	display: flex;
	align-items: center;
	justify-content: center;
}

.splitfield-bar li {
	list-style: none;
	padding: .5em 1.5em;
	cursor: pointer;
	border-left: 1px solid #efefef;
	width: 70px;
	text-align: center;
}

.splitfield-bar li:first-child {
	border-left: none;
}

.splitfield-bar-center {
	flex-grow: 1;
}

.splitfield .field-button-link,
.splitfield .field-button-email {
	display: none;
}

</style>