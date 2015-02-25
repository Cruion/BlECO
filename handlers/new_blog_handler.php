<?php

class NewBlogHandler {
	function get() {

		$userDetails = userAuth();

		$currentWeek = get_current_week();
		$numPosts = get_number_of_group_post_by_week($userDetails["groupId"], $currentWeek["startDate"], $currentWeek["endDate"]);
		include "views/newblog.php";
	}

	function post() {
		$title = $_POST["title"];
		$body = $_POST["body"];
		$video = $_POST["video"];
		$tags = trim($_POST["tags"]);

		$slug = Util::slugify($title);
		$slugCount = get_slug_count($slug);
		if ($slugCount["slugs"] > 0) {
			$slug = Util::increment_string($slug, '-', $slugCount["slugs"] + 1);
		}

		$userName = $_SESSION['userName'];

		if (strlen($video) == 0) {
			$video = null;
		}

		post_blog($title, $slug, $video, $tags, $body, $userName);
		header('Location: ' . Util::getHost() . '/blog/' . $slug);
	}

	function post_xhr() {
		$title = $_POST["title"];
		$slug = Util::slugify($title);
		$slugCount = get_slug_count($slug);
		if ($slugCount["slugs"] > 0) {
			$slug = Util::increment_string($slug, '-', $slugCount["slugs"] + 1);
		}
		echo $slug;
	}
}

?>