<?php
include_once 'includes/dbh.inc.php';

$sql = "INSERT INTO users (first, last, email, uid, pwd)
  VALUES ('Oleg', 'Kitaev', 'oleg@mail.ru', 'coder', 'test123');";
$result = mysqli_query($conn, $sql);

header("Location: ../index.php?signup=success");
