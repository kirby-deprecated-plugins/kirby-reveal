<?php
namespace Reveal;
use page;

class Manipulate extends Page {
	function __construct($parent, $dirname) {
		parent::__construct($parent, $dirname);
		$this->revealValues = array();
		if(isset($_SESSION['kirby_panel_changes'])) {
			$changes = $_SESSION['kirby_panel_changes'];
			$this->revealValues = reset($changes);
		}
	}

	function title() {
		return $this->__call('title');
	}

	function __call($key, $arguments = NULL){
		$call = parent::__call($key, $arguments = NULL);
		if(is_object($call) && get_class($call) == 'Field') {
			if(is_array($this->revealValues) && array_key_exists($key, $this->revealValues)) {
				$call->value = $this->revealValues[$key];
			}
		}
		return $call;
	}
}