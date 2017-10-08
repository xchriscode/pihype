<?php
class Message
{
	public static $status = "";

	public static function out()
	{
		if(self::$status !== "")
		{
			echo self::$status;
		}
	}
}