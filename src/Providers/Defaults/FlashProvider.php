<?php

namespace TJG\Gangoy\Providers\Defaults;


use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;
use Slim\Flash\Messages;

class FlashProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['flash'] = function () {
            return new Messages();
        };
    }
}
