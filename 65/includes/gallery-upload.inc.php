<?php
if (isset($_POST['submit'])) {
  $newFileName = $_POST['filename'];
  if (empty($newFileName)) {
    $newFileName = 'gallery';
  } else {
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
  }
  $imageTitle = $_POST['filetitle'];
  $imageDesc = $_POST['filedesc'];

  $file = $_FILES['file'];

  $fileName = $file['name'];
  $fileType = $file['type'];
  $fileTempName = $file['tmp_name'];
  $fileError = $file['error'];
  $fileSize = $file['size'];

  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowedExt = ['jpg', 'jpeg', 'png'];
  $limitSize = 2000000;

  if (in_array($fileActualExt, $allowedExt)) {
    if (!$fileError) {
      if ($fileSize < $limitSize) {
        $imageFullName = $newFileName . "." . uniqid('', true) . '.' . $fileActualExt;
        $fileDestination = '../img/gallery/' . $imageFullName;

        include_once 'dbh.inc.php';

        if (empty($imageTitle) || empty($imageDesc)) {
          header("Location: ../gallery.php?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM gallery;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $setImageOrder = $rowCount + 1;

            $sql = "INSERT INTO gallery (title, descimg, imgFullName, orderimg) VALUES (?, ?, ?, ?);";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_bind_param($stmt, 'ssss', $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
              mysqli_stmt_execute($stmt);

              move_uploaded_file($fileTempName, $fileDestination);

              header("Location: ../gallery.php?upload=success");
              exit();
            }
          }
        }
      } else {
        echo "File size is too big!";
        exit();
      }
    } else {
      echo "You had an error!";
      exit();
    }
  } else {
    echo "You need to upload a proper file type!";
    exit();
  }
}
