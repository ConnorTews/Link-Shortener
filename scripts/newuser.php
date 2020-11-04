<?php

require '../settings.php';
if (!$newusers == "yes") {
  header("Location: ./?error1");
  echo "error1";
  exit();
} elseif (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password-rep'])) {
  header("Location: ./?error2");
  echo "error2";
  exit();
} else {
  require './random.php';
  $usrname = $_POST['username'];
  $psword = $_POST['password'];
  $pswordrep = $_POST['password-rep'];
  if ($psword !== $pswordrep) {
    header("Location: ./?error3");
    echo "error3";
    exit();
  }
  $hashedPassword = password_hash($psword, PASSWORD_DEFAULT);
  $randomID = randomID();
  $filename = "../users/".$usrname.".php";
  if (file_exists($filename)) {
    header("Location: ../?error4");
    exit();
  }
  $filename = "../users/$usrname.php";
  $newUser = fopen($filename, "w") or die("Unable to create main page! error4");
  $txtUser = "
  <?php 
  return [
    'username' => '".$usrname."',
    'psword' => '".$hashedPassword."'
  ];
  ?>
  ";
  fwrite($newUser, $txtUser);
  fclose($newUser);
}
