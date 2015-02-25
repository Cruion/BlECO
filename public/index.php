<?php header("location: /");?>




<?php

require "handlers/home_handler.php";
require "handlers/blogs_handler.php";
require "handlers/blog_handler.php";
require "handlers/group_handler.php";
require "handlers/group_post_handler.php";
require "../lib/mysql.php";
require "../lib/util.php";
require "../lib/queries.php";
require "../lib/Toro.php";

ToroHook::add("404", function () {
	header("HTTP/1.0 404 Not Found");
	echo "Page does not exist";
	exit;
});

Toro::serve(array(
	"/public/" => "PublicHomeHandler",
	"/public/blog" => "PublicBlogsHandler",
	"/public/blog/:alpha" => "PublicBlogHandler",
	"/public/groups" => "PublicGroupHandler",
	"/public/groups/:alpha" => "PublicGroupPostHandler",
));
?>