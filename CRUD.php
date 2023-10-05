<?php
require_once 'pdo.php';

if (
  isset($_POST['name']) && isset($_POST['email'])
  && isset($_POST['password'])
) {
  $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
  // echo ("<pre>\n" . $sql . "</pre>");
  $stmt = $pdo->prepare($sql);
  $stmt->execute(
    array(
      ':name' => $_POST['name'],
      //sanitized in the front end with htmlspecialchars()
      ':email' => $_POST['email'],
      ':password' => $_POST['password']
    )
  );
}

if (isset($_POST['delete']) && isset($_POST['user_id'])) {
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
  <title>User List</title>
</head>

<body>
  <table border="1">
    <?php
    $stmt = $pdo->query("SELECT id, name, email, password FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr><td>";
      echo ($row['name']);
      echo ("</td><td>");
      echo ($row['email']);
      echo ("</td><td>");
      echo ($row['password']);
      echo ("</td><td>");
      echo ('<form method="post" action="edit.php">');
      echo ('<input type="hidden" name="user_id" value="' . $row['id'] . '">');
      echo ('<input type="submit" value="Edit" name="edit">');
      echo ("</form>");
      echo ("</td><td>");
      echo ('<form method="post"><input type="hidden"');
      echo ('name="user_id" value="' . $row['id'] . '">' . "\n");
      echo ('<input type= "submit" value= "Delete" name="delete">');
      echo ("\n</form>\n");
      echo ("</td></tr>\n");
    }
    ?>
  </table>
  <p>Add a new user</p>
  <form method="post">
    <p> Name: <input type='text' size='32' maxlength='64' name='name'></p>
    <p> Email: <input type='text' size='32' maxlength='64' name='email'></p>
    <p> Password: <input type='password' size='32' maxlength='64' name='password'></p>
    <p><input type="submit" value="Add New" /></p>
  </form>
</body>

</html>