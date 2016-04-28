<?php
class SplitfieldField extends TextareaField {
	public function content() {

		$value = ($this->value() ) ? htmlentities($this->value(), ENT_NOQUOTES, 'UTF-8') : false;
		$buttons = '';

		if($this->buttons and !$this->readonly) {
			$buttons = $this->buttons();
		}

		$locked = ( $this->lock() ) ? ' data-lock="true"' : '';
		$show_html = ( $this->lock() ) ? ' data-show="true"' : '';

		$padding = $this->padding();
		if( isset( $padding ) && $padding === false ) {
			$padding_html = ' data-padding="false"';
		} else {
			$padding_html = ' data-padding="true"';
		}

		$data = [
			'fieldkey' => $this->name(),
			'template' => $this->page()->template(),
			'route' => c::get('plugin.splitfield.route', u() . '/splitfield'),
			'delay' => c::get('plugin.splitfield.preview.delay', 2000 ),
			'lock' =>  $this->lock(),
			'bar' => $this->bar()
		];

		$html = '';
		$html .= tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page(),
			'value' => $value,
			'buttons' => $buttons,
			'locked' => $locked,
			'padding' => $padding_html,
			'show' => $show_html,
			'data' => json_encode($data)
		));
		return $html;
	}

	public function element() {
		$element = parent::element();
		$element->data('field', 'splitfield');
		$element->data('template', $this->page()->template());
		$element->data('route', c::get('plugin.splitfield.route', u() . '/splitfield') );
		$element->data('delay', c::get('plugin.splitfield.preview.delay', 2000 ) );
		return $element;
	}
}