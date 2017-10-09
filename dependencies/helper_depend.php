<?php
class HelperClass
{	
	// Resources helper
	function resources($type)
	{
		
	}


	// Model helper
	final static function model_call($model_call)
	{
		if($model_call != "")
		{
			// get the model name
			AppModel::$model_name = $model_call;
			// get the method name
			if(isset($_POST) and count($_POST) > 0)
			{
				$count = count($_POST);
				$method = array_keys($_POST);
				$method = $method[$count-1];
				AppModel::$model_method = $method;	
			}
			
		}
	}
}
// #end helper class
