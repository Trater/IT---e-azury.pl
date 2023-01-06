<?php

require_once "connect.php";
$kategoria = $_SESSION['kategoria'];
$inc = 0;
$new_img = -7;//ile dni wstecz maja byc pokazywane zdjecia w zakładce nowości, teraz 4 dni wstecz
$img_popularity = 3; //ilosc polubien zeby zdjecie stalo sie popularne
if(isset($_POST['wyszukiwanie']))
  $wyszukanie = $_POST['wyszukiwanie'];

if(isset($_SESSION['zalogowany']))
{
  $user1=$_SESSION['user_id'];
  if($kategoria === 'b' | $kategoria === 'wi' | $kategoria === 'j' )
  $zapytanie = sprintf('select img_filename, img_title, img_id, rating_number, users_user_id from images LEFT JOIN rating ON (img_id= images_img_id and users_user_id="%s") where img_subcategory = "%s"',$user1, $kategoria);
  elseif( $kategoria === 'po')
  $zapytanie = sprintf('select img_filename, img_title, img_id, rating_number from images LEFT JOIN rating ON (img_id= images_img_id and users_user_id="%s") where img_category = "%s"  ORDER BY cast(substring(img_title, 1, locate(".",img_title)-1) as unsigned)',$user1, $kategoria);
elseif($kategoria === 'n' | $kategoria === 'pi' | $kategoria === 'r' | $kategoria === 'w' | $kategoria === 'z')
  $zapytanie = sprintf('select img_filename, img_title, img_id, rating_number from images LEFT JOIN rating ON (img_id= images_img_id and users_user_id="%s") where img_category = "%s"  ORDER BY substring(img_title, 1, locate(".",img_title)-1)',$user1, $kategoria);
elseif($kategoria == 'fav')
  $zapytanie = sprintf('select img_filename, img_title, img_id, rating_number from images JOIN favourite f ON img_id= f.images_img_id LEFT JOIN rating r ON (img_id= r.images_img_id and r.users_user_id="%s") where f.users_user_id = "%s" ORDER BY substring(img_title, 1, locate(".",img_title)-1)', $user1,$user1);
elseif($kategoria == 'new')
  $zapytanie = sprintf('select img_filename, img_title, img_id, img_uploaded, rating_number from images LEFT JOIN rating ON (img_id= images_img_id and users_user_id="%s") where img_uploaded BETWEEN DATE_ADD(CURDATE(), INTERVAL "%d" DAY) AND CURDATE()+1 ORDER BY img_uploaded DESC', $user1 ,$new_img);
elseif($kategoria == 'pop')
  $zapytanie = sprintf('select img_filename, img_title, img_id, COUNT(img_id) as ilosc_polubien, rating_number from images JOIN favourite f ON img_id= f.images_img_id LEFT JOIN rating r ON (img_id= r.images_img_id and r.users_user_id="%s") GROUP BY img_id ORDER BY ilosc_polubien DESC', $user1);
elseif($kategoria == 'wyszukiwanie' || $kategoria == 'liczba_znalezionych_wzorow')
  $zapytanie = sprintf('select img_filename, img_title, img_id, img_category, rating_number from images LEFT JOIN rating ON (img_id= images_img_id and users_user_id="%s") where img_title like "%%%s%%" order by img_category',$user1, $wyszukanie);
}
else
{
  if($kategoria === 'b' | $kategoria === 'wi' | $kategoria === 'j' )
  $zapytanie = sprintf('select img_filename, img_title, img_id from images where img_subcategory = "%s"', $kategoria);
elseif($kategoria === 'n' | $kategoria === 'po' | $kategoria === 'pi' | $kategoria === 'r' | $kategoria === 'w' | $kategoria === 'z')
  $zapytanie = sprintf('select img_filename, img_title, img_id from images where img_category = "%s"', $kategoria);
elseif($kategoria == 'fav')
  $zapytanie = sprintf('select img_filename, img_title, img_id from images JOIN favourite ON img_id= images_img_id where users_user_id = "%s"', $_SESSION['user_id']);
elseif($kategoria == 'new')
  $zapytanie = sprintf('select img_filename, img_title, img_id, img_uploaded from images where img_uploaded BETWEEN DATE_ADD(CURDATE(), INTERVAL "%d" DAY) AND CURDATE()+1 ORDER BY img_uploaded DESC', $new_img);
elseif($kategoria == 'pop')
  $zapytanie = sprintf('select img_filename, img_title, img_id, COUNT(img_id) as ilosc_polubien from images JOIN favourite ON img_id= images_img_id GROUP BY img_id ORDER BY ilosc_polubien DESC');
elseif($kategoria == 'wyszukiwanie' || $kategoria == 'liczba_znalezionych_wzorow')
  $zapytanie = sprintf('select img_filename, img_title, img_id, img_category from images where img_title like "%%%s%%" order by img_category',$wyszukanie);
}

$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);
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

    if($kategoria=='liczba_znalezionych_wzorow')
    {
      echo <<<END
      $query->num_rows
      END;
    }       
    elseif ($query->num_rows > 0) 
    {
      while($row=$query->fetch_assoc())
      {
        $nazwa_pliku = $row["img_filename"];
        $img_URL_not_encoded=sprintf('uploaded_images/%s',$nazwa_pliku);
        $img_URL = str_replace(' ',"%20",$img_URL_not_encoded);
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

            $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $like = $query3->num_rows; 

          $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "-1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $dislike = $query3->num_rows; 
            if(isset($_SESSION['zalogowany']))
            {
              $user = $_SESSION['user_id'];
              $zapytanie2 = sprintf('select * from favourite where images_img_id = "%s" AND users_user_id = "%s"', $img_id , $user);
              $query2=$polaczenie->query($zapytanie2);   
              $ff = $query2->num_rows;
              
              if($row['rating_number']==0 || $row['rating_number']==NULL)
              {
                $src2 = "icons/like.png";
                $src3 = "icons/unlike.png";
              }
              else if($row['rating_number']==1)
              {
                $src2 = "icons/like2.png";
                $src3 = "icons/unlike.png";
              }
              else if($row['rating_number']==-1)
              {
                $src2 = "icons/like.png";
                $src3 = "icons/unlike2.png";
              }
              if ($ff)        
              {
                $src = "icons/followed.png";
              }
              else 
              {
                $src = "icons/unfollowed.png";
              }
              $img_id2 = $img_id +1000;
              $img_id3 = $img_id +3000;
            echo <<<END
            <a href="#" onclick="return false;"><img class="follow-icon"  id=$img_id onclick="changeFollow(this)" src=$src></a> 
            <a href="#" onclick="return false;"><img class="like-icon" id=$img_id2 like=$like  number=$inc onclick="changeLike(this)" src=$src2></a>
            <a href="#" onclick="return false;"><img class="unlike-icon" id=$img_id3 dislike=$dislike number=$inc onclick="changeLike(this)" src=$src3></a>
            <div id="bar">
            <div class="likesBar"></div>
            <div class="dislikesBar"></div>
            </div>
            
            </li>           
           
            END;
            echo "<script>
            calculateBar($inc,$like,$dislike);         
            </script>";
            $inc++;
            } else 
            echo "</li>";
          }
        }
        elseif($kategoria=="wyszukiwanie")
        {
          echo <<<END
          <li>
          <img src=$img_URL alt=""><h3>$img_title </h3> 
          END;

          $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $like = $query3->num_rows; 

          $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "-1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $dislike = $query3->num_rows; 

          if(isset($_SESSION['zalogowany'])){
            $user = $_SESSION['user_id'];
            $zapytanie2 = sprintf('select * from favourite where images_img_id = "%s" AND users_user_id = "%s"', $img_id , $user);
            $query2=$polaczenie->query($zapytanie2);   
            $ff = $query2->num_rows;      
            if($row['rating_number']==0 || $row['rating_number']==NULL)
            {
              $src2 = "icons/like.png";
              $src3 = "icons/unlike.png";
            }
            else if($row['rating_number']==1)
            {
              $src2 = "icons/like2.png";
              $src3 = "icons/unlike.png";
            }
            else if($row['rating_number']==-1)
            {
              $src2 = "icons/like.png";
              $src3 = "icons/unlike2.png";
            } 
            if ( $ff)        
            $src = "icons/followed.png";
          else 
            $src = "icons/unfollowed.png";
            $img_id2 = $img_id +1000;
            $img_id3 = $img_id +3000;   
          echo <<<END
          <a href="#" onclick="return false;"><img class="follow-icon"  id=$img_id onclick="changeFollow(this)" src=$src></a> 
          <a href="#" onclick="return false;"><img class="like-icon" id=$img_id2 like=$like  number=$inc onclick="changeLike(this)" src=$src2></a>
          <a href="#" onclick="return false;"><img class="unlike-icon" id=$img_id3 dislike=$dislike number=$inc onclick="changeLike(this)" src=$src3></a>
          <div id="bar">
          <div class="likesBar"></div>
          <div class="dislikesBar"></div>
          </div>
          
          </li>  
          END;
          echo "<script>
          calculateBar($inc,$like,$dislike);         
          </script>";
          $inc++;
          } else 
         echo "</li>";
        }

        else
        {
          
          echo <<<END
          <li>
          <img src=$img_URL   alt=""><h3>$img_title </h3>     
                         
          END;
         
          $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $like = $query3->num_rows; 

          $zapytanie3 = sprintf('SELECT rating_id from rating where images_img_id = "%s" AND rating_number = "-1" ', $img_id );
          $query3=$polaczenie->query($zapytanie3);
          $dislike = $query3->num_rows; 


          if(isset($_SESSION['zalogowany'])){
            $user = $_SESSION['user_id'];
            $zapytanie2 = sprintf('select * from favourite where images_img_id = "%s" AND users_user_id = "%s"', $img_id , $user);
            $query2=$polaczenie->query($zapytanie2);   
            $ff = $query2->num_rows;   
            if($row['rating_number']==0 || $row['rating_number']==NULL)
              {
                $src2 = "icons/like.png";
                $src3 = "icons/unlike.png";
              }
              else if($row['rating_number']==1)
              {
                $src2 = "icons/like2.png";
                $src3 = "icons/unlike.png";
              }
              else if($row['rating_number']==-1)
              {
                $src2 = "icons/like.png";
                $src3 = "icons/unlike2.png";
              }       
            if ($ff)        {
              $src = "icons/followed.png";
          }
            else {
              $src = "icons/unfollowed.png";
            }

            $img_id2 = $img_id +1000;
            $img_id3 = $img_id +3000;   
          echo <<<END
          
          <a href="#" onclick="return false;"><img class="follow-icon"  id=$img_id onclick="changeFollow(this)" src=$src></a> 
          <a href="#" onclick="return false;"><img class="like-icon" id=$img_id2 like=$like  number=$inc onclick="changeLike(this)" src=$src2></a>
          <a href="#" onclick="return false;"><img class="unlike-icon" id=$img_id3 dislike=$dislike number=$inc onclick="changeLike(this)" src=$src3></a>
          <div id="bar">
          <div class="likesBar"></div>
          <div class="dislikesBar"></div>
          </div>
          
          </li>           
         
          END;
          echo "<script>
          calculateBar($inc,$like,$dislike);         
          </script>";
          $inc++;
          } else 
         echo "</li>";
        }       
      }
    }
  }
}