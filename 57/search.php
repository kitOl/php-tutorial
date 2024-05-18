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

    echo "<p class='result'>There are " . $queryResult . " results!</p>";

    if ($queryResult) {
      while ($row = mysqli_fetch_assoc($result)) {
        $truncated = mb_strimwidth($row['text'], 0, 300, "...");
  ?>
        <a href="article.php?id=<?= $row['id'] ?>">
          <div class="article-box">
            <h3><?= $row['title'] ?></h3>
            <p><?= $truncated ?></p>
            <p><?= $row['date'] ?></p>
            <p><?= $row['author'] ?></p>
          </div>
        </a>
  <?php

      }
    } else {
      echo "There are no results matching your search!";
    }
  }
  ?>

</div>