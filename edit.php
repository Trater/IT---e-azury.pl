<?php
session_start();

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user,$db_password,$db_name);

$img_id = $_POST['wzor'];

$zapytanie = sprintf('select * from images where img_id="%s"',$img_id);

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
  if(!empty($_FILES["file"]["name"]) || isset($_POST['category']) || isset($_POST['subcategory']) || isset($_POST['title']))
  {
    $targetDir = "uploaded_images/";
    if($query=$polaczenie->query($zapytanie))
    {
      if ($query->num_rows > 0) 
      {
        $row=$query->fetch_assoc();

        if(!empty($_FILES["file"]["name"]))
        {
          $fileName=$_FILES["file"]["name"];
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
          $isImage=1;
        }
        else
          $isImage=0;
         

        if(!isset($_POST['category']))
          $img_category=$row["img_category"];
        else
          $img_category=$_POST['category'];

        if(!isset($_POST['subcategory']))
          $img_subcategory=$row["img_subcategory"];
        elseif($_POST['subcategory']=="brak")
          $img_subcategory=null;
        else
          $img_subcategory=$_POST['subcategory'];

        if(!isset($_POST['title']))
          $img_title=$row["img_title"];
        else
          $img_title=$_POST['title'];

          if(isset($_POST["submit"]) && $isImage)
          {
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes))
            {
              if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
              {
                  // Insert image file name into database
                  //insert into images(img_filename, img_category, img_subcategory, img_title) values(?, ?, ?, ?)
                  if($stmt = $polaczenie->prepare("update images set img_filename = ?, img_category = ?, img_subcategory = ?, img_title = ? where img_id = ?"))
                  {
                    $stmt->bind_param("sssss", $fileName, $img_category, $img_subcategory, $img_title, $img_id);
                    $stmt->execute();
                    $stmt->close();
                    echo "<script>
                    alert('Zaktualizowano poprawnie.');
                    window.location.href='editform.php';
                    </script>";
                    exit();
                  }
                  else 
                  {
                    echo "<script>
                    alert('Nie zaktulizowano');
                    window.location.href='editform.php';
                    </script>";
                    exit();
                  }
              }
              else
              {
                  echo "<script>
                  alert('Wystąpił problem z przeniesieniem twojego pliku na serwer');
                  window.location.href='editform.php';
                  </script>";
              }
                
            }
            else
            {
              echo "<script>
              alert('Mogą być tylko rozszerzenie .png, .jpg, .jpeg');
              window.location.href='editform.php';
              </script>";
            }
          }
          elseif(isset($_POST["submit"]) && !$isImage)
          {
            if($stmt = $polaczenie->prepare("update images set img_category = ?, img_subcategory = ?, img_title = ? where img_id = ?"))
            {
              $stmt->bind_param("ssss", $img_category, $img_subcategory, $img_title, $img_id);
              $stmt->execute();
              $stmt->close();
              echo "<script>
              alert('Zaktualizowano poprawnie.');
              window.location.href='editform.php';
              </script>";
              exit();
            }
            else 
            {
              echo "<script>
              alert('Nie zaktulizowano');
              window.location.href='editform.php';
              </script>";
              exit();
            }
          }
      }
      else
      {
        echo "<script>
        alert('Błąd, brak takiego wzoru.');
        window.location.href='editform.php';
        </script>";
        exit();
      }
    }
    else
    {
      echo "<script>
      alert('Błąd');
      window.location.href='editform.php';
      </script>";
      exit();
    }
  }
  else
  {
    echo "<script>
    alert('Nic nie zmieniono!');
    window.location.href='editform.php';
    </script>";
    exit();
  }
  
}