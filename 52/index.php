<?php
session_start();
include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial::Upload Files</title>
</head>

<body>

  <?php
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];

      $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id';";
      $resultImg = mysqli_query($conn, $sqlImg);

      while ($rowImg = mysqli_fetch_assoc($resultImg)) {
        if (!$rowImg['status']) {
          $srcImg = 'uploads/profile' . $id . '.jpg';
        } else {
          $srcImg = 'uploads/profiledefault.jpg';
        }
  ?>
        <div>
          <img src="<?= $srcImg ?>" alt="Profile Image">
          $row['username'];
        </div>
  <?php
      }
    }
  } else {
    echo "There are no users yet!";
  }
  ?>

  <?php
  if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] == 1) {
      echo "You are logged in as user #1";
    } ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <button type="submit" name="submit">UPLOAD</button>
    </form>
  <?php
  } else {
    echo "You are not logged in!"; ?>
    <form action="login.php" method="post">
      <input type="text" name="first" placeholder="First name">
      <input type="text" name="last" placeholder="Last name">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">

      <button type="submit" name="submitSingup">Signup</button>
    </form>
  <?php
  }
  ?>

  <?php
  if (isset($_GET['upload'])) {
    if ($_GET['upload'] == 'success') {
      echo '<p>You file uploaded!</p>';
    }
  }
  ?>

  <p>Login as user!</p>
  <form action="login.php" method="post">
    <button type="submit" name="submitLogin">Login</button>
  </form>

  <p>Logout as user!</p>
  <form action="logout.php" method="post">
    <button type="submit" name="submitLogout">Logout</button>
  </form>

</body>

</html>