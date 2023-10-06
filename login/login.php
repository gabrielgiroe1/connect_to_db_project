<?php
session_start();
if (isset($_POST["account"]) && isset($_POST["pw"])) {
  unset($_SESSION["account"]);
  if ($_POST["pw"] == 'umsi') {
    $_SESSION["account"] = $_POST["account"];
    $_SESSION["success"] = "Logged in.";
    header('Location: app.php');
    return;
  } else {
    $_SESSION['error'] = "Wrong password";
    header('Location: login.php');
    return;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Please Log in</h1>
  <?php
  if (isset($_SESSION["error"])) {
    echo "<p style='color:#ff324d'>" . $_SESSION["error"] . "</p>";
    unset($_SESSION["error"]);
  }
  if (isset($_SESSION["success"])) {
    echo ('<p style="color:green">' . $_SESSION["success"] . "</p>\n");
    unset($_SESSION["success"]);
  }
  ?>
  <form method="post">
    <p>Account: <input type="text" name="account" value="" /></p>
    <p>Password: <input type="text" name="pw" value="" /></p>
    <p><input type="submit" value="Log in" />
      <a href="app.php">Cancel</a>
    </p>
  </form>
</body>

</html>