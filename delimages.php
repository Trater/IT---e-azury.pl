<?php

require_once "connect.php";


$kategoria  = array('n','po','pi','r','w','z');
$NAZWA = array('AŻURY NAROŻNE','AŻURY POZIOME','AŻURY PIONOWE','RAMKI AŻUROWE','WSTAWKI AŻUROWE','ZAWIESZKI');
$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);
// Include the database configuration file
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


for ($i = 0; $i <= 5; $i++) 
{


  echo  '<div class="linie">';            
                      
  echo "<h2>".$NAZWA[$i]."</h2>";
  echo<<<END
                      <img src="liniab.png" width="750px" height="7px">
                  </div>
  <section>               
  <ul class="types-del">

  END;

  $zapytanie = sprintf('select img_filename, img_title, img_id from images where img_category = "%s"', $kategoria[$i]);


  if($query=$polaczenie->query($zapytanie))
  {
    if ($query->num_rows > 0) 
      {
        while($row=$query->fetch_assoc())
        {
          $nazwa_pliku = $row["img_filename"];
          $img_URL_not_encoded=sprintf('uploaded_images/%s',$nazwa_pliku);
          $img_URL = str_replace(' ',"%20",$img_URL_not_encoded);      
          $img_title = $row["img_title"];
          $img_id = $row["img_id"];   

            echo <<<END
            <li onclick="deletePattern(this);" id=$img_id>
            <img src=$img_URL alt="KAPPA">
          
            </li>
            END; 
        }
        echo "</ul>";
        echo "</section>"; 
      }
    }
  }
}