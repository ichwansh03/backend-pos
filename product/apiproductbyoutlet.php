<?php
	include '../connect.php';

    $outlet = $_GET['in_outlet'];

	$query = "SELECT * FROM product WHERE in_outlet = '".$outlet."'";
	$msql = mysqli_query($conn, $query);

	$image = "http://localhost/pos/image/";

	$jsonArray = array();

	while ($product = mysqli_fetch_assoc($msql)) {
		
		$rows['id'] = $product['id'];
		$rows['name'] = $product['name'];
        $rows['price'] = $product['price'];
        $rows['merk'] = $product['merk'];
		$rows['stock'] = $product['stock'];
        $rows['image'] = $image.$product['image'];
		$rows['description'] = $product['description'];
		$rows['cat_product'] = $product['cat_product'];
        $rows['in_outlet'] = $product['in_outlet'];

		array_push($jsonArray, $rows);
	}

	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>