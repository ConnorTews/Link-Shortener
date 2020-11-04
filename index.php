<?php session_start(); ?>
<?php
require './settings.php';
if ($publicvisibility === "yes") {
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Link Shortener</title><link rel="stylesheet" href="./style/css/index.css"><link rel="stylesheet" href="<?php echo $websiteImage;?>"></head><body><nav><?php if (!isset($_SESSION['username'])) { echo '<a href="./login"><h4>Login</h4></a>'; } ?><a href="./logout"><h4>logout</h4></a><?php include './settings.php'; if ($newusers === "yes") {?><a href="./newuser/"><h4>New User</h4></a><?php } ?></nav><div class="logdin"> <?php if (empty($_SESSION['username'])) { $username = null; } else { $username = $_SESSION['username']; } if (isset($username)) { echo "<p>Logged in</p>"; } else { echo "<p>Not Logged in</p>";} ?></div><div class="link-list"></div><div class="post"><form action="./scripts/post.inc.php" method="POST"><input type="url" name="longlink" placeholder="URL..." required><button type="submit" name="link-submit">Shorten</button></form></div><table><tr><th>Short Link</th><th>Copy</th><th>Delete</th></tr><?php require './scripts/listloader.php'; ?></table></body></html>
<?php
}
if ($publicvisibility === "no") {
if (isset($_SESSION['username'])) {
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Link Shortener</title><link rel="stylesheet" href="./style/css/index.css"><link rel="stylesheet" href="<?php echo $websiteImage;?>"></head><body><nav><?php if (!isset($_SESSION['username'])) { echo '<a href="./login"><h4>Login</h4></a>'; } ?><a href="./logout"><h4>logout</h4></a><?php include './settings.php'; if ($newusers === "yes") { ?><a href="./newuser/"><h4>New User</h4> </a> <?php } ?></nav><div class="logdin"><?php if (empty($_SESSION['username'])) { $username = null; } else { $username = $_SESSION['username']; } if (isset($username)) { echo "<p>Logged in</p>"; } else { echo "<p>Not Logged in</p>"; } ?></div><div class="link-list"></div><div class="post"><form action="./scripts/post.inc.php" method="POST"><input type="url" name="longlink" placeholder="URL..." required><button type="submit" name="link-submit">Shorten</button></form></div><table><tr><th>Short Link</th><th>Copy</th><th>Delete</th></tr><?php require './scripts/listloader.php'; ?></table></body></html>
<?php
} else {
header("Location: ./login/");
exit();
}
}
?>