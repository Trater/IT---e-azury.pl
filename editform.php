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
    <title>Edit form</title>
    
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/demo.css"> 
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
<div class="container">
  <header class="logo">
  <?php
      include_once "header.php";
      
  ?>
  </header>
  <main>
      <?php
          include_once "navBar.php";            
      ?>
       <div class="container">
        <header style="padding-bottom: 30px;  display: flex; justify-content: center;">
<h2> EDYTUJ WZÓR</h2>
        </header>
        <main style="height: 1000px;">

<div class="upload">

<form action="edit.php" method="post" enctype="multipart/form-data">
  <div >
  <select name="wzor" style="height: 22px; border-color:rgb(76, 149, 168); border-radius: 3px; color:rgb(76, 149, 168);">
    <option value="" disabled selected hidden>Wybierz wzór</option>
    <?php                            
      require_once "editimages.php";
    ?> 
    </select>
  <h5>Wybierz zdjęcie wzoru:</h5> 
    <input type="file" name="file" style="width: 220px">
</div>
    <div class="upload-details">

    <div class="details"> 
      <h5>Kategoria</h5> 
    <select name="category" style="height: 22px; border-color:rgb(76, 149, 168); border-radius: 3px; color:rgb(76, 149, 168);">
    <option value="" disabled selected hidden>Wybierz kategorie</option>
      <option value="po">Poziome</option>
      <option value="pi">Pionowe</option>
      <option value="w">Wstawki</option>
      <option value="r">Ramki</option>
      <option value="n">Narożne</option>
      <option value="z">Zawieszki</option>
    </select>
</div> 
<div class="details"> 
      <h5>Podkategoria</h5> 
    <select name="subcategory" style="height: 22px" placeholder="Sdas">   
      <option value="" disabled selected hidden>Wybierz podkategorie</option>
      <option value="brak">Brak</option>       
      <option value="b">Boże narodzenie</option>
      <option value="wi">Wielkanoc</option>
      <option value="j">Jesień</option>
    </select>
    </div>
    <div class="details"> 
      <h5>Nazwa wzoru</h5> 
      <input name="title" placeholder="Nazwa wzoru">
    </div>
    <div style="padding-top: 20px;"  > 
    <input type="submit" name="submit" value="ZAAKCEPTUJ" class="add-button" >
</div>
</div>
</form>
</div>
</main>


  </main>
</div>

</body>

</html>