<?php
include 'header.php';
?>

<h1>Profile page</h1>
<?php
$profileId = $_GET['id'];
$profileName = $_GET['name'];

echo "Profile ID is: " . $profileId;
echo "<br>";
echo "Profile name is: " . $profileName;
?>
</body>

</html>