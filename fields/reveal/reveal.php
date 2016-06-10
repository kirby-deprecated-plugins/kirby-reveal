<?php
class revealField extends TextareaField {
	static public $assets = array(
		'css' => array(
			'style.css',
		),
		'js' => array(
			'dist/concat.min.js',
		)
	);
	public function content() {
		$data = [
			'id' => $this->page()->id(),
			'uri' => $this->page()->uri(),
			'fieldkey' => $this->name(),
			'template' => $this->page()->template(),
			'root' => u(),
			'delay' => c::get('plugin.reveal.delay', 1000 ),
			'selector' => $this->selector(),
			'language' => site()->language(),
			'template' => $this->__call('template', null),
			'filter' => ( $this->filter() === false ) ? 0 : 1
		];

		$html = tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page(),
			'data' => json_encode($data)
		));

		$html .= parent::content();
		return $html;
	}

	public function element() {
		$element = parent::element();
		$element->data('field', 'reveal');
		return $element;
	}
}