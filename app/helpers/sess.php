<?php
// Custom Session class
class sess 
{
	static function check($var = "")
	{
		if(isset($_SESSION[$var]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	static function save($name, $val)
	{
		$_SESSION[$name] = $val;
		return true;
	}

	static function out($name)
	{
		if(isset($_SESSION[$name]))
		{
			echo $_SESSION[$name];
		}
	}

	static function get($name)
	{
		if(isset($_SESSION[$name]))
		{
			return $_SESSION[$name];
		}
	}
}