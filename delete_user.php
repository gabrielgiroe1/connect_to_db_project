<?php
require_once 'pdo.php';
if (isset($_POST['user_id'])) {
  $sql = "DELETE FROM users WHERE id = :zip";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':zip' => $_POST['user_id']));
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
<p>Delete a user</p>
<form method="post">
  <p> ID to Delete:
    <input type="text" name="user_id">
  </p>
  <p><input type="submit" value="Delete" /></p>
</form>
</body>
</html>
