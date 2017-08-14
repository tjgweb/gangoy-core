<?php

namespace TJG\Gangoy\Authentication;

use Interop\Container\ContainerInterface;
use TJG\Gangoy\Http\Session\Session;

class Auth
{
	/**
	 * @var Session
	 */
	private $session;

	private $model;
	private $sessionName;

	public function __construct(ContainerInterface $container)
	{
		$this->session = $container->get('session');
		$authSettings = $container['settings']['auth'];
		$this->sessionName = $authSettings['sessionName'];
		$model = $authSettings['model'];
		$this->model = new $authSettings['model'];
	}

	/**
	 * @return mixed
	 */
	public function user()
	{
		if($this->session->get($this->sessionName)){
			return $this->model->find($this->session->get($this->sessionName));
		}
		return null;
	}

	/**
	 * @return bool
	 */
	public function check()
	{
		return null !== $this->session->get($this->sessionName) ? true : false;
	}

	/**
	 * @param string $field
	 * @param string $value
	 * @param string $password
	 * @return bool
	 */
	public function attempt($field, $value, $password)
	{
		$user = $this->model->where($field, $value)->first();

		if(!$user){
			return false;
		}

		if(!$this->passwordVerify($password, $user->password)){
			return false;
		}

		$this->session->set($this->sessionName, $user->id);

		return true;
	}

	/**
	 * @return void
	 */
	public function logout()
	{
		$this->session->destroy($this->sessionName);
	}

	/**
	 * @param string $password
	 * @return bool|string
	 */
	public function passwordHash($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * @param string $password
	 * @param string $hash
	 * @return bool
	 */
	public function passwordVerify($password, $hash)
	{
		return password_verify($password, $hash);
	}

}
