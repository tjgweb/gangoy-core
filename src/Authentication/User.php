<?php

namespace TJG\Gangoy\Authentication;


use Jasny\Auth\User as JasnyUserInterface;

class User implements JasnyUserInterface
{
	public $id;
	public $username;
	public $password;
	public $active;

	public function __construct($model)
	{
		if($model !== null){
			$this->id = $model->id;
			$this->username = $model->email;
			$this->password = $model->password;
			$this->active = $model->active;
		}
	}

	/**
	 * Get user id
	 *
	 * @return int|string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get user's username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Get user's hashed password
	 *
	 * @return string
	 */
	public function getHashedPassword()
	{
		return $this->password;
	}

	/**
	 * Event called on login.
	 *
	 * @return boolean  false cancels the login
	 */
	public function onLogin()
	{
		return true;
	}

	/**
	 * Event called on logout.
	 *
	 * @return void
	 */
	public function onLogout()
	{
		// TODO: Implement onLogout() method.
	}
}
