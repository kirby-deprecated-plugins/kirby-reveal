<?php

class revealFieldController extends Kirby\Panel\Controllers\Field {
  
  public function link() {

    $page = $this->model();
    $form = $this->form('link', array($page, $this->fieldname()));

    return $this->modal('link', compact('form'));

  }
  
  public function pagelink() {
  
      $page = $this->model();  
      return $this->modal('pagelink', array('fieldname' => $this->fieldname(), 'textarea' => $this));
  
    }

  public function email($textarea = null) {
    
    $page = $this->model();
    $form = $this->form('email', array($page, $this->fieldname()));

    return $this->modal('email', compact('form'));

  }

}