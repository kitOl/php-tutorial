<?php
include_once 'header.php';
?>

<?php
if (isset($_GET) && isset($_GET['username'])) {

  $_SESSION['username'] = $_GET['username'];
}
?>
<h1>HOME</h1>

<form action="" method="get">
  <input type="text" name="username" placeholder="Username...">
  <button type="submit" name="submit">SUBMIT</button>
</form>

<p>Username in Session is <span style="text-decoration: underline; color: blue;"><?= $_SESSION['username'] ?? '' ?></span></p>



</body>

</html>