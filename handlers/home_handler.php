<?php

class HomeHandler {
	function get() {

		$userDetails = userAuth();

		$currentWeek = get_current_week();
		$numPosts = get_number_of_group_post_by_week($userDetails["groupId"], $currentWeek["startDate"], $currentWeek["endDate"]);
		$blogs = get_blogs_named();
		$weeks = get_weeks_before_now();
		foreach ($weeks as $key => $week) {
			$tempArray = [];
			$sideBlogs = get_blogs_between($week["startDate"], $week["endDate"]);
			foreach ($sideBlogs as $sideBlog) {
				$tempArray[] = $sideBlog;
			}
			$weeks[$key]["blogs"] = $tempArray;
		}

		include "views/home.php";
	}
}

?>