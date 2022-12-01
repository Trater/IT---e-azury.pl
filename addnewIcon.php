<!DOCTYPE html>

<html>

<?php
if(session_status()!=2){
  session_start();
  }

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true) && ($_SESSION['user_role'] == 1))
{
  echo<<<END
  <div 
  style=
  "display: inline-block;
  position: fixed;
  top:600px">   
  <a href="addnew.php">
  <img src="icons/AddNew96.png" alt="">
  </a>
  </div>
  END;
}
?>

</html>