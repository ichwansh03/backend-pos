<?php
	include '../connect.php';

	$query = "SELECT * FROM employee";
	$msql = mysqli_query($conn, $query);

	$jsonArray = array();

	$image = "http://localhost/pos/image/";

	while ($employee = mysqli_fetch_assoc($msql)) {
		
		$rows['id'] = $employee['id'];
		$rows['name'] = $employee['name'];
        $rows['phone'] = $employee['phone'];
        $rows['job'] = $employee['job'];
		$rows['email'] = $employee['email'];
        $rows['image'] = $image.$employee['image'];
		$rows['no_pin'] = $employee['no_pin'];
		$rows['in_outlet'] = $employee['in_outlet'];

		array_push($jsonArray, $rows);
	}

	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>