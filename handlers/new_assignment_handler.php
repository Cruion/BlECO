<?php

class NewAssignmentHandler {
	function get() {

		$userDetails = userAuth();
		$assignments = get_blogs_assignment();

		$currentWeek = get_current_week();
		$numPosts = get_number_of_group_post_by_week($userDetails["groupId"], $currentWeek["startDate"], $currentWeek["endDate"]);
		include "views/newassignment.php";
	}

	function post() {
		$assignment = $_POST["assignment"];
		$body = $_POST["body"];
		$userName = $_SESSION['userName'];

		// $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");
		if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
			$name = $_FILES['attachment']['name'];
			if (strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				// if (in_array($ext, $valid_formats)) {
					$actual_image_name = uniqid($_SESSION['userName'] . "_") . "." . $ext;
					$tmp = $_FILES['attachment']['tmp_name'];
					if (move_uploaded_file($tmp, "assignments/" . $actual_image_name)) {
						// do move
						$response = "Assignment successfully submitted. You can view your submission at <a target='_blank' href='http://deco3850.uqcloud.net/assignments/" . $actual_image_name."'>http://deco3850.uqcloud.net/assignments/" . $actual_image_name."</a>";
						$responseCode = "success";
						
						post_assignment($assignment, $body, $_SESSION['userName'], $actual_image_name);
					} else {
						$response = "Upload failed.";
						$responseCode = "error";
					}
				// } else {
				// 	$response = "Invalid file format..";
				// 	$responseCode = "error";
				// }
			} else {
				$response = "Please select an attachment.";
				$responseCode = "error";
			}
		} else {
			$response = "Please select an attachment.";
			$responseCode = "error";
		}

		$response = $response;
		$assignments = get_blogs_assignment();
		include "views/newassignment.php";
		//header('Location: ' . Util::getHost() . '/blog/' . $slug);
	}
}

?>