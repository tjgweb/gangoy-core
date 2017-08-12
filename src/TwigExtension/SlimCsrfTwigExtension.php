<?php

namespace TJG\Gangoy\TwigExtension;

use Slim\Csrf\Guard;

/**
 * Class SlimCsrfTwigExtension
 * @package TJG\Gangoy\Helpers\Views
 */
class SlimCsrfTwigExtension extends \Twig_Extension
{

	/**
	 * @var Guard
	 */
	private $csrf;

	/**
	 * SlimCsrfTwigExtension constructor.
	 * @param Guard $csrf
	 */
	public function __construct(Guard $csrf)
	{
		$this->csrf = $csrf;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'slim-csrf-twig-extension';
	}


	/**
	 * @return array
	 */
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('csrf', [$this, 'csrf'], ['is_safe' => ['html']])
		];
	}


	/**
	 * @return string
	 */
	public function csrf()
	{
		$generate = $this->csrf->generateToken();
		return '<input type="hidden" name="csrf_name" value="' . $generate['csrf_name'] . '">
				<input type="hidden" name="csrf_value" value="' . $generate['csrf_value'] . '">';
	}

}
