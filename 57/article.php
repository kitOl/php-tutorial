<?php
include 'header.php';
?>

<h1>Article page</h1>

<div class="article-container">
  <?php
  $sql = "SELECT * FROM articles WHERE id = '" . $_GET['id'] . "';";
  $result = mysqli_query($conn, $sql);

  $queryResults = mysqli_num_rows($result);

  if ($queryResults) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>

      <div class="article-box">
        <h3><?= $row['title'] ?></h3>
        <p><?= $row['text'] ?></p>
        <p><?= $row['date'] ?></p>
        <p><?= $row['author'] ?></p>
      </div>

  <?php
    }
  }
  ?>
</div>

</body>

</html>