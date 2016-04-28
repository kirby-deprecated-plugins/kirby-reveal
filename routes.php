<?php
if( site()->user() ) {
	kirby()->routes(array( 
		array(
			'pattern' => 'splitfield',
			'method' => 'POST',
			'action'  => function() {
				//include 'normalize.php';
				$post = kirby()->request()->data();
				$fieldkey = $post['fieldkey'];
				$template = $post['template'];
				$root = c::get('plugin.splitfield.css.root', kirby()->roots()->assets() . DS . 'splitfield' );
				$path = $root . DS . $template . '.' . $fieldkey . '.css';

				if( file_exists( $path ) ) {
					echo '<style>';
					include $path;
					echo '</style>';
				} else {
					include 'normalize.php';
				}
				echo kirbytext( $post['data'] );
			}
		),
	));
}