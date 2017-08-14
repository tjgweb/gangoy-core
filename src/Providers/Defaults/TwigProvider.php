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
        $container['view'] = function ($c) {
            $viewSettings = $c->get('settings')['views'];
            $view = new Twig($viewSettings['templatePath'], [
                'cache' => $viewSettings['cache']
            ]);
            $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
            $view->addExtension(new TwigExtension($c['router'], $basePath));
            $view->addExtension(new SlimFlashTwigExtension($c['flash']));
            $view->addExtension(new SlimCsrfTwigExtension($c['csrf']));
            $view->addExtension(new ValidatorExtension($c['validator']));
			$view->addExtension(new AuthTwigExtension($c['auth']));

            return $view;
        };
    }
}
