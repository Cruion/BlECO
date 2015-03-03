<?php

class BlogsHandler {
	function get() {
		$userDetails = userAuth();

		$blogs = get_blogs_student();
		$weeks = get_weeks_before_now();
		foreach ($weeks as $key => $week) {
			$tempArray = [];
			$sideBlogs = get_blogs_between_student($week["startDate"], $week["endDate"]);
			foreach ($sideBlogs as $sideBlog) {
				$tempArray[] = $sideBlog;
			}
			$weeks[$key]["blogs"] = $tempArray;
		}
		include "views/blogs.php";
	}

	function post_xhr() {

		$userDetails = userAuth();

		$offset = $_POST["offset"];
		$excludeTags = $_POST["excludedTags"];
		if ($excludeTags == "") {
			unset($excludeTags);
		}

		$blogs = get_more_blogs_student($offset);

		foreach ($blogs as $blog) {
			include "views/_blog.php";
		}
		if (count($blogs) == 10) {
			echo '<button id="loadMoreBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="loadMore()">Load more blogs!</button>';
		}
	}
}

?>