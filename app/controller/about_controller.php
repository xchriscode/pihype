<?php
class About extends AppController
{
	
	public function index()
	{

	}

	public function contact()
	{
		$data = $this->model("@contact");
		
		if($data == "chris")
		{
			$this->routeTo("main/call");
		}
	}

}
