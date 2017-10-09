<?php

// load db
include_once("./db/dbMigrate.php");

class AppModel extends dbMigrate
{
	public $data = "";
	public  static $model_name = "";
	public  static $model_method = "";

	// make new model request
	final public function model($name = "")
	{
		
		$args = explode("/", $name);
		$model = strpos($args[0],"@") >= 0 ? substr($args[0], 1) : $args[0];
		$method = isset($args[1]) ? $args[1] : "";
		$param = isset($args[2]) ? $args[2] : "";

		$data = $this->call_model($model, $method, $param);

		return $data;
	
	}

	// collect when action model request
	final public function is_ready($name)
	{
		if(self::$model_name != "" && (self::$model_name == substr($name, 1)))
		{
			$model = self::$model_name;
			$method = self::$model_method;
			$param = "";
			$data = $this->call_model($model, $method, $param);
			return $data;
		}
	}


	final private function call_model($model, $method, $param = "")
	{
		if(!empty($model))
		{
			// check destination folder < app/model >
			$location = "app/model/{$model}.php";
			if(file_exists($location))
			{
				include_once($location);
				$class_name = ucwords($model);
				if(class_exists($class_name))
				{
					$class = new $class_name;
					// ok class found, lets load method from class
					if($method != "")
					{
						if(method_exists($class, $method))
						{	
							// Run model now
							$run = $class->{$method}($param);
							return $run;
						}
						else
						{
							//echo "Method [$method] not found in $location \n";
						}
					}
				}
				else
				{
					echo "Model < $class_name > Not found in $location";
				}
			}
			else
			{
				echo "Invalid Model file < {$model}.php >, please create this model file in app/model";
			}
		}	
	}
}	
