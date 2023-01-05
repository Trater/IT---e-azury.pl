<!DOCTYPE html>

<html>

<?php

if(session_status()!=2){
session_start();
}


                       

if(isset($_SESSION['zalogowany']))
{  
    if( $_SESSION['user_role'] == 1)
    {
echo<<< END
        <ul class="upload-button">
		<li>
            <a href="uploadform.php"><img src="icons/plus.png"/><h4> DODAJ WZÓR</h4></a>
        </li>
		<li>
            <a href="deleteform.php"><img src="icons/minus.png"/><h4 >USUŃ WZÓR </h4></a>
		</li>
		<li>
            <a href="editform.php"><img src="icons/edit.png"/><h4>EDYTUJ WZÓR</h4></a>
		</li>
        </ul> 
END;
    }
   
} 
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
	echo <<<END

<div id="placeHolder"></div>
<div class="navigationBar">
	<ul class="js-signin-modal-switcher js-signin-modal-trigger">
		<li class="home"><a href="index.php"><img src="icons/home.svg" ></a></li>
		<li class="searchBar">
		<form name="form_wyszukiwanie" action="wyszukiwanie.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" required>
			<input id="wyszukiwanie" name="wyszukiwanie" type="text" placeholder="SZUKAJ WZORU">
		</form>
		</li>
		<li><a href="ulubione.php">ULUBIONE</a></li>
		<li><a href="nowosci.php">NOWOŚCI</a></li>
		<li><a href="popularne.php">POPULARNE</a></li>
		<li><a href="logout.php">WYLOGUJ</a></li>
	</ul>
	<img src="liniab.png">
</div>
END;
} else {
	echo <<<END

<div id="placeHolder"></div>
<div class="navigationBar">
	<ul class="js-signin-modal-switcher js-signin-modal-trigger">
		<li class="home"><a href="index.php"><img src="icons/home.svg" ></a></li>
		<li class="searchBar">
			<form name="form_wyszukiwanie" action="wyszukiwanie.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" required>
				<input id="wyszukiwanie" name="wyszukiwanie" type="text" placeholder="SZUKAJ WZORU">
			</form>
		</li>		
		<li><a href="nowosci.php">NOWOŚCI</a></li>
		<li><a href="popularne.php">POPULARNE</a></li>
		<li><a href="#0" data-signin="login" data-type="login">LOGOWANIE</a></li>
	</ul>
	<img src="liniab.png">
</div>
END;
}
?>

</html>