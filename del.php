<?php
	require_once "connect.php";
	$conn = new mysqli($host, $db_user,$db_password,$db_name);

	@session_start();


	$id=$_POST['img_id'];   

	$sql = "DELETE FROM `images` WHERE img_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>

