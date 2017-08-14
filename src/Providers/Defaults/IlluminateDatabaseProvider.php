<?php

namespace TJG\Gangoy\Providers\Defaults;


use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;
use Illuminate\Database\Capsule\Manager;

class IlluminateDatabaseProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['db'] = function ($c) {
            $dbSettings = $c['settings']['db'];
            $capsule = new Manager;
            $capsule->addConnection($dbSettings);
//            $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            return $capsule;
        };
        $container['db'];
    }
}
