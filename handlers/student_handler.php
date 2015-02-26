<?php

class StudentHandler {
	function get() {
		$userDetails = userAuth();

		$students = get_students();
		include "views/students.php";
	}

	function post() {
		$userDetails = userAuth();

		$image = $_POST["image"];

		update_group_icon($userDetails["groupId"], $image);

		$groups = get_groups();
		include "views/groups.php";
	}
}

?>