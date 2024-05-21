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
    </section>
  </div>
</main>

<?php
include 'footer.php';
?>