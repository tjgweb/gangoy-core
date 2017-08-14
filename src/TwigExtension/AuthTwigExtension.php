<?php

namespace TJG\Gangoy\TwigExtension;

use TJG\Gangoy\Authentication\Auth;

/**
 * Class AuthTwigExtension
 * @package TJG\Gangoy\Helpers\Views
 */
class AuthTwigExtension extends \Twig_Extension
{

	/**
	 * @var Auth
	 */
	private $auth;


	/**
	 * AuthTwigExtension constructor.
	 * @param Auth $auth
	 */
	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	public function getName()
    {
        return 'auth-twig-extension';
    }

    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('auth', [$this, 'auth']),
            new \Twig_SimpleFunction('user', [$this, 'user'])
        ];
    }

	/**
	 * @return bool
	 */
	public function auth()
    {
		return $this->auth->check();
    }

	/**
	 * @return mixed
	 */
	public function user()
	{
		return $this->auth->user();
	}

}
