<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hashing and De-hashing</title>
</head>

<body>

  <?php
  $pwd = 'test123';
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  echo "Password is $pwd";
  echo '<br>';
  echo "Hashing password: $hashedPwd";
  echo '<br>';

  $checkPwd = password_verify($pwd, $hashedPwd);
  echo "Check password and hash is: $checkPwd";
  echo '<br>';

  ?>
</body>

</html>