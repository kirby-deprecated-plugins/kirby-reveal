<?php
namespace Reveal;
use response;

if(site()->user()) {
	kirby()->routes(array(
		array(
			'pattern' => 'reveal/(:all)',
			'action'  => function($id) {
				$page = page($id);
				$Manipulated = new Manipulate($page->parent(), $page->dirname());
				$Preview = new Preview(kirby());
				
				$data = $Preview->render(
					$page->templateFile(),
					array(),
					$Manipulated
				);

				return new Response($data, 'html', 200);
			}
		)
	));
}