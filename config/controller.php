<?php
class Controller extends Model 
{
	public function view($path, $data="")
	{
		//call view
		include_once("app/views/".$path.".php");
	}
}