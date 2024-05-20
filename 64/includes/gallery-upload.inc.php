<?php

if (isset($_POST['submit'])) {

  $newFileName = $_POST['filename'];
  if ($_POST['filename']) {
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
        //
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
