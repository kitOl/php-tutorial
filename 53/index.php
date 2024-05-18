<?php
// echo "<pre>";
// die(var_dump($rowImg));

session_start();
include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial :: Delete profile image </title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];

      $sqlImg = "SELECT * FROM profileimg WHERE user_id = '$id';";
      $resultImg = mysqli_query($conn, $sqlImg);
      if (mysqli_num_rows($resultImg)) {
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
          if ($rowImg['status'] == 0) {
            $srcImg = "uploads/profile" . $id . ".jpg?";
          } else {
            $srcImg = "uploads/profiledefault.jpg";
          }
  ?>
          <div class='user-container'>
            <img src="<?= $srcImg ?>" id="<? mt_rand() ?>" alt="Profile Image">
            <p><?= $row['username'] ?></p>
          </div>

    <?php
        }
      }
    }
  } else {
    echo "<p>There are no users yet!</p>";
  }

  if (isset($_SESSION['userId'])) {

    ?>
    <p>You are logged in as user #<?= $_SESSION['userId'] ?></p>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <button type="submit" name="submit">UPLOAD</button>
    </form>

    <p>Logout!</p>
    <form action="logout.php" method="post">
      <button type="submit" name="submitLogout">Logout</button>
    </form>

  <?php } else { ?>

    <p>You are not logged in!</p>
    <form action="signup.php" method="post">
      <input type="text" name="first" placeholder="First name">
      <input type="text" name="last" placeholder="Last name">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">

      <button type="submit" name="submitSignup">Signup</button>
    </form>

    <p>Login as user!</p>
    <form action="login.php" method="post">
      <input type="text" name="uid" placeholder="Username">
      <input type="password" name="pwd" placeholder="Password">

      <button type="submit" name="submitLogin">Login</button>
    </form>

  <?php } ?>

</body>

</html>