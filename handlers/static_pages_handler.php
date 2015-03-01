<?php

class AssignmentsHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs("assignments");
		include "views/assignments.php";
	}
}

class InspirationHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs("inspiration");
		include "views/inspiration.php";
	}
}

class ResourcesHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs("resource");
		include "views/resources.php";
	}
}

?>