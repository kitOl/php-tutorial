<?php
include 'header.php';
?>

<h1>Article page</h1>
<?php
$articleId = $_GET['id'];
$articleName = $_GET['name'];

echo "Article ID is: " . $articleId;
echo "<br>";
echo "Article name is: " . $articleName;
?>
</body>

</html>