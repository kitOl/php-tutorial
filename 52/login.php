<?php

session_start();
include_once 'dbh.php';

if (isset($_POST['submitLogin'])) {

  $uid = $_POST['uid'];

  $sql = "SELECT * FROM users WHERE username = '$uid';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $userId = $row['id'];
    }
  } else {
    echo "User $uid not found";
  }

  $_SESSION['userId'] = $userId;
  header("Location: index.php");
  exit();
}
