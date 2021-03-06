<?php

function get_blog_profile() {
	$query = MySQL::getInstance()->query("SELECT * FROM blogprofile");
	return $query->fetchALL();
}

function get_groups() {
	$query = MySQL::getInstance()->query("SELECT * FROM groups");
	return $query->fetchALL();
}

function get_group_by_slug($slug) {
	$query = MySQL::getInstance()->prepare("SELECT * FROM groups WHERE slug=:slug");
	$query->bindValue(":slug", $slug, PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function get_group_blogs($groupId) {
	$query = MySQL::getInstance()->prepare("SELECT blogs.*, users.userName, users.givenName, users.familyName, users.userIcon, COUNT(commentId) as comments, groups.name, groups.groupIcon FROM blogs JOIN users ON blogs.author = users.userName AND users.groupID = :groupId LEFT JOIN comments ON blogs.blogId = comments.blogId LEFT JOIN groups ON users.groupId = groups.groupId GROUP BY blogs.blogId ORDER BY blogs.blogId DESC");
	$query->bindValue(":groupId", $groupId, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchALL();
}

function get_student_blogs($student) {
	$query = MySQL::getInstance()->prepare("SELECT * FROM (SELECT blogs.*, users.givenName, users.familyName, users.userIcon, COUNT(commentId) as comments, groups.name, groups.groupIcon FROM blogs JOIN users ON blogs.author = users.userName LEFT JOIN comments ON blogs.blogId = comments.blogId LEFT JOIN groups ON users.groupId = groups.groupId GROUP BY blogs.blogId ORDER BY blogs.blogId DESC) AS T WHERE author = :student");
	$query->bindValue(":student", $student, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_group_blogs_between($groupId, $startDate, $endDate) {
	$query = MySQL::getInstance()->prepare("SELECT blogs.*, users.givenName, users.familyName, COUNT(commentId) as comments, groups.name, groups.groupIcon FROM blogs JOIN users ON blogs.author = users.userName AND users.groupID = :groupId AND blogs.published BETWEEN :startDate AND :endDate LEFT JOIN comments ON blogs.blogId = comments.blogId LEFT JOIN groups ON users.groupId = groups.groupId GROUP BY blogs.blogId ORDER BY blogs.blogId DESC");
	$query->bindValue(":groupId", $groupId, PDO::PARAM_INT);
	$query->bindValue(":startDate", $startDate, PDO::PARAM_STR);
	$query->bindValue(":endDate", $endDate, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_student_blogs_between($student, $startDate, $endDate) {
	$query = MySQL::getInstance()->prepare("SELECT * FROM (SELECT blogs.*, users.givenName, users.familyName, COUNT(commentId) as comments, groups.name, groups.groupIcon FROM blogs JOIN users ON blogs.author = users.userName AND blogs.published BETWEEN :startDate AND :endDate LEFT JOIN comments ON blogs.blogId = comments.blogId LEFT JOIN groups ON users.groupId = groups.groupId GROUP BY blogs.blogId ORDER BY blogs.blogId DESC) AS T WHERE author = :student");
	$query->bindValue(":student", $student, PDO::PARAM_STR);
	$query->bindValue(":startDate", $startDate, PDO::PARAM_STR);
	$query->bindValue(":endDate", $endDate, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_number_of_group_post_by_week($groupId, $startDate, $endDate) {
	$query = MySQL::getInstance()->prepare("SELECT COUNT(blogs.blogId) as numPosts FROM blogs JOIN users ON blogs.author = users.userName AND users.groupID = :groupId LEFT JOIN groups ON users.groupId = groups.groupId WHERE blogs.published BETWEEN :startDate AND :endDate");
	$query->bindValue(":groupId", $groupId, PDO::PARAM_INT);
	$query->bindValue(":startDate", $startDate, PDO::PARAM_STR);
	$query->bindValue(":endDate", $endDate, PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function get_current_week() {
	$query = MySQL::getInstance()->prepare("SELECT *, CONCAT(FLOOR(HOUR(TIMEDIFF(:now, endDate)) / 24), ' days, ',MOD(HOUR(TIMEDIFF(:now, endDate)), 24), ' hours, ',MINUTE(TIMEDIFF(:now, endDate)), ' minutes') as remaining FROM weeks WHERE startDate <= :now AND endDate >= :now");
	$query->bindValue(":now", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function get_blogs() {
	$query = MySQL::getInstance()->query("SELECT blogs.*, users.userName, users.givenName, users.familyName, groups.name, groups.groupIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId GROUP BY blogId ORDER BY blogId DESC LIMIT 10");
	return $query->fetchALL();
}

function get_blogs_named() {
	$query = MySQL::getInstance()->prepare("SELECT * FROM (SELECT blogs.*, users.userName, users.givenName, users.familyName, users.userIcon, groups.name, groups.groupIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId GROUP BY blogId ORDER BY blogId DESC) AS T WHERE name = 'Staff'");
	$query->execute();
	return $query->fetchALL();
}

function get_blogs_student() {
	$query = MySQL::getInstance()->query("SELECT * FROM (SELECT blogs.*, users.userName, users.givenName, users.familyName, users.userIcon, groups.name, groups.groupIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId GROUP BY blogId ORDER BY blogId DESC) AS T WHERE name != 'Staff' LIMIT 10");
	return $query->fetchALL();
}

function get_blogs_assignment() {
	$query = MySQL::getInstance()->query("SELECT * FROM blogs WHERE tags LIKE '%assignments%'");
	return $query->fetchALL();
}

function get_more_blogs($offset) {
	$query = MySQL::getInstance()->prepare("SELECT blogs.*, users.givenName, users.familyName, groups.name, groups.groupIcon, users.userIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId GROUP BY blogId ORDER BY blogId DESC LIMIT 10 OFFSET :offset");
	$query->bindValue(":offset", $offset * 10, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchALL();
}

function get_more_blogs_student($offset) {
	$query = MySQL::getInstance()->prepare("SELECT * FROM (SELECT blogs.*, users.userName, users.givenName, users.familyName, users.userIcon, groups.name, groups.groupIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId GROUP BY blogId ORDER BY blogId DESC) AS T WHERE name != 'Staff' LIMIT 10 OFFSET :offset");
	$query->bindValue(":offset", $offset * 10, PDO::PARAM_INT);
	$query->execute();
	return $query->fetchALL();
}

function get_blog_by_slug($slug) {
	$query = MySQL::getInstance()->prepare("SELECT blogs.*, users.givenName, users.familyName, users.userIcon, groups.name, groups.groupId, groups.groupIcon, COUNT(comments.commentId) as comments FROM blogs LEFT JOIN comments ON comments.blogId=blogs.blogId LEFT JOIN users ON users.userName=blogs.author LEFT JOIN groups ON groups.groupId=users.groupId WHERE blogs.slug =:slug GROUP BY blogId");
	$query->bindValue(":slug", $slug, PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function get_comments_by_id($blogId) {
	$query = MySQL::getInstance()->prepare("SELECT comments.*, users.givenName, users.familyName, groups.name FROM comments, blogs, users, groups WHERE users.userName = comments.author AND blogs.blogId=comments.blogId AND users.groupId=groups.groupId AND blogs.blogId=:blogId ORDER BY commentId ASC");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function set_comment($blogId, $body, $author) {
	$query = MySQL::getInstance()->prepare("INSERT INTO comments (blogId, body, author, posted, critique) VALUES (:blogId, :body, :author, :posted, false)");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_STR);
	$query->bindValue(":body", $body, PDO::PARAM_STR);
	$query->bindValue(":author", $author, PDO::PARAM_STR);
	$query->bindValue(":posted", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->execute();
}

function set_critique($blogId, $body, $author) {
	$query = MySQL::getInstance()->prepare("INSERT INTO comments (blogId, body, author, posted, critique) VALUES (:blogId, :body, :author, :posted, true)");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_STR);
	$query->bindValue(":body", $body, PDO::PARAM_STR);
	$query->bindValue(":author", $author, PDO::PARAM_STR);
	$query->bindValue(":posted", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->execute();
}

function get_weeks_before_now() {
	$query = MySQL::getInstance()->prepare("SELECT * FROM weeks WHERE startDate <= :now ORDER BY weekId DESC");
	$query->bindValue(":now", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_blogs_between($startDate, $endDate) {
	$query = MySQL::getInstance()->prepare("SELECT title, slug FROM blogs WHERE published BETWEEN :startDate AND :endDate ORDER BY blogId DESC");
	$query->bindValue(":startDate", $startDate, PDO::PARAM_STR);
	$query->bindValue(":endDate", $endDate, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_blogs_between_student($startDate, $endDate) {
	$query = MySQL::getInstance()->prepare("SELECT blogs.title, blogs.slug, blogs.author, users.givenName, users.familyName FROM blogs, users WHERE blogs.published BETWEEN :startDate AND :endDate AND blogs.author LIKE 's%' AND blogs.author = users.userName ORDER BY blogs.blogId DESC");
	$query->bindValue(":startDate", $startDate, PDO::PARAM_STR);
	$query->bindValue(":endDate", $endDate, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}

function get_images() {
	$query = MySQL::getInstance()->query("SELECT images.*, users.givenName, users.familyName, groups.name FROM images, users, groups WHERE images.author = users.userName AND groups.groupId = users.groupId ORDER BY imageId DESC");
	return $query->fetchALL();
}

function set_image($uri, $description, $author) {
	$query = MySQL::getInstance()->prepare("INSERT INTO images (uri, description, author) VALUES (:uri, :description, :userName)");
	$query->bindValue(":uri", $uri, PDO::PARAM_STR);
	$query->bindValue(":description", $description, PDO::PARAM_STR);
	$query->bindValue(":userName", $author, PDO::PARAM_STR);
	$query->execute();
}

function get_user_details($userName) {
	$query = MySQL::getInstance()->prepare("SELECT users.*, groups.name, groups.groupIcon FROM users, groups WHERE users.groupId = groups.groupId AND users.userName = :userName");
	$query->bindValue(":userName", $userName, PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function get_slug_count($slug) {
	$query = MySQL::getInstance()->prepare("SELECT COUNT(slug) as slugs FROM blogs WHERE slug LIKE :slug");
	$query->bindValue(":slug", $slug . "%", PDO::PARAM_STR);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function post_blog($title, $slug, $video, $tags, $body, $author) {
	$query = MySQL::getInstance()->prepare("INSERT INTO blogs (title, slug, video, tags, body, published, author, modified) VALUES (:title, :slug, :video, :tags, :body, :published, :author, :modified)");
	$query->bindValue(":title", $title, PDO::PARAM_STR);
	$query->bindValue(":slug", $slug, PDO::PARAM_STR);
	$query->bindValue(":video", $video, is_null($video) ? PDO::PARAM_NULL : PDO::PARAM_STR);
	$query->bindValue(":tags", $tags, is_null($tags) ? PDO::PARAM_NULL : PDO::PARAM_STR);
	$query->bindValue(":body", $body, PDO::PARAM_STR);
	$query->bindValue(":author", $author, PDO::PARAM_STR);
	$query->bindValue(":published", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->bindValue(":modified", null, PDO::PARAM_NULL);
	$query->execute();
}

function post_assignment($title, $body, $author, $filename) {
	$query = MySQL::getInstance()->prepare("INSERT INTO assignments (assignment, notes, filename, published, author, modified) VALUES (:assignment, :notes, :filename, :published, :author, :modified)");
	$query->bindValue(":assignment", $title, PDO::PARAM_STR);
	$query->bindValue(":notes", $body, PDO::PARAM_STR);
	$query->bindValue(":filename", $filename, PDO::PARAM_STR);
	$query->bindValue(":author", $author, PDO::PARAM_STR);
	$query->bindValue(":published", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->bindValue(":modified", null, PDO::PARAM_NULL);
	$query->execute();
}

function get_assignments($userName) {
	try{
		$query = MySQL::getInstance()->prepare("SELECT * from assignments ORDER BY assignment, published DESC");
	if (isset($userName)) {
		$query = MySQL::getInstance()->prepare("SELECT * from assignments WHERE author = :author ORDER BY assignment, published DESC");
		$query->bindValue(":author", $userName, PDO::PARAM_INT);
	}
	$query->execute();
	return $query->fetchALL();
	}
catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
}
}

function get_blog_by_id($blogId) {
	$query = MySQL::getInstance()->prepare("SELECT * from blogs WHERE blogId = :blogId");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_INT);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

function put_blog_history($blogId, $title, $slug, $video, $body, $published, $author, $modified) {
	$query = MySQL::getInstance()->prepare("INSERT INTO blogs_history (blogId, title, slug, video, body, published, author, modified) VALUES (:blogId, :title, :slug, :video, :body, :published, :author, :modified)");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_INT);
	$query->bindValue(":title", $title, PDO::PARAM_STR);
	$query->bindValue(":slug", $slug, PDO::PARAM_STR);
	$query->bindValue(":video", $video, is_null($video) ? PDO::PARAM_NULL : PDO::PARAM_STR);
	$query->bindValue(":body", $body, PDO::PARAM_STR);
	$query->bindValue(":published", $published, PDO::PARAM_STR);
	$query->bindValue(":author", $author, PDO::PARAM_STR);
	$query->bindValue(":modified", $modified, is_null($modified) ? PDO::PARAM_NULL : PDO::PARAM_STR);
	$query->execute();
}

function update_blog($blogId, $title, $video, $body) {
	$blog = get_blog_by_id($blogId);
	put_blog_history($blog["blogId"], $blog["title"], $blog["slug"], $blog["video"], $blog["body"], $blog["published"], $blog["author"], $blog["modified"]);

	$query = MySQL::getInstance()->prepare("UPDATE blogs SET title = :title, video = :video, body = :body, modified = :modified WHERE blogId = :blogId");
	$query->bindValue(":blogId", $blogId, PDO::PARAM_INT);
	$query->bindValue(":title", $title, PDO::PARAM_STR);
	$query->bindValue(":video", $video, is_null($video) ? PDO::PARAM_NULL : PDO::PARAM_STR);
	$query->bindValue(":body", $body, PDO::PARAM_STR);
	$query->bindValue(":modified", date("Y-m-d H:i:s"), PDO::PARAM_STR);
	$query->execute();
}

function update_group_icon($groupId, $image) {
	$query = MySQL::getInstance()->prepare("UPDATE groups SET groupIcon = :groupIcon WHERE groupId = :groupId");
	$query->bindValue(":groupId", $groupId, PDO::PARAM_INT);
	$query->bindValue(":groupIcon", $image, PDO::PARAM_STR);
	$query->execute();
}

function set_user_avatar($userName, $avatar) {
	$query = MySQL::getInstance()->prepare("UPDATE users SET userIcon = :avatar WHERE userName = :userName");
	$query->bindValue(":userName", $userName, PDO::PARAM_STR);
	$query->bindValue(":avatar", $avatar, PDO::PARAM_STR);
	$query->execute();
}

function get_students() {
	$query = MySQL::getInstance()->query("SELECT * from users WHERE isStaff = false");
	return $query->fetchALL();
}

/*function get_student_blogs($userName) {
	$query = MySQL::getInstance()->prepare("SELECT * from blogs WHERE author = :authorId");
	$query->bindValue(":authorId", $userName, PDO::PARAM_STR);
	$query->execute();
	return $query->fetchALL();
}*/

/**
 *
 * function get_article_by_slug($slug) {
$query = MySQL::getInstance()->prepare("SELECT * FROM articles WHERE slug=:slug");
$query->bindValue(':slug', $slug, PDO::PARAM_STR);
$query->execute();
return $query->fetch(PDO::FETCH_ASSOC);
}
 *
 */
?>