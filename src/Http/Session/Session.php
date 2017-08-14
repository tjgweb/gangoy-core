<?php

namespace TJG\Gangoy\Http\Session;

/**
 * Class Session
 * @package TJG\Gangoy\Http\Session
 */
class Session
{

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public function set($key, $value)
	{
		if (is_null($value)) {
			unset($_SESSION[$key]);
		} else {
			$_SESSION[$key] = $value;
		}
	}

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function get($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	/**
	 * @param string|array $key
	 */
	public function destroy($key)
	{
		if(is_array($key)){
			foreach($key as $k){
				unset($_SESSION[$k]);
			}
		}
		unset($_SESSION[$key]);
	}
}
