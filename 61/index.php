<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Key Generate</title>
</head>

<body>
  <?php

  function keyGenerate()
  {
    $keyLength = 8;
    $str = '1234567890abcdefghijklmnopqrstuvwxyz()/$';
    $randStr = substr(str_shuffle($str), 0, $keyLength);
    if (keyExists($randStr)) {
      keyGenerate();
    }
    return $randStr;
  }

  function keyGenerateUniq()
  {
    return uniqid();
  }


  echo uniqid(), '<br>';
  echo uniqid('daniel'), '<br>';
  echo uniqid('daniel', true), '<br>';

  $conn = mysqli_connect('localhost', 'root', '', 'phpkeygen');

  function keyExists($randStr)
  {
    global $conn;
    $sql = "SELECT * FROM keystring WHERE str_key = '$randStr';";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
  }

  function keySave($keyNew)
  {
    global $conn;
    $sql = "INSERT INTO keystring (str_key) VALUES ('$keyNew');";
    return mysqli_query($conn, $sql);
  }

  $error = false;
  for ($i = 0; $i < 10; $i++) {
    $keyNew = keyGenerate();
    if (!keySave($keyNew)) {
      $error = true;
      break;
    }
  }
  if (!$error) {
    echo "You have successfully generated 10 new keys";
  } else {
    echo "Error in generate new key";
  }
  ?>
</body>

</html>