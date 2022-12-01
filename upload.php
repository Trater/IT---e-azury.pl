<?php
session_start();

$file_category=$_POST['category'];
$file_subcategory=$_POST['subcategory'];
if($file_subcategory ==='')
    $file_subcategory=null;
$file_title = $_POST['title'];
require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);
// Include the database configuration file
if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
    echo "<script>
    alert('Error: '.$polaczenie->connect_errno);
    window.location.href='uploadform.php';
    </script>";
    exit();
}
else 
{
  // File upload path
  $targetDir = "uploaded_images/";
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]) && !empty($file_category))
  {
      // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg');
      if(in_array($fileType, $allowTypes))
      {
          // Upload file to server
          if($stmt=$polaczenie->prepare('select img_id from images where img_filename =?'))
          {
            $stmt->bind_param('s', $fileName);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0)
            {
                echo "<script>
                alert('Istnieje obraz o takiej nazwie. Wybierz inną nazwę!');
                window.location.href='uploadform.php';
                </script>";
                exit();
            }
            else
            {
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                {
                    // Insert image file name into database
                    //$insert = $db->query("INSERT into images (img_name, img_category, img_subcategory) VALUES ('".$fileName."', $file_category)");
                    if($stmt = $polaczenie->prepare("insert into images(img_filename, img_category, img_subcategory, img_title) values(?, ?, ?, ?)"))
                    {
                      $stmt->bind_param("ssss", $fileName, $file_category, $file_subcategory, $file_title);
                      $stmt->execute();
                      $stmt->close();
                      echo "<script>
                      alert('Plik ".$fileName. " został dodany poprawnie.');
                      window.location.href='uploadform.php';
                      </script>";
                      exit();
                    }
                    else 
                    {
                      echo "<script>
                      alert('Plik ".$fileName. " nie został dodany poprawnie.');
                      window.location.href='uploadform.php';
                      </script>";
                      exit();
                    }
                }
                else
                {
                    echo "<script>
                    alert('Wystąpił problem z przeniesieniem twojego pliku na serwer');
                    window.location.href='uploadform.php';
                    </script>";
                }
            }
          }
            
      }
      else
      {
        echo "<script>
        alert('Mogą być tylko rozszerzenie .png, .jpg, .jpeg');
        window.location.href='uploadform.php';
        </script>";
      }
  }
  else
  {
    echo "<script>
    alert('Wybierz plik oraz kategorie.');
    window.location.href='uploadform.php';
    </script>";
  }
}
?>