<?php

if (!isset($_POST['login-user'])) {
  header("Location: ../?ahBIqYbZ5A");
  exit();
} elseif (empty($_POST['username']) || empty($_POST['password'])) {
  header("Location: ../?ahBIqYbZ5A");
  exit();
} else {
  $userName = $_POST['username'];
  $password = $_POST['password'];
  $filename = "../users/" . $userName . ".php";
  if (!file_exists($filename)) {
    header("Location: ../?ahBIqYbZ5A");
    exit();
  } else {
    $user = include '../users/'.$userName.'.php';
    if (!$userName === $user['username']) {
      header("Location: ../?ahBIqYbZ5A");
      exit();
    } else {
      echo "Username Match";
    }
    if (password_verify($password, $user['psword'])) {
      echo "<br>Password match!";
      session_start();
      $_SESSION['username'] = $userName;
      echo "<br>";
      echo $_SESSION['username'];
      header("Location: ../");
      exit();
    } else {
      echo "<br>Password No match!";
      header("Location: ../?ahBIqYbZ5A");
      exit();
    } 
  }
}