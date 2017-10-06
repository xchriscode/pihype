<?php

// ==================================================
// Global configuration for session, header files etc.
// ==================================================

$hpc->resources(
	Router::config(
		[
			// Working with session?	
			"session" => 1, // 1 = true, 0 = false
			// Working with cookie?	
			"cookie" => 0, // 1 = true, 0 = false
			// Working with secure headers?
			// if 0 will use "default_header.php" for all views
			"secure_header" => 1,
			// if secure header is "1", what should we check for before we change view header
			// a session var
			"header_look_for" => [
									"adminid" => "admin_header",
									"userid|memberid" => "user_header"
								 ],
			// Working with secure footers?
			// if 0 will use "default_footer.php" for all views
			"secure_footer" => 1,
			// if secure header is "1", what should we check for before we change view header
			// a session var
			"footer_look_for" => [
									"adminid" => "admin_header",
									"userid|memberid" => "user_header"
								 ],
		]
	)
);
