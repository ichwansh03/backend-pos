<?php
	include '../connect.php';

	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {

		$id = $_GET['id'];

		// check if the employee exists
		$query_select = "SELECT * FROM employee WHERE id = '".$id."'";
		$result_select = mysqli_query($conn, $query_select);

		if (mysqli_num_rows($result_select) > 0) {
			// delete the employee
			$query_delete = "DELETE FROM employee WHERE id = '".$id."'";
			$result_delete = mysqli_query($conn, $query_delete);

			if ($result_delete) {
				array_push($response, array(
					'status' => 'OK'
				));
			} else {
				array_push($response, array(
					'status' => 'FAILED TO DELETE'
				));
			}

		} else {
			array_push($response, array(
				'status' => 'EMPLOYEE NOT FOUND'
			));
		}

	} else {
		array_push($response, array(
			'status' => 'FAILED'
		));
	}

	header('Content-type: application/json');
	echo json_encode($response);
?>
