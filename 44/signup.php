<?php
include 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Signup</h1>

      <?php if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyfields') {
          echo '<p class="error">One ore more fields is empty!</p>';
        } else if ($_GET['error'] == 'invalidmail') {
          echo '<p class="error">Invalid E-mail!</p>';
        } else if ($_GET['error'] == 'invalidmail') {
          echo '<p class="error">Invalid E-mail!</p>';
        } else if ($_GET['error'] == 'invaliduid') {
          echo '<p class="error">Invalid Username!</p>';
        } else if ($_GET['error'] == 'passwordsnotmatch') {
          echo '<p class="error">Passwords do not match!</p>';
        } else if ($_GET['error'] == 'useroremailtaken') {
          echo '<p class="error">Username or E-mail is taken!</p>';
        } else if ($_GET['error'] == 'sqlerror') {
          echo '<p class="error">SQL error!</p>';
        } else if ($_GET['error'] == 'sqlerror') {
          echo '<p class="error">SQL error!</p>';
        } else if ($_GET['error'] == 'no') {
          echo '<p class="success">Signup success!</p>';
        } else {
          echo '<p class="error">Some kind of error!</p>';
        }
      }
      ?>

      <form class="form-signup" action="includes/signup.inc.php" method="post" autocomplete="off">
        <input type="text" name="uid" value="<?= $_GET['uid'] ?? '' ?>" placeholder="Username" />
        <input type="text" name="email" value="<?= $_GET['email'] ?? '' ?>" placeholder="E-mail" />
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit">Signup</button>
      </form>
    </section>
  </div>
</main>

<?php
include 'footer.php';
?>