<?php
class RevealField extends BaseField {
	static public $fieldname = 'reveal';
	static public $assets = array(
		'js' => array(
			'dist/script.min.js',
		),
		'css' => array(
			'style.css',
		)
	);

	public function input() {
		$html = tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page()
		));
		return $html;
	}

	public function element() {
		$element = parent::element();
		$element->data('field', self::$fieldname);

		if(!site()->language()) {
			$element->data('refresh', c::get('plugin.reveal.refresh', 2000));
		} else {
			if(site()->defaultLanguage()->code() != site()->language()->code()) {
				$element->data('refresh', 0);
			} else {
				$element->data('refresh', c::get('plugin.reveal.refresh', 2000));
			}
		}
		return $element;
	}
}