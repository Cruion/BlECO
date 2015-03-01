<?php

class ImagesHandler {

	function get() {
		$userDetails = userAuth();

		$images = get_images();
		include "views/images.php";
	}

	function post() {
		$userDetails = userAuth();

		$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");
		if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["description"]) && strlen(trim($_POST['description'])) > 0) {
			$name = $_FILES['image']['name'];
			if (strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if (in_array($ext, $valid_formats)) {
					global $userName;
					$actual_image_name = uniqid($_SESSION['userName'] . "_") . "." . $ext;
					$tmp = $_FILES['image']['tmp_name'];
					if (move_uploaded_file($tmp, "img/" . $actual_image_name)) {
						// do move
						$response = "Image uploaded successfully: img/" . $actual_image_name;
						$responseCode = "success";
						set_image($actual_image_name, $_POST["description"], $_SESSION['userName']);
					} else {
						$response = "Upload failed.";
						$responseCode = "error";
					}
				} else {
					$response = "Invalid file format..";
					$responseCode = "error";
				}
			} else {
				$response = "Please select an image and enter a description!";
				$responseCode = "error";
			}
		} else {
			$response = "Please select an image and enter a description!";
			$responseCode = "error";
		}

		$response = $response;
		$responseCode = $responseCode;
		$images = get_images();
		include "views/images.php";
	}

}

?>