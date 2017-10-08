<?php
class Data
{
	public static $log;

	public static function log($val)
	{
		self::$log = $val;
	}

	public static function get()
	{
		return self::$log;
	}


}