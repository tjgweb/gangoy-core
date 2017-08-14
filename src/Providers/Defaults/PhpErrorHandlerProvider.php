<?php

namespace TJG\Gangoy\Providers\Defaults;

use Interop\Container\ContainerInterface;
use TJG\Gangoy\Providers\ProviderInterface;

class PhpErrorHandlerProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$path_view = APP_DIR . '/resources/views/errors/500.twig';
		if(file_exists($path_view) && getenv('DISPLAY_ERRORS') == 'false'){
			$container['phpErrorHandler'] = function ($c) {
				return function () use ($c) {
					$res = $c['response']->withStatus(500);
					return $c['view']->render($res, 'errors/500.twig');
				};
			};
		}
	}
}
