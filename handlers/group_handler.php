<?php

class GroupHandler {
	function get() {
		$userDetails = userAuth();

		$groups = get_groups();
		include "views/groups.php";
	}

	function post() {
		$userDetails = userAuth();

		$image = $_POST["image"];

		update_group_icon($userDetails["groupId"], $image);

		$groups = get_groups();
		include "views/groups.php";
	}
}

?>