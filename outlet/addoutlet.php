<?php
	include '../connect.php';

	$response = array();

	if (isset($_POST['name']) && isset($_POST['address']) && isset($_FILES['image'])) {

		$name = $_POST['name'];
		$address = $_POST['address'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$image = $_FILES['image']['name'];

		$target_path = dirname(__FILE__).'/../image/' . $image;
		move_uploaded_file($image_tmp, $target_path);

		$query = "INSERT INTO outlet (name, address, image) 
		VALUES ('".$name."', '".$address."', '".$image."')";

		$result = mysqli_query($conn, $query);

		if ($result) {
            array_push($response, array(
                'status' => 'OK'
            ));
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }

	} else {
		array_push($response, array(
			'status' => 'FAILED IN ISSET'
		));
	}

	header('Content-type: application/json');
	echo json_encode($response);
?>
