<?php

namespace TJG\Gangoy\Providers\Defaults;

use Interop\Container\ContainerInterface;
use Rakit\Validation\Validator;
use TJG\Gangoy\Providers\ProviderInterface;
use TJG\Gangoy\ValidationExtension\UniqueRule;

class RakitValidationProvider implements ProviderInterface
{

	/**
	 * @param ContainerInterface $container
	 * @return void
	 */
	public function boot(ContainerInterface $container)
	{
		$container['validator'] = function ($c) {
			$validator =  new Validator;
			$validator->addValidator('unique', new UniqueRule($c));
			return $validator;
		};
	}
}
