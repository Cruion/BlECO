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

class StudentPostHandler {
	function get($student) {
		$userDetails = userAuth();

		//$group = get_group_by_slug($slug);
		//$blogs = get_group_blogs($group["groupId"]);
		
		$blogs = get_student_blogs($student);
		
		$weeks = get_weeks_before_now();
		foreach ($weeks as $key => $week) {
			$tempArray = [];
			$sideBlogs = get_student_blogs_between($student, $week["startDate"], $week["endDate"]);
			foreach ($sideBlogs as $sideBlog) {
				$tempArray[] = $sideBlog;
			}
			$weeks[$key]["blogs"] = $tempArray;
		}
		include "views/group.php";
	}
}

?>