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



//if($result = @$polaczenie->query(
  //  sprintf("SELECT * FROM users WHERE user_email = '%s' AND user_password = '%s'",
    //mysqli_real_escape_string($polaczenie,$email),
    //mysqli_real_escape_string($polaczenie,$password))))
    if($result = @$polaczenie->query(sprintf("SELECT * FROM users WHERE user_email = '%s'",
    mysqli_real_escape_string($polaczenie,$email))))
    {
        $column=$result->fetch_assoc();
        $hashed_password = $column['user_password'];
        if(password_verify(mysqli_real_escape_string($polaczenie,$password),$hashed_password))
        {
            $number_of_users = $result->num_rows;
            if($number_of_users>0)
            {
                $_SESSION['zalogowany'] = true;                
                $_SESSION['user_id'] = $column['user_id'];
                $_SESSION['user_name'] = $column['user_name'];
                $_SESSION['user_email'] = $column['user_email'];
                $_SESSION['user_role'] = $column['user_role'];

                $result->close();
            
                header('Location: index.php');
            }
        }
        else 
        {
            echo "<script>
            alert('Niepoprawne dane. Spróbuj ponownie!');
            window.location.href='index.php';
            </script>";
            exit();
        }
    }
    else 
    {
        echo "<script>
        alert('Niepoprawne dane. Spróbuj ponownie!');
        window.location.href='index.php';
        </script>";
        exit();
    }

$polaczenie->close();
}
?>