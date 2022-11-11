<!DOCTYPE html>

<html>

<head>
    <title>DECORUM</title>
    
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/demo.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="container">
	<header>
            <?php
                require_once "header.php";
            ?>
        </header>
        <main>
            <?php
                require_once "navBar.php";
            ?>
                <section>
                    <div class="linie" style="padding-top:100px">                        
                        <h2>Wzory bożonarodzeniowe</h2>
                        <img src="liniab.png" width="750px" height="7px">
                    </div>
                    <ul class="types">
                    <?php
                            $_SESSION['kategoria'] = "b";
                            require_once "displayimages.php";
                        ?>                              
                    </ul>
                </section>  
                         
            </main>
           
    </div>
   
	<?php
            require_once "logowanie.php";
    ?>
    <script src="js/app.js"></script>
    <script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
    <script src="js/main.js"></script> <!-- Resource JavaScript -->

        
    </body>
</html>