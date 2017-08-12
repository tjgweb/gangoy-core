<?php

namespace TJG\Gangoy\Providers\Defaults;


use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;

class UploadsDirectoryProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['upload_directory'] = APP_DIR . '/storage/uploads';
    }
}
