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
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php

  $userId = $_SESSION['userId'] ?? "";

  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];

      $sqlImg = "SELECT * FROM profileimg WHERE user_id = '$id';";
      $resultImg = mysqli_query($conn, $sqlImg);

      while ($rowImg = mysqli_fetch_assoc($resultImg)) {
        if (!$rowImg['status']) {
          $srcImg = 'uploads/profile' . $id . '.jpg';
        } else {
          $srcImg = 'uploads/profiledefault.jpg';
        }
  ?>
        <div class="user-container">
          <img src="<?= $srcImg ?>" id="<?= mt_rand() ?>" alt="Profile Image" />

          <p class="p-title"><span><?= $row['id'] ?><br></span><?= $row['username'] ?></p>
        </div>
  <?php
      }
    }
  } else {
    echo "There are no users yet!";
  }
  ?>

  <?php
  if (isset($_SESSION['userId'])) {
  ?>

    <p class="p-title">You are logged in as user #<?= $_SESSION['userId'] ?? "" ?></p>
    <p class="success"><?= $_SESSION['errors']['login'] ?? "" ?></p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <button type="submit" name="submit">UPLOAD</button>
    </form>

    <?php
    if (isset($_GET['upload'])) {
      if ($_GET['upload'] == 'success') {
        echo '<p>You file uploaded!</p>';
      }
    }
    ?>

    <p class="p-title">Logout as user #<?= $_SESSION['userId'] ?? "" ?></p>
    <form action="logout.php" method="post">
      <button type="submit" name="submitLogout">Logout</button>
    </form>

  <?php
  } else {
    echo "<p>You are not logged in!</p>";

  ?>
    <p class="error"><?= $_SESSION['errors']['login'] ?? "" ?></p>
    <form action="signup.php" method="post">
      <input type="text" name="first" placeholder="First name">
      <input type="text" name="last" placeholder="Last name">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">

      <button type="submit" name="submitSingup">Signup</button>
    </form>

    <p class="p-title">Login as user!</p>
    <form action="login.php" method="post">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">

      <button type="submit" name="submitLogin">Login</button>
    </form>
  <?php
  }
  ?>

</body>

</html>