<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../?dfZDJ72EZl");
  echo "dfZDJ72EZl";
  exit();
} elseif (!isset($_POST['link-submit'])) {
  header("Location: ../?FwqaJRgK84");
  echo "FwqaJRgK84";
  exit();
} elseif (empty($_POST['longlink'])) {
  header("Location: ../?UmwIGYwLq2");
  echo "UmwIGYwLq2";
  exit();
} else {
  require './random.php';
  require '../settings.php';
  $ogLink = $_POST['longlink'];
  echo $ogLink;
  echo "<br>";
  $randomID = randomID();
  echo $randomID;
  echo "<br>";
  echo $domainName . "l/" . $randomID . "/";
  $filename = "../l/$randomID/";
  if (!file_exists($filename)) {
    mkdir("../l/$randomID/", 0777, true);
  } else {
    header("Location: ../?YPNLYUqjcw");
    exit();
  }
  $filename = "../l/" . $randomID . "/index.php";
  $newLink = fopen($filename, "w") or die("Unable to create main page! bLtmHQFE1b");
  $txtLink = '
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta http-equiv="refresh" content="0; url=' . $ogLink . '">
  </head>
  </html>
  ';
  fwrite($newLink, $txtLink);
  fclose($newLink);
  $shortlink = $domainName . "l/" . $randomID . "/";
  $filename = "../l/" . $randomID . "/data.php";
  $newLink = fopen($filename, "w") or die("Unable to create main page! f5r51u3XMo");
  $txtLink = "
  <?php 
  return [
    'longlink' =>  '" . $ogLink . "',
    'shortlink' => '" . $shortlink . "',
    'id' =>        '" . $randomID . "'
  ];
  ?>
  ";
  fwrite($newLink, $txtLink);
  fclose($newLink);
  header("Location: ../");
  exit();
}
