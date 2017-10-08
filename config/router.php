<?php

// ===============================================
// Router configuration here. Register a view here
// ===============================================

$hpc->resources(
		// First Argument is the default root controller with an index view
		// Second Argument is an array of global configuration for other controllers.
	Router::route_views("pihype#intro", [
		// Other controllers here...
	])
);
