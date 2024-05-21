<?php
include 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <?php if (isset($_SESSION['userId'])) : ?>
        <p class="login-status">You are logged in!</p>
      <?php else : ?>
        <p class="login-status">You are logged out!</p>
      <?php endif; ?>

      <?php if (isset($_GET['error'])) {
        if ($_GET['error'] == 'sqlerror') {
          echo '<p class="error">Some kind error!</p>';
        } else if ($_GET['error'] == 'emptyfields') {
          echo '<p class="error">Fill in all fields!</p>';
        } else if ($_GET['error'] == 'usernotfound') {
          echo '<p class="error">User not found!</p>';
        } else if ($_GET['error'] == 'wrongpwd') {
          echo '<p class="error">Wrong password!</p>';
        }
      }
      ?>
    </section>
  </div>
</main>

<?php
include 'footer.php';
?>