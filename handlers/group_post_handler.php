<?php

class GroupPostHandler {
	function get($slug) {
		$userDetails = userAuth();

		$group = get_group_by_slug($slug);
		$blogs = get_group_blogs($group["groupId"]);
		$weeks = get_weeks_before_now();
		foreach ($weeks as $key => $week) {
			$tempArray = [];
			$sideBlogs = get_group_blogs_between($group["groupId"], $week["startDate"], $week["endDate"]);
			foreach ($sideBlogs as $sideBlog) {
				$tempArray[] = $sideBlog;
			}
			$weeks[$key]["blogs"] = $tempArray;
		}
		include "views/group.php";
	}
}

?>