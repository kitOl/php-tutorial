<?php

session_start();
include_once 'dbh.php';

$id = $_SESSION['userId'];

if (isset($_POST['submit'])) {
  $allowedExt = ['jpg', 'jpeg', 'png', 'pdf'];
  $sizeLimit = 1000000;

  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  if (in_array($fileActualExt, $allowedExt)) {
    if (!$fileError) {
      if ($fileSize < $sizeLimit) {
        $fileNameNew = 'profile' . $id . '.' . $fileActualExt;
        $fileDestination = 'uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        $sql = "UPDATE profileimg SET status = 0 WHERE user_id = '$id';";
        mysqli_query($conn, $sql);

        header("Location: index.php?upload=success");
        exit();
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
}
