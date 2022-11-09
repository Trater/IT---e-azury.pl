<?php
session_start();

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else 
{
    $email = $_POST['signin-email'];
$password = $_POST['signin-password'];
$email = htmlentities($email, ENT_QUOTES);
$password = htmlentities($password, ENT_QUOTES);



if($result = @$polaczenie->query(
    sprintf("SELECT * FROM users WHERE user_email = '%s' AND user_password = '%s'",
    mysqli_real_escape_string($polaczenie,$email),
    mysqli_real_escape_string($polaczenie,$password))))
{
    $number_of_users = $result->num_rows;
    if($number_of_users>0)
    {
        $_SESSION['zalogowany'] = true;
        $column = $result->fetch_assoc();
        $_SESSION['user_id'] = $column['user_id'];
        $_SESSION['user_name'] = $column['user_name'];
        $_SESSION['user_email'] = $column['user_email'];
        $_SESSION['user_role'] = $column['user_role'];

        $result->close();
       
        header('Location: index.php');
    } else {
        echo "<script>
        alert('Niepoprawne dane. Spróbuj ponownie!');
        window.location.href='index.php';
        </script>";
    }
}

$polaczenie->close();
}



?>