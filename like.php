
<?php

	require_once "connect.php";
	$conn = new mysqli($host, $db_user,$db_password,$db_name);

	session_start();


	  $id=$_POST['img_id'];
    $rating =$_POST['rating_id'];
    $user = $_SESSION['user_id'];
   
	$sql = "SELECT * FROM rating WHERE users_user_id = '$user' AND images_img_id = '$id'";
	
    $query=$conn->query($sql);  
  
    if (!($query->num_rows > 0) )
    {
       
       // $sql2 = "INSERT INTO `rating` (`rating_id`, `images_img_id`, `users_user_id`) VALUES ('$rating', '$id', '$user');";
        if($stmt = $conn->prepare("INSERT INTO `rating` (`rating_number`, `images_img_id`, `users_user_id`) VALUES (?, ?, ?);"))
        {
          $stmt->bind_param("sss", $rating, $id, $user);
          $stmt->execute();
          $stmt->close();
        }
    }
    else 
    {
       // $sql2 =  "UPDATE `rating` SET `rating_id`='$rating' WHERE `images_img_id`='$id',`users_user_id`='$user'";
       
        if($stmt = $conn->prepare("UPDATE `rating` SET `rating_number`=? WHERE `images_img_id`= ? AND`users_user_id`=?"))
            {
              $stmt->bind_param("sss", $rating, $id, $user);
              $stmt->execute();
              $stmt->close();
            }
    }
    

    
    //$query2=$conn->query($sql2);

    mysqli_close($conn);
?>

