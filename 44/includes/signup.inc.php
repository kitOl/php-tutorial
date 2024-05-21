<?php

if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=$username&email=$email");
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=$username");
    exit();
  } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&email=$email");
    exit();
  } else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordsnotmatch&uid=$username&email=$email");
    exit();
  } else {

    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_store_result($stmt);

      if (mysqli_stmt_num_rows($stmt)) {
        header("Location: ../signup.php?error=useroremailtaken&&uid=$username&email=$email");
        exit();
      } else {

        $sql = "INSERT INTO users (uid, email, pwd) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {

          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);

          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../signup.php");
  exit();
}
