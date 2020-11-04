<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../?Uw70j7PrTy");
  exit();
} elseif (!isset($_POST['link-delete'])) {
  header("Location: ../?ooOpfgUfzX");
  exit();
} elseif (empty($_POST['filename'])) {
  header("Location: ../?ur1TGa7gho");
  exit();
} else {
  $id = $_POST['filename'];
  require '../settings.php';
  if ($backup === "yes") {
    $data = include '../l/'.$id.'/data.php';
    $filename = "../backup/$id.txt";
    $newBackup = fopen($filename, "w") or die("Unable to create main page! f5r51u3XMo");
    $txtBackup = "
    id: ".$data['id']."
    Short Link: ".$data['shortlink']."
    Long Link: ".$data['longlink']."
    date of deletion ".date("Y-m-d/H:i:sa")."
    ";
    fwrite($newBackup, $txtBackup);
    fclose($newBackup);
  }
  unlink("../l/$id/index.php");
  unlink("../l/$id/data.php");
  rmdir("../l/$id");
  header("Location: ../");
  exit();
}