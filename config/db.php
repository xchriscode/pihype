<?php 
	
	// ================
	// Database global configuration
	// ================

	// Include migrate class
	include_once("db/dbMigrate.php");

	$hpc->resources(
		// First parameter => default connection
		// Secoond parameter => connection configuration array see below
		dbMigrate::config("", [
			'mysqli|mysql|pdo' => ["db_host" => '', "db_name" => "", "db_user" => "", "db_pass" => ""]
		])

		// dbMigrate::config("mysqli", [
		// 	// can set a single configuration for multiple database connection
		// 	'mysqli|mysql|pdo' => ["db_host" => "localhost", "db_name" => "test", "db_pass" => "", "db_user" => "root"],
		// 	// Or can set a single connection settings
		// 	//can place db_host, db_name, db_pass and db_user
		// 	"sqlite" => []
		// ])
	);

?>