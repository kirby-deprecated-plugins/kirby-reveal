<?php
buttons::$setup = array(
  'bold' => array(
    'label'    => l::get('fields.textarea.buttons.bold.label'),
    'text'     => l::get('fields.textarea.buttons.bold.text'),
    'shortcut' => 'meta+b',
    'template' => '**{text}**',
    'icon'     => 'bold'
  ),
  'italic' => array(
    'label'    => l::get('fields.textarea.buttons.italic.label'),
    'text'     => l::get('fields.textarea.buttons.italic.text'),
    'shortcut' => 'meta+i',
    'template' => '*{text}*',
    'icon'     => 'italic'
  ),
  'link' => array(
    'label'    => l::get('fields.textarea.buttons.link.label'),
    'shortcut' => 'meta+shift+l',
    'action'   => 'link',
    'icon'     => 'chain'
  ),
  'email' => array(
    'label'    => l::get('fields.textarea.buttons.email.label'),
    'shortcut' => 'meta+shift+e',
    'action'   => 'email',
    'icon'     => 'envelope'
  ),
);