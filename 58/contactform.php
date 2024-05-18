<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['message'];

  $mailTo = "sales@shopofcoins.ru";
  $headers = "From: " . $mailFrom;
  $txt = "You have received an e-mail from " . $name . ".\n\n" . $message;

  $sendmailstatus = mail($mailTo, $subject, $txt, $headers);

  header("Location: index.php?mailsend=success&status=$sendmailstatus");
  exit();
}
