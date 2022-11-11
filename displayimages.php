<?php
require_once "connect.php";
$kategoria = $_SESSION['kategoria'];
if($kategoria === 'b' | $kategoria === 'wi' | $kategoria === 'j' )
  $zapytanie = sprintf('select img_filename, img_title from images where img_subcategory = "%s"', $kategoria);
elseif($kategoria === 'n' | $kategoria === 'po' | $kategoria === 'pi' | $kategoria === 'r' | $kategoria === 'w' | $kategoria === 'z')
  $zapytanie = sprintf('select img_filename, img_title from images where img_category = "%s"', $kategoria);

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
        echo <<<END
        <li>
        <img src=$img_URL alt=""><h3>$img_title</h3>                                      
        </li>
        END;
      }
    }
  }
}