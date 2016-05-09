<?php
require 'routes.php';
$kirby->set('field', 'reveal',  __DIR__ . DS . 'field');

class PluginReveal {
	// Template for route
	public static function template( $uri ) {
		$root = c::get('plugin.reveal.path.template', kirby()->roots()->snippets() . DS . 'reveal');
		$path = $root . DS . $uri;

		if( file_exists( $path ) ) {
			$template = tpl::load( $path );
		} else {
			$template = '{{reveal}}';
		}
		return $template;
	}
}