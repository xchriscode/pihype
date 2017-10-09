<?php

// Router Class
class Router extends HelperClass
{
	// Get controllers count
	private $controllers_count = 0;
	public static $_URL_ = "";

	// Config function
	public static function config($array)
	{
		$config = (object) $array;

		// check if session has been turned on
		if($config->session == 1)
		{
			// start session
			session_start();
		}

		// Include model control file
		include_once("config/models.php");

		// Include controller main control file
		include_once("config/controller.php");

		// ok check for secure header
		if($config->secure_header == 1 && $config->session == 1 || $config->cookie == 1)
		{
			AppController::$headers = $config->header_look_for;
		}

		// ok check for secure footer
		if($config->secure_footer == 1 && $config->session == 1 || $config->cookie == 1)
		{
			AppController::$footers = $config->footer_look_for;
		}
		
	}


	// Controller function
	public static function controller($name)
	{
		
		// load controller
		include_once("app/controller/{$name}_controller.php");

		// create an instance
		if(class_exists($name))
		{
			$name = ucwords($name);
			$instance = new $name;

			// check contoller view folder
			$location = "app/views/".strtolower($name);
			if(!is_dir($location))
			{
				// Create Directory
				mkdir($location);
			}

			// Return Controller class
			return new AppController();	
		}
		else
		{
			return false;
		}
		
	}


	// Route Views
	public static function route_views($root, $obj)
	{
		$_URL_ = isset($_GET['gid']) ? explode('/',rtrim($_GET['gid'],"/ ")) : "";
		self::$_URL_ = $_URL_;

		$model_call = "";

		$view_method = isset($_URL_[1]) ? $_URL_[1] : false;
		$view_args = isset($_URL_[2]) ? $_URL_[2] : false;

		if($view_method !== false && $view_args === false)
		{
			if(substr($view_method, 0,1) != "@")
			{
				setcookie("C__METH",$view_method);
			}
			else
			{
				$model_call = substr($view_method,1);
				$view_method = $_COOKIE["C__METH"];
			}
		}
		elseif($view_args !== false)
		{
			if(substr($view_args, 0,1) != "@")
			{
				setcookie("C__ARGS",$view_args);
			}
			else
			{
				$model_call = substr($view_args,1);
				$view_args = $_COOKIE["C__ARGS"];
			}	
		}
		else
		{
			setcookie("C__METH","index");
		}

		// Model call
		self::model_call($model_call);

		

		// Make sure Argument is an array
		if(is_array($obj))
		{		
			// ok create controller and method by default
			if(count($_URL_) > 0)
			{
				$location = "app/controller/";

				foreach($obj as $cont => $meths)
				{
					// check if controller has been created
					if(!file_exists($location."{$cont}_controller.php"))
					{
						// check if meths == "*"
						if(trim($meths) == "*")
						{	
							$class = ucwords($cont);
							$build = "
<?php
class {$class} extends Controller
{
	public function index()
	{

	}
}";
							$fh = fopen($location."{$cont}_controller.php","w+");
							fwrite($fh, $build);
							fclose($fh);

							// create view file
							$view_location = "app/views/{$cont}";
							if(!is_dir($view_location))
							{
								// create view directory
								mkdir($view_location);

								// create view file
								$string = "<h1> {$cont}/index </h1> <p> Check {$view_location}/index.php </p>";

								$fh = fopen($view_location."/index.php", "w+");
								fwrite($fh, $string);
								fclose($fh);
							}
						}
						else
						{
							$meth = explode("#", $meths);
							$class = ucwords($cont);
// for proper indentation
							$build = "
<?php
class {$class} extends Controller
{
	";

							foreach($meth as $key => $m)
							{
// for proper indentation
	$build .= "
	public function {$m}()
	{

	}

	";

								// create view file
								$view_location = "app/views/{$cont}";
								if(!is_dir($view_location))
								{
									// create view directory
									mkdir($view_location);	
								}

								// create view file
								$string = "<h1> {$cont}/{$m} </h1> <p> Check {$view_location}/{$m}.php </p>";

								$fh = fopen($view_location."/{$m}.php", "w+");
								fwrite($fh, $string);
								fclose($fh);
							}
// for proper indentation
$build .=  "

}
";

							$fh = fopen($location."{$cont}_controller.php", "w+");
							fwrite($fh, $build);
							fclose($fh);
						}
					}
				}
			}

			// load controller and view
			if(!is_array(self::$_URL_))
			{
				// load default
				// work on root directory
				if(!empty($root))
				{
					$root = explode("#", $root);
					// now check controller existance
					if(file_exists("app/controller/{$root[0]}_controller.php"))
					{
						// load controller;
						$controller = self::controller($root[0]);

						if($controller !== false)
						{
							// load view
							if(isset($root[1]))
							{
								$controller->__view("{$root[0]}/{$root[1]}");
							}	
						}
						else
						{
							// throw controller error
							die("Invalid controller {$root[0]}. Please create controller and reload this page.");
						}

						
					}
					else
					{
						// Throw error
						die(strtoupper($root[0])." Controller not found!");
					}
				} 
			}
			else
	  		{
				// check if registered in router
				$cont = self::$_URL_[0];
				$meth = $view_method;
				$other = $view_args;

				if(array_key_exists($cont, $obj) == true)
				{
					// check if value is "*" or specific
					if($obj[$cont] == "*")
					{
						$controller = self::controller($cont);

						// load all
						if($meth == "")
						{
							if($controller !== false)
							{
								$controller->__view("{$cont}/index");
							}
						}
						else
						{
							if($controller !== false)
							{
								if(method_exists($cont, $meth))
								{
									if($other != "")
									{
										$class = new $cont;
										$class->{$meth}($other);

										// load view
										$controller->__view("{$cont}/{$meth}");
									}
									else
									{
										$class = new $cont;
										$class->{$meth}();

										// load view
										$controller->__view("{$cont}/{$meth}");
									}
								}
								else
								{
									echo("Cannot find > {$cont} > {$meth} in {$cont}_controller.php");
								}
							}

						}
					}
					else
					{
						$controller = self::controller($cont);

						// load all
						if($meth == "")
						{
							if($controller !== false)
							{
								$controller->__view("{$cont}/index");
							}
						}
						else
						{
							if($controller !== false)
							{
								 $meths = explode("#", $obj[$cont]);
								 // check if in array
								 if(in_array($meth, $meths))
								 {
								 	if(method_exists($cont, $meth))
									{
										if($other != "")
										{
											$class = new $cont;
											$class->{$meth}($other);

											// load view
											$controller->__view("{$cont}/{$meth}");
										}
										else
										{
											$class = new $cont;
											$class->{$meth}();

											// load view
											$controller->__view("{$cont}/{$meth}");
										}
									}
									else
									{
										die("Cannot find > {$cont} > {$meth} in {$cont}_controller.php");
									}
								 }
								 else
								 {
								 	die("Invalid < {$meth}> View < {$cont} > in config/router.php ");
								 }
							}
						}
					}
				}
				else
				{
					die("Unknown controller < {$cont} >, not set in config/router.php");
				}
			}
		}
		else
		{
			die("Route Views Argument must be an array");
		}
		
		return ["type" => "controller"];
	}

}