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
                        <h2>Ażury poziome</h2>
                        <img src="liniab.png" width="750px" height="7px">
                    </div>
                    <ul class="types">
                        <li>
                           <img src="poziome/poz.png" alt=""><h3>1. Viktorian</h3>                                      
                        </li>
                        <li>
                            <img src="poziome/diana.png" alt=""><h3>2. Diana</h3>   
                        </li>
                        <li>
                            <img src="poziome/ombre.png" alt=""><h3>3. Ombre</h3>   
                        </li> 
                        <li>
                            <img src="poziome/aztekan.png" alt=""><h3>4. Aztekan</h3>   
                        </li>
                        <li>
                            <img src="poziome/rodo.png" alt=""><h3>5. Rodo</h3>   
                        </li>   
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