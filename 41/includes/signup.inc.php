<?php

if (isset($_POST['submit'])) {
  include_once 'dbh.inc.php';

  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $uid = $_POST['uid'];
  $pwd = $_POST['pwd'];

  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
    header("Location: ../index.php?signup=empty");
    exit();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../index.php?signup=invalidemail");
      exit();
    } else {
      echo "Sign up the user!";
    }
  }
} else {
  header("Location: ../index.php?signup=error");
  exit();
}
