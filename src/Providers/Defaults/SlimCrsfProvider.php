<?php

namespace TJG\Gangoy\Providers\Defaults;

use Interop\Container\ContainerInterface;
use Slim\Csrf\Guard;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use TJG\Gangoy\Providers\ProviderInterface;

class SlimCrsfProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$container['csrf'] = function ($c) {
			$guard = new Guard;
			$path_view = __DIR__ . '/../../../resources/views/errors/csrf.twig';
			if(file_exists($path_view)) {
				$guard->setFailureCallable(function (Request $request, Response $response, $next) use ($c) {
					$response = $response->withStatus(400);
					return $c['view']->render($response, 'errors/csrf.twig');
				});
			}
			return $guard;
		};
	}
}
