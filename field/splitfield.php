<?php
class SplitfieldField extends TextareaField {
	public function content() {

		$value = ($this->value() ) ? htmlentities($this->value(), ENT_NOQUOTES, 'UTF-8') : false;
		$buttons = '';

		if($this->buttons and !$this->readonly) {
			$buttons = $this->buttons();
		}

		$refresh = tpl::load( __DIR__ . DS . 'refresh.php', $data = array(
		));

		$html = '';
		$html .= tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page(),
			'value' => $value,
			'buttons' => $buttons,
			'refresh' => $refresh
		));
		return $html;
	}

	public function element() {
		$element = parent::element();
		$element->data('field', 'splitfield');
		return $element;
	}

	// http://localhost/splitfield/panel/pages/home/field/test/splitfield/ajax/var1/var2
	/*public function routes() {
		return array(
			array(
				'pattern' => 'ajax/(:any)/(:any)',
				'method'  => 'get',
				'action' => function($var1, $var2) {

					$html = '';
					$html .= tpl::load( __DIR__ . DS . 'template-site.php', $data = array(
						'field' => $this,
						'page' => $this->page()
					));

					return $html;
					echo $html;

					return response::json( array( $var1, $var2 ) );
				}
			)
		);
	}*/

	public function routes() {
		return array(
			array(
				'pattern' => 'ajax',
				'method'  => 'POST',
				'action' => function() {

					$html = '';
					$html .= tpl::load( __DIR__ . DS . 'template-site.php', $data = array(
						'field' => $this,
						'page' => $this->page()
					));

					return $html;
					echo $html;

					return response::json( array( $var1, $var2 ) );
				}
			)
		);
	}
}