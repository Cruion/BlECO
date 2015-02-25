<?php

class BlogHandler {
	function get($slug) {
		userAuth();

		$blog = get_blog_by_slug($slug);
		include "views/blog.php";
	}
}

?>