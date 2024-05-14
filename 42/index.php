<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Sign Up</h2>
  <form action="includes/signup.inc.php" method="post">
    <input type="text" name="first" placeholder="Firstname" value="<?= $_GET['first'] ?? '' ?>" />
    <br>
    <input type="text" name="last" placeholder="Lastname" value="<?= $_GET['last'] ?? '' ?>" />
    <br>
    <input type="text" name="email" placeholder="E-mail" value="<?= $_GET['email'] ?? '' ?>">
    <br>
    <input type="text" name="uid" placeholder="Username" value="<?= $_GET['uid'] ?? '' ?>" />
    <br>
    <input type="password" name="pwd" placeholder="Password">
    <br>

    <button type="submit" name="submit">Sing up</button>

  </form>
  <?php
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  ?>
  <p><?= $fullUrl ?></p>

  <?php if (isset($_GET['signup'])) {
    if ($_GET['signup'] == 'empty') {
      echo "<p class='error'>You did not fill in all fields!</p>";
      exit();
    }
    if ($_GET['signup'] == 'charonly') {
      echo "<p class='error'>You used invalid characters!</p>";
      exit();
    }
    if ($_GET['signup'] == 'invalidemail') {
      echo "<p class='error'>E-mail is invalid!</p>";
      exit();
    }
    if ($_GET['signup'] == 'usernamewrong') {
      echo "<p class='error'>Username must be contain only alphabetnumbers!</p>";
      exit();
    }
    if ($_GET['signup'] == 'success') {
      echo "<p class='success'>Signup success!</p>";
      exit();
    }
  }
  ?>

</body>

</html>