<?php

class Local extends URL_CONFIG
{
	public static function img($file, $config = "")
	{
		// location
		$location = "public/images/";
		// check if $file has an extenstion
		$has_enx = false;
		$file = strtolower($file);
		$file_arr = explode(".",$file);
		$ext = end($file_arr);
		$valid_ext = ["jpg","png","gif","jpeg"];

		if(in_array($ext, $valid_ext) == true)
		{
			$has_enx = true;
		}

		if($has_enx === false)
		{
			$dir = scandir($location);
			unset($dir[0], $dir[1]);

			 $image = "";
			 foreach($dir as $key => $img)
			 {
			 	if(preg_match("/$file/", $img) == true)
			 	{
			 		$image = $img;
			 	}
			 }

			 if($image !== "")
			 {
			 	$location .= $image;

			 	$img = '<img src="'.parent::$url.$location.'" ';

			 	if($config != "")
			 	{
			 		$config = preg_replace("/[,]/", " ", $config);
			 		$img .= $config." />";
			 	}
			 	else
			 	{
			 		$img .= "/>";
			 	}

			 	return $img;
			 }
			 else
			 {
			 	errorHandler::log("[$file] not found in $location",2);
			 }


		}
		else
		{
			// scan dir
			
			if(file_exists($location.$file))
			{
				$location .= $file;
				// Image found
				$img = '<img src="'.parent::$url.$location.'" ';

			 	if($config != "")
			 	{
			 		$config = preg_replace("/[,]/", " ", $config);
			 		$img .= $config." />";
			 	}
			 	else
			 	{
			 		$img .= "/>";
			 	}

			 	return $img;
			}
			else
			{
				errorHandler::log("[$file] not found in $location",2);
			}
		}


	}

	public static function linkTo($name, $config = "", $action = "")
	{

		// check if controller is set
		$controller_set = false;
		if(strpos($name, "/"))
		{
			$controller_set = true;
		}

		// check if an external link
		$external_link = false;
		if(strpos($name, "."))
		{
			$external_link = true;
		}

		if($controller_set == false && $external_link == false)
		{
			// a link for current controller
			$a = '<a href="'.self::$url.self::$getUrl[0].'/'.$name.'" ';

			if($config != "" && strpos($config,"=") <= 0)
			{
				$a .= "> $config </a>";
			}
			else
			{
				$a .= " $config > $action </a>";
			}

			return $a;
		}
		else
		{

			// a link for current controller
			$a = '<a href="'.self::$url.$name.'" ';

			if($config != "" && strpos($config,"=") <= 0)
			{
				$a .= "> $config </a>";
			}
			else
			{
				$a .= " $config > $action </a>";
			}

			return $a;	
		}
	}

	public static function css($name, $config = "")
	{
		if(preg_match("/[http][https]/", $name) == false)
		{
			$location = "public/styles/{$name}.css";

			if(file_exists($location))
			{
				$link = '<link rel="stylesheet" type="text/css" href="'.self::$url.$location.'" '.$config.'/>';
				return $link;
			}
			else
			{
				errorHandler::log("[{$name}.css] not found! in public/styles",2);
			}	
		}
		else
		{
			$link = '<link rel="stylesheet" type="text/css" href="'.$name.'" '.$config.'/>';
				return $link;
		}
		
	}


	public static function js($name, $config = "")
	{
		$location = "public/javascripts/{$name}.js";

		if(file_exists($location))
		{
			$link = '<script type="text/javascript" src="'.self::$url.$location.'" '.$config.'></script>';
			return $link;
		}
		else
		{
			errorHandler::log("[{$name}.js] not found! in public/javascripts",2);
		}
	}
}