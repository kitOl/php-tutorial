<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial::MySQL</title>
</head>

<body>

  <?php
  $uid = 'Admin';

  $sql = "SELECT * FROM users WHERE uid = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
  } else {
    mysqli_stmt_bind_param($stmt, 's', $uid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
  }

  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['first'] . ' ' . $row['last'] . "<br>";
  }

  ?>

</body>

</html>