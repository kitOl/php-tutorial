<?php

$path = 'uploads/profile1*';
$fileInfo = glob($path);
$fileActualName = $fileInfo[0];

if (!unlink($fileActualName)) {
  echo "You have an error!";
  header("Location: index.php?deletefile=error");
  exit();
} else {
  echo "You have an error!";
  header("Location: index.php?deletefile=success");
  exit();
}
