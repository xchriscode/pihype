<?php

class AppController extends AppModel 
{	
	// @params current views 
	private static $viewBox = [];

	// @params headers
	public static $headers = "";

	// @params footers
	public static $footers = "";

	// Final view function. This Sets up a controller view
	final function __view($path, $data="")
	{
		$URL = URL_CONFIG::$getUrl;
		$cont = isset($URL[0]) ? $URL[0] : "";
		// check if view can be found

		$array = explode('/', $path);

		self::$viewBox[] = isset($array[1]) ? $array[1] : "";

		if(count($array) <= 2)
		{
			if(count($array) == 1)
			{
				if($cont != "")
				{
					$path = $cont."/".$path;
				}
			}

			$location = "app/views";
			
				if(!file_exists($location."/{$path}.php"))
				{
					$string = "<h1> {$path} </h1> <p> Check {$location}/{$path}.php </p>";

					$fh = fopen($location."/{$path}.php", "w");
					fwrite($fh, $string);
					fclose($fh);
				}	
			
		}

		// Make sure, only one view is loaded after a GET request.
		if(count(self::$viewBox) == 1)
		{
			// call header
			$this->header_file();

			//call view
			include_once("app/views/".$path.".php");

			// call footer
			$this->footer_file();
		}
		
	}

	// Callable function for a new route
	protected final function routeTo($path, $data="")
	{
		// call view method
		$this->__view($path, $data);
		// end current view display
	}

	// Redirect function
	protected final function redir($path,$wait = "")
	{
		$url = URL_CONFIG::$url;
		if($wait == "")
		{
			header("location: {$url}{$path}");	
		}
		else
		{
			?>
				<script>
					setTimeout(function(){
						window.open('<?="{$url}{$path}"?>',"_self","location=yes");
					},<?=$wait?>000);
				</script>
			<?php
		}
		
	}

	// Dynamic Header Function !private
	private function header_file()
	{
		// pages you need to load another header file
		$location = "public/headers/";

		if(self::$headers !== "")
		{
			//check session
			// loop header array

			// @params current_header
			$current_header = "";
			foreach(self::$headers as $sess => $head)
			{
				$sess_ = explode("|",$sess);
				foreach($sess_ as $key => $sess_var)
				{
					if(sess::check($sess_var) === true)
					{
						$current_header = $head;
					}
					else
					{
						$current_header = "default_header";
					}
				}
			}

			if(!file_exists($location.$current_header.".php"))
			{
				$fh = fopen($location.$current_header.".php", "w+");
				fwrite($fh, ucfirst($current_header)." [Header File]");
				fclose($fh);
			}

			include_once($location.$current_header.".php");
		}
		else
		{
			$current_header = "default_header";

			if(!file_exists($location.$current_header.".php"))
			{
				$fh = fopen($location.$current_header.".php", "w+");
				fwrite($fh, ucfirst($current_header)." [Header File]");
				fclose($fh);
			}

			include_once($location.$current_header.".php");
		}
	}	

	// Dynamic Footer Function !private
	private function footer_file()
	{
		// pages you need to load another footer file
		$location = "public/footers/";

		if(self::$footers !== "")
		{
			//check session
			// loop header array

			// @params current_header
			$current_footer = "";
			foreach(self::$footers as $sess => $foot)
			{
				$sess_ = explode("|",$sess);
				foreach($sess_ as $key => $sess_var)
				{
					if(sess::check($sess_var) === true)
					{
						$current_footer = $foot;
					}
					else
					{
						$current_footer= "default_footer";
					}
				}
			}

			if(!file_exists($location.$current_footer.".php"))
			{
				$fh = fopen($location.$current_footer.".php", "w+");
				fwrite($fh, ucfirst($current_footer)." [Footer File]");
				fclose($fh);
			}

			include_once($location.$current_footer.".php");
		}
		else
		{
			$current_footer = "default_footer";

			if(!file_exists($location.$current_footer.".php"))
			{
				$fh = fopen($location.$current_footer.".php", "w+");
				fwrite($fh, ucfirst($current_footer)." [Footer File]");
				fclose($fh);
			}

			include_once($location.$current_footer.".php");
		}
	}
}