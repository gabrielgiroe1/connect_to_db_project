<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Cool application</h1>
  <?php
  if (isset($_SESSION["success"])) {
    echo ('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
    unset($_SESSION["success"]);
  }
  if (!isset($_SESSION["account"])) { ?>
    <p>Please <a href="login.php">Log in </a> to start.</p>
  <?php } else { ?>
    <p>This is a where a cool application would be.</p>
    <p>Please <a href="logout.php">Log out</a> when you are done.</p>
  <?php } ?>
</body>

</html>