<?php

$server = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'phptuts';

$conn = mysqli_connect($server, $dbusername, $dbpassword, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
