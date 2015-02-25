<?php
session_start();

$_SESSION['userName'] = $_SERVER["HTTP_X_UQ_USER"];
$_SESSION['guest'] = "notGuest";

require "handlers/user_handler.php";
require "handlers/home_handler.php";
require "handlers/blog_handler.php";
require "handlers/blog_edit_handler.php";
require "handlers/blogs_handler.php";
require "handlers/comment_handler.php";
require "handlers/image_handler.php";
require "handlers/logout_handler.php";
require "handlers/group_handler.php";
require "handlers/group_post_handler.php";
require "handlers/new_blog_handler.php";
require "handlers/static_pages_handler.php";
require "lib/mysql.php";
require "lib/util.php";
require "lib/queries.php";
require "lib/Toro.php";

ToroHook::add("404", function () {
	header("HTTP/1.0 404 Not Found");
	echo "Page does not exist";
	exit;
});

Toro::serve(array(
	"/" => "HomeHandler",
	"/blog" => "BlogsHandler",
	"/blog/:alpha" => "BlogHandler",
	"/blog/:alpha/edit" => "BlogEditHandler",
	"/blog/:number/comment" => "CommentHandler",
	"/new-blog" => "NewBlogHandler",
	"/images" => "ImagesHandler",
	"/logout" => "LogoutHandler",
	"/groups" => "GroupHandler",
	"/groups/:alpha" => "GroupPostHandler",
	"/inspiration" => "InspirationHandler",
	"/assignments" => "AssignmentsHandler",
	"/resources" => "ResourcesHandler",
));

$_SESSION['courseProfile'] = get_blog_profile();
$_SESSION['courseProfile'] = $_SESSION['courseProfile'][0];

?>