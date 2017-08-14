<?php

namespace TJG\Gangoy\Http\Session;

use Hashids\Hashids;

/**
 * Class Session
 * @package TJG\Gangoy\Http\Session
 */
class Session
{
	/**
	 * @var Hashids
	 */
	private $hashids;

	public function __construct(Hashids $hashids)
	{
		$this->hashids = $hashids;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public function set($key, $value)
	{
//		$key = $this->hashids->encodeHex($key);
		if (is_null($value)) {
			unset($_SESSION[$key]);
		} else {
//			$value = $this->hashids->encodeHex($value);
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
