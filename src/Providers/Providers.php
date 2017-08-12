<?php

namespace TJG\Gangoy\Providers;

use App\Providers\AppProviders;
use Interop\Container\ContainerInterface;

/**
 * Class Providers
 * @package TJG\Gangoy\Providers
 */
final class Providers
{
	/**
	 * Providers constructor.
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container)
	{
		$appProviders = new AppProviders();
		$providers = $appProviders->register();

		foreach ($providers as $provider) {
			/** @var ProviderInterface $instance */
			$instance = new $provider();
			$instance->boot($container);
		}
	}

}
