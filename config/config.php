<?php

// ==================================================
// Global configuration for session, header files etc.
// ==================================================

$hpc->resources(
	Router::config(
		[
			// Working with session?	
			"session" => 0, // 1 = true, 0 = false
			// Working with cookie?	
			"cookie" => 0, // 1 = true, 0 = false
			// Working with secure headers?
			// if 0 will use "default_header.php" for all views
			"secure_header" => 0,
			// if secure header is "1", what should we check for before we change view header
			// a session var
			"header_look_for" => [
									// example
									// when isset adminid in session do this below
									//"adminid" => "admin_header"
								 ],
			// Working with secure footers?
			// if 0 will use "default_footer.php" for all views
			"secure_footer" => 0,
			// if secure header is "1", what should we check for before we change view header
			// a session var
			"footer_look_for" => [
									// example
									// when isset adminid in session do this below
									//"adminid" => "admin_header"
								 ],
		]
	)
);
