<?php

include_once 'dbh.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO users (first, last, username, password)
VALUES ('$first', '$last', '$uid', '$pwd');";
mysqli_query($conn, $sql);

$sql = "SELECT * FROM users WHERE username = '$uid' AND first = '$first';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)) {
  while ($row = mysqli_fetch_assoc($result)) {
    $userId = $row['id'];

    $sql = "INSERT INTO profileimg (user_id, status)
    VALUES ('$userId', 1);";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
  }
} else {
  echo "You have an error!";
}
