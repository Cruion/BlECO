<?php

class AssignmentsHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs_named();
		include "views/assignments.php";
	}
}

class InspirationHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs_named();
		include "views/inspiration.php";
	}
}

class ResourcesHandler {
	function get() {

		$userDetails = userAuth();
		$blogs = get_blogs_named();
		include "views/resources.php";
	}
}

?>