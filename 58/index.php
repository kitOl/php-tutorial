<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial:: Contact form</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <nav>
    <a href="index.php" title="Home Page">HOME</a>
  </nav>
  <main>
    <h1>Send E-mail</h1>
    <form class="contact-form" action="contactform.php" method="post">
      <input type="text" name="name" placeholder="Full name">
      <input type="text" name="mail" placeholder="Your E-mail">
      <input type="text" name="subject" placeholder="Subject">
      <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
      <button type="submit" name="submit">SEND MAIL</button>
    </form>
  </main>

</body>

</html>