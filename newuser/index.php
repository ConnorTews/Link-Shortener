<?php
require '../settings.php';
if ($newusers == "yes") {
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New User</title>
</head>
<body>
  <form action="../scripts/newuser.php" method="POST">
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <input type="password" name="password-rep" id="password-rep">
    <button type="submit" name="new-user">Create a New User</button>
  </form>
</body>
</html>
  <?php
} else {
  header("Location: ../?errornoaccess");
  exit();
}
?>