<?php

namespace TJG\Gangoy\Providers\Defaults;


use Awurth\SlimValidation\Validator;
use Interop\Container\ContainerInterface;
use TJG\Gangoy\Providers\ProviderInterface;

class SlimValidationProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$container['validator'] = function () {
			return new Validator();
		};
	}
}
