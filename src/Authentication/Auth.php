<?php

namespace TJG\Gangoy\Authentication;


use App\Models\User;
use Jasny\Auth as JasnyAuth;
use Jasny\Auth\Sessions;

class Auth extends JasnyAuth
{
	use Sessions;

	public function fetchUserById($id)
	{
		$user = User::find($id);
		return new \TJG\Gangoy\Authentication\User($user);
	}

	public function fetchUserByUsername($username)
	{
		$user = User::where('email', $username)->first();
		return new \TJG\Gangoy\Authentication\User($user);
	}
}
