<!DOCTYPE html>

<html>
<?php
session_start();                          

if(!isset($_SESSION['zalogowany']))
{  
    header('Location: index.php');
    exit();
} else if( $_SESSION['user_role'] == 0)
{
  header('Location: index.php');
  exit();
}
?> 
<head>
    <title>Delete form</title>
    
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/demo.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
<div class="container">
        <header style="padding-bottom: 30px;  display: flex; justify-content: center;">
<h1> USUŃ WZÓR</h1>
        </header>
        <main >
                
                    <?php                            
                        require_once "delimages.php";
                    ?> 
                                 
            </main>
        </div>       
        <script src="js/app.js"></script>
    </body>
</html>