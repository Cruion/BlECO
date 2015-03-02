<?php

class BlogEditHandler {
	function get($slug) {
		$userDetails = userAuth();

		$blog = get_blog_by_slug($slug);

		if ($userDetails["groupId"] == $blog["groupId"]) {
			include "views/_blog_edit.php";
		} else {
			include "views/blog.php";
		}
	}

	function post($slug) {
		$userDetails = userAuth();

		$blog = get_blog_by_slug($slug);

		if ($userDetails["groupId"] == $blog["groupId"]) {

			$title = $_POST["title"];
			$body = $_POST["body"];
			$video = $_POST["video"];

			if (strlen($video) == 0) {
				$video = null;
			}

			update_blog($blog["blogId"], $title, $video, $body);

			$blog = get_blog_by_slug($slug);
			include "views/blog.php";
		} else {
			include "views/blog.php";
		}
	}
}

?>