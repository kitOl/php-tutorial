<?php
include 'header.php';
?>

<form action="search.php" method="post">
  <input type="text" name="search" placeholder="Search">
  <button type="submit" name="submit-search">Search</button>
</form>

<h1>Front page</h1>
<h2>All articles</h2>

<div class="article-container">
  <?php
  $sql = "SELECT * FROM articles;";
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