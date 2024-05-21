<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Login System</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <nav class="nav-header-main">
      <a class="header-logo" href="index.php">
        <img src="img/logo.png" alt="logo">
      </a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">About me</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="header-login">
        <?php if (!isset($_SESSION['userId'])) : ?>
          <form action="includes/login.inc.php" method="post" autocomplete="off">
            <input type="text" name="mailuid" placeholder="E-mail/Username..." value="<?= $_GET['mailuid'] ?? '' ?>" />
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php">Signup</a>
        <?php else : ?>

          <a href="profile.php"><?= $_SESSION['userUid'] ?></a>
          <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>
        <?php endif; ?>
      </div>
    </nav>

  </header>