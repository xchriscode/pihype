<?php

// #Error reporting class
include_once("dependencies/error_handler_depend.php");

// #Helper Class, prepares GET requests 
include_once("dependencies/helper_depend.php");

// Autoloader Helper function
spl_autoload_register(function($class){
	include_once("app/helpers/{$class}.php");
});

// #include router class
include_once("dependencies/router_depend.php");

// New Router instance
$hpc = new HelperClass();

// #include db config file
include_once("config/db.php");

// #Include url configuration
include_once("config/url_config.php");

// #Include Config file
include_once("config/config.php");

// #Include router file
include_once("config/router.php");
// #end router include

