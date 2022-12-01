<?php

require_once "connect.php";
$zapytanie = sprintf('select * from images order by img_category');

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
        $img_title = $row["img_title"];
        $img_id = $row["img_id"];
        echo <<<END
          <option value=$img_id>$img_title</option>
        END;
      }
    }
  }
}





?>