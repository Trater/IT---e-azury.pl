<!DOCTYPE html>

<html>
<?php
session_start();


                            

if((!isset($_SESSION['zalogowany'])) || ($_SESSION['user_role'] != 1))
{
    header('Location: index.php');
    exit();
}
?> 

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
                        <h2>DODAJ NOWY WZÓR</h2>
                        <img src="liniab.png" width="750px" height="7px">
                    </div>
                    <form style="padding-top:20px ;" action="upload.php" method="post" enctype="multipart/form-data">
                      <p>Wybierz plik ze wzorem: <input type="file" name="file"></p> 
                      <p>Wybierz kategorię: 
                        <select 
                            style=
                              "background-color: rgb(214, 234, 240);
                              border-radius: 5px;
                              color: gray;
                              font-size: 12px;
                              width: 200px;
                              height: 20px;
                              margin: 0 0 0 0;
                              padding-left: 6px;
                              padding-top: 2px;
                              border-width: 1px;
                              border-color: rgb(76, 149, 168);
                              border: none;
                              box-shadow: 1px 1px 3px 1px rgb(73, 119, 128);" 
                            name="category">
                          <option value=NULL selected></option>
                          <option value="po">Poziome</option>
                          <option value="pi">Pionowe</option>
                          <option value="w">Wstawki</option>
                          <option value="r">Ramki</option>
                          <option value="n">Narożne</option>
                          <option value="z">Zawieszki</option>
                        </select>
                      </p>
                      <p> Wybierz podkategorię: 
                        <select 
                        style=
                          "background-color: rgb(214, 234, 240);
                          border-radius: 5px;
                          color: gray;
                          font-size: 12px;
                          width: 200px;
                          height: 20px;
                          margin: 0 0 0 0;
                          padding-left: 6px;
                          padding-top: 2px;
                          border-width: 1px;
                          border-color: rgb(76, 149, 168);
                          border: none;
                          box-shadow: 1px 1px 3px 1px rgb(73, 119, 128);" 
                        name="subcategory">
                          <option value="" selected>Brak</option>
                          <option value="b">Boże narodzenie</option>
                          <option value="wi">Wielkanoc</option>
                          <option value="j">Jesień</option>
                        </select>
                      </p>
                      <p> Wybierz tytuł: 
                        <input 
                        style=
                          "background-color: rgb(214, 234, 240);
                          border-radius: 5px;
                          color: gray;
                          font-size: 12px;
                          width: 200px;
                          height: 20px;
                          margin: 0 0 0 0;
                          padding-left: 6px;
                          padding-top: 2px;
                          border-width: 1px;
                          border-color: rgb(76, 149, 168);
                          border: none;
                          box-shadow: 1px 1px 3px 1px rgb(73, 119, 128);" 
                        name="title" placeholder="Tytuł wzoru">
                      </p>
                      <p>
                        <input style=
                        "margin: 0;
                        padding: 0;
                        border-radius: 0.25em;
                        text-decoration: none;
                         padding: 16px 0;
                          cursor: pointer;
                          background: #2f889a;
                          color: #FFF;
                          font-weight: bold;
                          border: none;
                          -webkit-appearance: none;
                              -moz-appearance: none;
                                  appearance: none;
                          -webkit-font-smoothing: antialiased;
                          -moz-osx-font-smoothing: grayscale;
                          width: 20%;" 
                        
                        type="submit" name="submit" value="Dodaj">
                      </p>
                    </form>
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