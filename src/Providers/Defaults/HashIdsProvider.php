<?php

namespace TJG\Gangoy\Providers\Defaults;

use Hashids\Hashids;
use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;

class HashIdsProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['hashIds'] = function () {
        	$time = time();
            return new Hashids('Gangoy');
        };
    }
}
