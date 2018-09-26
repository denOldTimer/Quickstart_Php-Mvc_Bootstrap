<?php
namespace App\Core;

class Session
{

	public static function init()
	{
		@session_start();
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}

	public static function undoset($key)
	{
		if (isset($_SESSION[$key]))
		unset($_SESSION[$key]);
	}

	public static function dump()
	{
		echo '<pre> Session dump <br>';
		var_dump($_SESSION);
		echo '</pre>';
	}

	public static function destroy()
	{
		//unset($_SESSION);
		if ( isset( $_GET['auth'] ) )
			unset($_SESSION['auth']);
		if ( isset( $_GET['username'] ) )
			unset($_SESSION['username']);
		if ( isset( $_GET['role'] ) )
			unset($_SESSION['role']);
		session_destroy();
	}

}
