<?php

if (isset($_POST['login-submit'])) {

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=$mailuid");
    exit();
  } else {
    require 'dbh.inc.php';

    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['pwd']);
        if ($pwdCheck) {

          session_start();
          $_SESSION['userUid'] = $row['uid'];
          $_SESSION['userId'] = $row['id'];

          header("Location: ../index.php?login=success&pwd=$password");
          exit();
        } else {

          header("Location: ../index.php?error=wrongpwd&mailuid=$mailuid");
          exit();
        }
      } else {
        header("Location: ../index.php?error=usernotfound&mailuid=$mailuid");
        exit();
      }
    }
  }
} else {
  header("Location: ../index.php");
  exit();
}
