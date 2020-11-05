<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <form action="../scripts/login.php" method="POST">
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <button type="submit" name="login-user">Login</button>
  </form>
  <?php
  require '../settings.php';
  if ($newusers === "yes") {
    ?>
    <a href="../newuser">Signup</a>
    <?php
  }
  ?>
</body>
</html>