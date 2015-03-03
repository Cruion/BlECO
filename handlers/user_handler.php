<?php

function userAuth() {

	$userDetails = get_user_details($_SESSION['userName']);
	if (count($userDetails) == 1) {
		$_SESSION['guest'] = "Guest";
	} else {
		$_SESSION['isStaff'] = ($userDetails['groupId'] == 1);
	}

	return $userDetails;

}



class UserProfileHandler {
	function get() {
		$userDetails = userAuth();
		include "views/profile.php";
	}
	
	function post() {
		$userDetails = userAuth();
		
		$avatar = $_POST["avatar"];
		
		if ($avatar != "") {
			set_user_avatar($userDetails["userName"], $avatar);
		}
		
		$userDetails = userAuth();
		include "views/profile.php";
	}
}

?>