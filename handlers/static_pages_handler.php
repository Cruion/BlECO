<?php

class AssignmentsHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs();
		include "views/assignments.php";
	}
}

class InspirationHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs();
		include "views/inspiration.php";
	}
}

class ResourcesHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs();
		include "views/resources.php";
	}
}

?>