<?php

namespace TJG\Gangoy\Helpers\Views;


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
	 * @return Auth
	 */
	public function auth()
    {
		return $this->auth;
    }

    public function user()
	{
		return $this->auth->user();
	}

}
