<?php

// #Helper Class, prepares GET requests 
class HelperClass
{
	protected static $get = [];

	// constructor function
	function construct()
	{
		self::$get = isset($_GET['pid']) ? explode('/',rtrim($_GET['pid'],"/ ")) : "";
	}

	// Resources function
	function resources($type)
	{

	}
}
// #end helper class

// Router Class
class Router extends HelperClass
{
	// Get controllers count
	private $controllers_count = 0;
	
	// Router Config
	public function resources($obj)
	{
		
	}

	// Controller function
	public static function controller($name)
	{
		// Include model control file
		include_once("config/models.php");

		// Include controller main control file
		include_once("config/controller.php");
		
		// load controller
		include_once("app/controller/{$name}_controller.php");

		// create an instance
		$name = ucwords($name);
		$instance = new $name;

		$methods = get_class_methods($instance);

		if(count($methods) > 0)
		{
			// check views
			$location = "app/views/".strtolower($name);
			if(!is_dir($location))
			{
				// Create Directory
				mkdir($location);
			}

			//create view if not found
			foreach($methods as $key => $view)
			{
				// check if view can be found
				if(!file_exists($location."/{$view}.php"))
				{
					$string = "<h1> {$name}#{$view} </h1> <p> Check {$location}/{$view}.php </p>";

					$fh = fopen($location."/{$view}.php", "w");
					fwrite($fh, $string);
					fclose($fh);
				}
			}
		}

		// Return Controller class
		return new Controller();
	}

	// Route Views
	public static function route_views($root, $obj)
	{
		// Make sure Argument is an array
		if(is_array($obj))
		{
			if(count($obj) == 1 && $obj[0] == "*")
			{
				// global route
				if(is_array(parent::$get) && count(parent::$get) > 0)
				{

				}
				else
				{
					// work on root directory
					if(!empty($root))
					{
						$root = explode("#", $root);
						// now check controller existance
						if(file_exists("app/controller/{$root[0]}_controller.php"))
						{
							// load controller;
							$controller = self::controller($root[0]);

							// load view
							if(isset($root[1]))
							{
								$controller->view("{$root[0]}/{$root[1]}");
							}
						}
						else
						{
							// Throw error
							die(strtoupper($root[0])." Controller not found!");
						}
					} 
				}
			}
			else
			{
				// manage route
			}
		}
		else
		{
			die("Route Views Argument must be an array");
		}
	}

}

// New Router instance
$hpc = new HelperClass();

// #Include router file
include_once("config/router.php");
// #end router include

