<?php
include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$in_outlet = $_POST['in_outlet'];
	$no_pin = $_POST['no_pin'];

    $sql = "UPDATE employee SET name = '".$name."', phone = '".$phone."', job = '".$job."', email = '".$email."', in_outlet = '".$in_outlet."', no_pin = '".$no_pin."' WHERE id = '".$id."';";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('status' => 'OK', 'message' => 'Berhasil Update Data Produk'));
    } else {
        echo json_encode(array('status' => 'KO', 'message' => 'Gagal Update Data Produk'));
    }
    
    mysqli_close($conn);
}
?>