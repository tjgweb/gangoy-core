<?php

namespace TJG\Gangoy\Providers\Defaults;


use Interop\Container\ContainerInterface;
use TJG\Gangoy\Http\Session\Session;
use TJG\Gangoy\Providers\ProviderInterface;

class SessionProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$container['session'] = function (){
			return new Session;
		};
	}
}
