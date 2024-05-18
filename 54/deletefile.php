<?php
$path = 'uploads/profile1.jpeg';

if (!unlink($path)) {
  echo "You have an error!";
  header("Location: index.php?deletefile=error");
  exit();
} else {
  echo "You have an error!";
  header("Location: index.php?deletefile=success");
  exit();
}
