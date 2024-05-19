<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Search Patterns </title>
</head>

<body>
  <pre>
  <?php
  $string = "My name is Oleg, Oleg is my name";

  preg_match_all("/O*/", $string, $array);
  var_dump($array);

  ?>
  </pre>
</body>

</html>