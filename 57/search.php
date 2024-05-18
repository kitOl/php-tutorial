<?php
include 'header.php';
?>

<h1>Search page</h1>

<div class="article-container">

  <?php
  if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    $sql = "SELECT * FROM articles WHERE title LIKE '%$search%' OR text LIKE '%$search%' OR author LIKE '%$search%' OR date LIKE '%$search%';";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult) {
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
    } else {
      echo "There are no results matching your search!";
    }
  }
  ?>

</div>