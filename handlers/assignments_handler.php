<?php

class AllAssignmentsHandler {
	function get() {
	
		$userDetails = userAuth();
		$assignments = get_assignments();

		include "views/assignments_submissions.php";
	}
}
class MyAssignmentsHandler {
	function get() {
		$userDetails = userAuth();
		$assignments = get_assignments($userDetails['userName']);
		
		include "views/assignments_submissions.php";
	}
}

?>