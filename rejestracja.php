<?php
session_start();

//$errors = array('username_err'=>'', 'email_err'=>'');

$username = $_POST['signup-username'];
$email = $_POST['signup-email'];
$password = $_POST['signup-password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
    echo "<script>
    alert('Error: '.$polaczenie->connect_errno);
    window.location.href='index.php';
    </script>";
    exit();
}
else 
{
  if ($stmt = $polaczenie->prepare('SELECT user_id FROM users WHERE user_name = ?')) 
  {
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) 
    {
      // Username already exists
      //$errors['username_err'] =  'Username exists, please choose another!';
      echo "<script>
       alert('Istnieje konto o takiej nazwie użytkownika. Wybierz inną nazwę!');
       window.location.href='index.php';
       </script>";
       exit();
      
    }
    elseif ($stmt = $polaczenie->prepare('SELECT user_id FROM users WHERE user_email = ?'))
    {
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->store_result();
      // Store the result so we can check if the account exists in the database.
      if ($stmt->num_rows > 0) 
      {
       // Username already exists
       //$errors['email_err'] = 'Email exists, please choose another!';
       echo "<script>
       alert('Istnieje konto zarejestrowane na ten adres email. Wybierz inny!');
       window.location.href='index.php';
       </script>";
       exit();
      }
      else 
      {
        if ($stmt = $polaczenie->prepare("insert into users(user_name, user_email, user_password) values(?, ?, ?)")) {
          $stmt->bind_param("sss", $username, $email, $hashed_password);
          $stmt->execute();
          $stmt->close();
          echo "<script>
          alert('Zarejestrowano poprawnie, możesz się zalogować!');
          window.location.href='index.php';
          </script>";
          exit();
         // echo 'You have successfully registered, you can now login!';
        } else {
          // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
          echo "<script>
          alert('Nie można było przygotować zapytania SQL.');
          window.location.href='index.php';
          </script>";
          exit();
        }
      }
    }

$polaczenie->close();
  }
}
?>