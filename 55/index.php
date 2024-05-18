<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Delete file</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <nav>
    <a href="index.php" title="HOME page">HOME</a>
  </nav>
  <section>

    <form action="deletefile.php" method="post">
      <input type="text" name="filenamelist" placeholder="Separate each name with a comma (,)" style="width: 300px;" />
      <button type="submit" name="submit">Delete file</button>
    </form>
    <?php if (isset($_GET['deletefile'])) { ?>

      <p>Delete file function return <span><?= $_GET['deletefile'] ?></span></p>

    <?php } ?>

  </section>
</body>

</html>