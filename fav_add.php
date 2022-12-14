<?php
	require_once "connect.php";
	$conn = new mysqli($host, $db_user,$db_password,$db_name);

	session_start();


	$id=$_POST['img_id'];

    $user = $_SESSION['user_id'];

	$sql = "INSERT INTO `favourite`(`favourite_id`, `users_user_id`, `images_img_id`) 
	VALUES (NULL,'$user','$id')";


$query=$polaczenie->query($zapytanie)
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>

