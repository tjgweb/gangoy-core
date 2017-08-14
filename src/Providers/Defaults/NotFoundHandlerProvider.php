<?php

namespace TJG\Gangoy\Providers\Defaults;

use Interop\Container\ContainerInterface;
use TJG\Gangoy\Providers\ProviderInterface;

class NotFoundHandlerProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$path_view = __DIR__ . '/../../../resources/views/errors/404.twig';
		if(file_exists($path_view)){
			$container['notFoundHandler'] = function ($c) {
				return function () use ($c) {
					$res = $c['response']->withStatus(404);
					return $c['view']->render($res, 'errors/404.twig');
				};
			};
		}
	}
}
