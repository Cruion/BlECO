<?php

class AssignmentsHandler {
	function get() {

		$userDetails = userAuth();
		include "views/assignments.php";
	}
}

class InspirationHandler {
	function get() {

		$userDetails = userAuth();
		include "views/inspiration.php";
	}
}

class ResourcesHandler {
	function get() {

		$userDetails = userAuth();
		include "views/resources.php";
	}
}

?>