<?php

namespace TJG\Gangoy\Providers;

use Interop\Container\ContainerInterface;

/**
 * Interface PluginInterface
 * @package TJG\Gangoy\Providers
 */
interface ProviderInterface
{
    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container);
}
