<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Regular Expressions</title>
</head>

<body>
  <pre>
  <?php
  $string = "My name is Oleg, Oleg is my name";

  $result1 = preg_match("/Oleg/", $string, $array);

  if ($result1) {
    echo "It is a match!<br>";
    var_dump($array);
  }

  $result2 = preg_match_all("/O(le)g/", $string, $array2);
  var_dump($result2, $array2);

  $result3 = preg_replace("/Oleg/", "Igor", $string);
  var_dump($result3);

  ?>
  </pre>
</body>

</html>