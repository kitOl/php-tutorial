<?php
session_start();
include_once 'dbh.php';

$sessionId = $_SESSION['userId'];
$filename = "uploads/profile" . $sessionId . "*";
$fileinfo = glob($filename);
$fileExt = explode('.', $fileinfo[0]);
$fileActualExt = $fileExt[1];

$file = 'uploads/profile' . $sessionId . "." . $fileActualExt;

if (!unlink($file)) {
  echo "File was not deleted!";
} else {
  echo "File was deleted!";
}

$sql = "UPDATE profileimg SET status = 1 WHERE user_id = '$sessionId';";
mysqli_query($conn, $sql);

header("Location: index.php?deletesuccess");
exit();
