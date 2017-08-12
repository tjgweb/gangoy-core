<?php

namespace TJG\Gangoy\Providers\Defaults;

use Awurth\SlimValidation\ValidatorExtension;
use TJG\Gangoy\Helpers\Views\AuthTwigExtension;
use TJG\Gangoy\Helpers\Views\SlimCsrfTwigExtension;
use TJG\Gangoy\Providers\ProviderInterface;
use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use TJG\Gangoy\Helpers\Views\SlimFlashTwigExtension;

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
			$view->addExtension(new ValidatorExtension($container['validator']));
			$view->addExtension(new SlimCsrfTwigExtension($container['csrf']));
			$view->addExtension(new AuthTwigExtension($container['auth']));

            return $view;
        };
    }
}
