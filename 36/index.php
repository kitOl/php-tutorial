<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial::DB connect</title>
</head>

<body>

  <?php
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row['uid'], '<br>';
    }
  }
  ?>

</body>

</html>