<?php
echo '<pre>';
$fileNames = $_POST['filenamelist'];
$removeSpaces = str_replace(' ', '', $fileNames);
$allFileNames = explode(',', $removeSpaces);
foreach ($allFileNames as $fileName) {
  $filePath = 'uploads/' . $fileName;
  if (!file_exists($filePath)) {
    header("Location: index.php?deletefile=filenotfound&filename=$fileName");
    exit();
  }
}

foreach ($allFileNames as $fileName) {
  $filePath = 'uploads/' . $fileName;
  if (!unlink($filePath)) {
    echo "You have an error!";
    header("Location: index.php?deletefile=errorunlink");
    exit();
  }
}
// die(var_dump($allFileNames));

header("Location: index.php?deletefile=success");
exit();
