<?php

require_once "connect.php";
$kategoria = $_SESSION['kategoria'];

$new_img = -4;//ile dni wstecz maja byc pokazywane zdjecia w zakładce nowości, teraz 4 dni wstecz
$img_popularity = 5; //ilosc polubien zeby zdjecie stalo sie popularne

if($kategoria === 'b' | $kategoria === 'wi' | $kategoria === 'j' )
  $zapytanie = sprintf('select img_filename, img_title, img_id from images where img_subcategory = "%s"', $kategoria);
elseif($kategoria === 'n' | $kategoria === 'po' | $kategoria === 'pi' | $kategoria === 'r' | $kategoria === 'w' | $kategoria === 'z')
  $zapytanie = sprintf('select img_filename, img_title, img_id from images where img_category = "%s"', $kategoria);
elseif($kategoria == 'fav')
  $zapytanie = sprintf('select img_filename, img_title, img_id from images JOIN favourite ON img_id= images_img_id where users_user_id = "%s"', $_SESSION['user_id']);
elseif($kategoria == 'new')
  $zapytanie = sprintf('select img_filename, img_title, img_id, img_uploaded from images where img_uploaded BETWEEN DATE_ADD(CURDATE(), INTERVAL "%d" DAY) AND CURDATE() ORDER BY img_uploaded DESC', $new_img);
elseif($kategoria == 'pop')
  $zapytanie = sprintf('select img_filename, img_title, img_id, COUNT(img_id) as ilosc_polubien from images JOIN favourite ON img_id= images_img_id GROUP BY img_id ORDER BY ilosc_polubien DESC');

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
  if($query=$polaczenie->query($zapytanie))
  {
    if ($query->num_rows > 0) 
    {
      while($row=$query->fetch_assoc())
      {
        $img_URL ='uploaded_images/'.$row["img_filename"];        
        $img_title = $row["img_title"];
        $img_id = $row["img_id"];

        if($kategoria == 'pop')
        {
          $ilosc_polubien = $row['ilosc_polubien'];
          if($ilosc_polubien >= $img_popularity)
          {
            echo <<<END
            <li>
            <img src=$img_URL alt=""><h3>$img_title</h3>                      
            END;
            if(isset($_SESSION['zalogowany']))
            {
              $user = $_SESSION['user_id'];
              $zapytanie2 = sprintf('select * from favourite where images_img_id = "%s" AND users_user_id = "%s"', $img_id , $user);
              $query2=$polaczenie->query($zapytanie2);   
              $ff = $query2->num_rows;          
              if ( $ff)        
                $src = "icons/followed.png";
              else 
                $src = "icons/unfollowed.png";
            echo <<<END
            <a href="#" onclick="return false;"><img class="follow-icon" id=$img_id onclick="changeFollow(this)" src=$src></a> 
            </li>
            END;
            } else 
            echo "</li>";
          }
        }
        else
        {
          echo <<<END
          <li>
          <img src=$img_URL alt=""><h3>$img_title</h3>                      
          END;
          if(isset($_SESSION['zalogowany'])){
            $user = $_SESSION['user_id'];
            $zapytanie2 = sprintf('select * from favourite where images_img_id = "%s" AND users_user_id = "%s"', $img_id , $user);
            $query2=$polaczenie->query($zapytanie2);   
            $ff = $query2->num_rows;          
            if ( $ff)        
            $src = "icons/followed.png";
          else 
            $src = "icons/unfollowed.png";
          echo <<<END
          <a href="#" onclick="return false;"><img class="follow-icon" id=$img_id onclick="changeFollow(this)" src=$src></a> 
          </li>
          END;
          } else 
         echo "</li>";
        }        
      }
    }
  }
}