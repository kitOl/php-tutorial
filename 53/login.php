<?php

session_start();
include_once 'dbh.php';

if (isset($_POST['submitLogin'])) {

  $errors = [];

  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  $sql = "SELECT * FROM users WHERE username = '$uid' AND password = '$pwd';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $userId = $row['id'];
    }
  } else {
    $errors['login'] = "User $uid not found or password dont match!";
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
  }

  $errors['login'] = "User $uid log in successful!";
  $_SESSION['errors'] = $errors;
  $_SESSION['userId'] = $userId;
  header("Location: index.php");
  exit();
}
