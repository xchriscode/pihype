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
}