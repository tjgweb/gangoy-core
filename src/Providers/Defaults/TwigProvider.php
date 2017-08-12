<?php

namespace TJG\Gangoy\Providers\Defaults;

use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use TJG\Gangoy\TwigExtension\SlimFlashTwigExtension;
use TJG\Gangoy\TwigExtension\SlimCsrfTwigExtension;
use Awurth\SlimValidation\ValidatorExtension;
use TJG\Gangoy\TwigExtension\AuthTwigExtension;

class TwigProvider implements ProviderInterface
{

    /**
     * @param ContainerInterface $container
     * @return void
     */
    public function boot(ContainerInterface $container)
    {
        $container['view'] = function ($container) {
            $viewSettings = $container['settings']['views'];
            $view = new Twig($viewSettings['template_path'], [
                'cache' => $viewSettings['cache']
            ]);
            $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
            $view->addExtension(new TwigExtension($container['router'], $basePath));
            $view->addExtension(new SlimFlashTwigExtension($container['flash']));
            $view->addExtension(new SlimCsrfTwigExtension($container['csrf']));
            $view->addExtension(new ValidatorExtension($container['validator']));
			$view->addExtension(new AuthTwigExtension($container['auth']));

            return $view;
        };
    }
}
