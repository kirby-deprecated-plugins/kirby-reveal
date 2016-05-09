<?php
if( site()->user() ) {
	kirby()->routes(array( 
		// Ajax
		array(
			'pattern' => 'plugin.reveal.ajax',
			'method' => 'POST|GET',
			'action'  => function() {
				$out = '';
				$post = kirby()->request()->data();

				// Filename
				$filename = $post['template'] . '.' . $post['fieldkey'];

				// Css
				$cssfile = u() . '/plugin.reveal.css/' . $filename . '.css';

				$template = PluginReveal::template( $filename . '.php' );

				$out .= '<link rel="stylesheet" href="' . $cssfile . '">';
				$out .= str_replace('{{reveal}}', kirbytext( $post['data'] ), $template );

				echo $out;
			}
		),

		// Css custom
		array(
			'pattern' => 'plugin.reveal.css/(:any)',
			'method' => 'GET',
			'action'  => function( $uri ) {
				header("Content-type: text/css; charset: UTF-8");

				$root = c::get('plugin.reveal.path.css', kirby()->roots()->assets() . DS . 'css' . DS . 'reveal');
				$path = $root . DS . $uri;

				if( file_exists( $path ) ) {
					$css = tpl::load( $path );
				} else {
					$path = c::get( 'plugin.reveal.fallback.css' );
					if( file_exists( $path ) ) {
						$css = tpl::load( $path );
					} else {
						$css = tpl::load( kirby()->roots()->plugins() . DS . 'reveal' . DS . 'assets' . DS . 'css' . DS . 'normalize.css' );
					}
				}
				echo $css;
			}
		),

		// Template custom
		array(
			'pattern' => 'plugin.reveal.template/(:any)',
			'method' => 'GET',
			'action'  => function( $uri ) {
				$root = c::get('plugin.reveal.path.template', kirby()->roots()->snippets() . DS . 'reveal');
				$path = $root . DS . $uri;

				if( file_exists( $path ) ) {
					$template = tpl::load( $path );
				} else {
					$path = c::get( 'plugin.reveal.fallback.template' );
					if( file_exists( $path ) ) {
						$template = tpl::load( $path );
					} else {
						$template = '{{reveal}}';
					}
				}
				echo $template;
			}
		),
	));
}