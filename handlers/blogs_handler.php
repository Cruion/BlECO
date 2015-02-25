<?php

class BlogsHandler {
	function get() {
		userAuth();

		$blogs = get_blogs();
		$weeks = get_weeks_before_now();
		foreach ($weeks as $key => $week) {
			$tempArray = [];
			$sideBlogs = get_blogs_between($week["startDate"], $week["endDate"]);
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

		$blogs = get_more_blogs($offset);

		foreach ($blogs as $blog) {
			include "views/_blog.php";
		}
		if (count($blogs) == 2) {
			echo '<button id="loadMoreBtn" type="button" class="btn btn-primary btn-lg btn-block" onclick="loadMore()">Load more blogs!</button>';
		}
	}
}

?>