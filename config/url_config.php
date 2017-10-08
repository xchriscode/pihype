<?php

// ================
// URL Configuration
// ================

$hpc->resources(URL_CONFIG::config([
	'golive' => 0,
	'liveurl' => 'https://'
]));


// URL_CONFIG Class
class URL_CONFIG extends HelperClass
{
	protected static $url;
	protected static $getUrl;

	static function config($arr)
	{
		if($arr['golive'] == 1)
		{
			// on a live server
			self::$url = $arr['liveurl'];
		}
		else
		{
			// Your development server URL 
			self::$url = "http://127.0.0.1/xchrisphp/XchrisPHP/";
		}

		self::$getUrl = isset($_GET['gid']) ? explode('/',rtrim($_GET['gid'],"/ ")) : "";
	}
}