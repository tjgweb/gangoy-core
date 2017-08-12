<?php

namespace TJG\Gangoy\Providers\Defaults;


use TJG\Gangoy\Authentication\Auth;
use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;

class AuthProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['auth'] = function () {
            return new Auth;
        };
    }
}
