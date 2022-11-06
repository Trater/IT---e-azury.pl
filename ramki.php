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
                        <h2>Ramki ażurowe</h2>
                        <img src="liniab.png" width="750px" height="7px">
                    </div>
                    <ul class="types">
                        <li>
                           <img src="ramki/w10.png" alt=""><h3>W10. Sztylety</h3>                                      
                        </li>
                        <li>
                            <img src="ramki/w11.png" alt=""><h3>W11. Geometryczny</h3>   
                        </li>
                        <li>
                            <img src="ramki/w12.png" alt=""><h3>W12. Pajęczyna</h3>   
                        </li> 
                        <li>
                            <img src="ramki/w13.png" alt=""><h3>W13. Maroko</h3>   
                        </li>
                        <li>
                            <img src="ramki/w14.png" alt=""><h3>W14. Fantazy</h3>   
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