<?php
require_once 'pdo.php';

$user = null;

if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
  $sql = "SELECT name, email, password FROM users WHERE id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':user_id' => $user_id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    echo "We don't have this user in db";
  }
}

if (isset($_POST['update'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :user_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(
    array(
      ':name' => $name,
      ':email' => $email,
      ':password' => $password,
      ':user_id' => $_POST['user_id']
    )
  );
  header("Location: CRUD.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit User</title>
</head>

<body>
  <h2>Edit User</h2>
  <form method="post">
    <?php
    if ($user) {
      echo '<input type="hidden" name="user_id" value="' . $_POST['user_id'] . '">';
      echo '<p>Name: <input type="text" name="name" value="' . $user['name'] . '"></p>';
      echo '<p>Email: <input type="text" name="email" value="' . $user['email'] . '"></p>';
      echo '<p>Password: <input type="password" name="password" value="' . $user['password'] . '"></p>';
      echo '<p><input type="submit" name="update" value="Update User"></p>';
    } else {
      echo 'User not found.';
    }
    ?>
  </form>
</body>

</html>