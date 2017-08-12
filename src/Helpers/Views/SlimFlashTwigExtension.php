<?php

namespace TJG\Gangoy\Helpers\Views;


use Slim\Flash\Messages;

class SlimFlashTwigExtension extends \Twig_Extension
{
    /**
     * @var Messages
     */
    protected $flash;

    /**
     * Constructor.
     *
     * @param Messages $flash the Flash messages service provider
     */
    public function __construct(Messages $flash)
    {
        $this->flash = $flash;
    }

    public function getName()
    {
        return 'slim-flash-twig-extension';
    }

    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('flash', [$this, 'flash']),
            new \Twig_SimpleFunction('hasFlash', [$this, 'hasFlash']),
        ];
    }

    /**
     * Returns Flash messages; If key is provided then returns messages
     * for that key.
     *
     * @param string $key
     *
     * @return array
     */
    public function flash($key = null)
    {
        if (null !== $key) {
            return $this->flash->getMessage($key);
        }

        return $this->flash->getMessages();
    }

    /**
     * Has Flash Message
     *
     * @param string $key The key to get the message from
     * @return bool Whether the message is set or not
     */
    public function hasFlash($key)
    {
        return $this->flash->hasMessage($key);
    }
}
