<?php

// load db
include_once("./db/dbMigrate.php");

class AppModel extends dbMigrate
{
	public $data = "";
	public  static $model_name = "";
	public  static $model_method = "";

	public function model($model = "")
	{
		$model = self::$model_name;
		$method = self::$model_method;

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
							$run = $class->{$method}();
							return $run;
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
