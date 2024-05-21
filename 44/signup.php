<?php
include 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Signup</h1>
      <form class="form-signup" action="includes/signup.inc.php" method="post" autocomplete="off">
        <input type="text" name="uid" placeholder="Username" value="<?= $_GET['uid'] ?? '' ?>" />
        <input type="text" name="email" placeholder="E-mail" value="<?= $_GET['email'] ?? '' ?>" />
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