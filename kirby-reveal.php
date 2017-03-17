<?php
require_once __DIR__ . DS . 'lib' . DS . 'routes.php';
require_once __DIR__ . DS . 'lib' . DS . 'preview.php';
require_once __DIR__ . DS . 'lib' . DS . 'manipulate.php';

$kirby->set('field', 'reveal', __DIR__ . DS . 'fields' . DS . 'reveal');
$kirby->set('blueprint', 'fields/reveal', __DIR__ . DS . 'fields' . DS . 'reveal' . DS . 'definition.yml');