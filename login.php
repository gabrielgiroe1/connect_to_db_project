<?php
require_once 'pdo.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
  echo ("<p>Handling POST data..</p>\n");
  $e = $_POST['email'];
  $p = $_POST['password'];

  $sql = "SELECT name FROM users
  WHERE email=:em AND password=:pw";

  echo "<p>$sql</p>\n";

  $stmt = $pdo->query($sql);
  $stmt->execute(
    array(
      ':em' => $_POST['email'],
      ':pw' => $_POST['password']
    )
  );
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  var_dump($row);
  echo "-->\n";
  if ($row === FALSE) {
    echo "<h1>Login incorrect.</h1>\n";
  } else {
    echo "<p>Login successfully</p>\n";
  }
}
?>
<p>Please Login</p>
<form method="post">
  <p>Email:
    <input type="text" name="email" />
  </p><br />
  <p>
    Password:<input type="text" name="password" /></p></br>
  <p>
    <input type="submit" value="Login" />
    <a href="<?php echo ($_SERVER['PHP_SELF']); ?>">Refresh</a>
  </p>
  <p>Checkout thi
    <a href="http://xkcd.com/327/" target="_blank"> XKCD comic that</a>
  </p>
</form>