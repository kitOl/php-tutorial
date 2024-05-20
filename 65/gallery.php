<?php
session_start();
$_SESSION['username'] = 'admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Portfolio</title>
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <a href="index.php" class="header-brand">oltuts</a>
    <nav>
      <ul>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="about.php">About me</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <a href="cases.php" class="header-cases">Cases</a>
    </nav>
  </header>
  <main>
    <section class="gallery-links">
      <div class="wrapper">
        <h2>Gallery</h2>

        <div class="gallery-container">
          <?php
          include_once 'includes/dbh.inc.php';

          $sql = "SELECT * FROM gallery ORDER BY orderimg DESC;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <a href="#">
                <div style="background-image: url(img/gallery/<?= $row['imgFullName'] ?>);"></div>
                <h3><?= $row['title'] ?></h3>
                <p><?= $row['descimg'] ?></p>
              </a>
          <?php
            }
          }
          ?>

          <?php if (isset($_SESSION['username'])) {
          } ?>
        </div>
        <div class="gallery-upload">
          <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
            <input type="text" name="filename" placeholder="File name...">
            <input type="text" name="filetitle" placeholder="Image title...">
            <input type="text" name="filedesc" placeholder="Image description...">
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
          </form>
        </div>

      </div>
    </section>
  </main>

  <footer>
    <div class="wrapper">
      <ul class="footer-links-main">
        <li><a href="#">Home</a></li>
        <li><a href="#">Cases</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">About me</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="footer-links-cases">
        <li>
          <p>Latest cases</p>
        </li>
        <li><a href="#">MALING SHAOLIN - WEB DEVELOPMENT</a></li>
        <li><a href="#">EXCELLENTO - WEB DEVELOPMENT</a></li>
        <li><a href="#">OLEGTUTS - YOUTUBE CHANNEL</a></li>
        <li><a href="#">WELTEC - VIDEO PRODUCTDION</a></li>
      </ul>

    </div>
  </footer>
</body>

</html>