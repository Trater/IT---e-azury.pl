<!DOCTYPE html>

<html>

<head>
    <title>DECORUM</title>
    
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/demo.css"> 
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <?php
                include_once "header.php";
            ?>
        </header>
        <main>
            <?php
                include_once "navBar.php";            
            ?>


            <section style="padding: 0">
                <div class="slider" id="main-slider">
                    <!-- outermost container element -->
                    <div class="slider-wrapper">
                        <!-- innermost wrapper element -->
                        <img src="main.png" alt="First" class="slide" /><!-- slides -->
                        <img src="main2.png" alt="Second" class="slide" />
                    </div>
                </div>
            </section>
            <section>
                <div class="linie">
                    <img src="liniab.png" width="750px" height="7px">
                    <h2>RODZAJE AŻURÓW</h2>
                    <img src="liniab.png" width="750px" height="7px">
                </div>
                <ul class="types">
                    <li>
                        <a href="poziome.php">
                            <h3>Poziome</h3><img src="poziome/poz.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="wstawki.php">
                            <h3>Wstawki</h3><img src="wstawki/wstawka.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="ramki.php">
                            <h3>Ramki</h3><img src="ramki/ramka.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="narozne.php">
                            <h3>Narożne</h3><img src="narozne/nar.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="pionowe.php">
                            <h3>Pionowe</h3><img src="pionowe/pion.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="zawieszki.php">
                            <h3>Zawieszki</h3><img src="zawieszki/zaw.png" alt="">
                        </a>
                    </li>

                </ul>
            </section>
            <section>
                <div class="linie">
                    <img src="liniab.png" width="750px" height="7px">
                    <h2>OKAZJE</h2>
                    <img src="liniab.png" width="750px" height="7px">
                </div>
                <ul class="types">

                    <li>
                        <a href="bozeNarodzenie.php">
                            <div class="oc">
                                <img class="occasions" src="icons/christmas.svg">
                                <h3>Boże narodzenie</h3>
                            </div>
                            <img src="poziome/chris.png" />
                        </a>
                    </li>
                    <li>
                        <a href="wielkanoc.php">
                        <div class="oc">
                            <img class="occasions" src="icons/easter.svg">
                            <h3>Wielkanoc</h3>
                        </div>
                        <img src="poziome/east.png" />
                    </a>
                    </li>
                    <li>
                        <a href="jesien.php">
                        <div class="oc">
                            <img class="occasions" src="icons/autumn.ico">
                            <h3>Jesień</h3>
                        </div>
                        <img src="poziome/liscie.png">
                    </a>
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
