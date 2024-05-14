<?php
include_once 'dbh.inc.php';

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "INSERT INTO users (first, last, email, uid, pwd)
  VALUES ('$first', '$last', '$email', '$uid', '$pwd');";
$result = mysqli_query($conn, $sql);

header("Location: ../index.php?signup=success");
