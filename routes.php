<?php
if( site()->user() ) {
	kirby()->routes(array( 
		// Ajax
		array(
			'pattern' => 'plugin.reveal.content',
			'method' => 'POST',
			'action'  => function() {
				$post = kirby()->request()->data();
				$csrf = $post['csrf'];

				if( $post['csrf'] === s::get('csrf') ) {
					$content = $post['content'];
					$raw = page( get('id') );
					
					if( (bool)$post['filter'] ) {
						echo reveal::kirbytext($content, $raw);
					} else {
						echo $content;
					}
				} else {
					echo 'Error';
				}
			}
		),

		// Template
		array(
			'pattern' => 'plugin.reveal.template2',
			'method' => 'POST',
			'action'  => function() {
				$post = kirby()->request()->data();
				$language = get('language');
				$uri = get('uri');
				$page = page( get('id') )->content( get('language') );
				$pages = site()->children();
				$site = site();				

				$path = RevealTemplate::path( get('filename') );
				$visit = false;
				include_once $path;
				return $visit;
			}
		),
	));
}