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

?>