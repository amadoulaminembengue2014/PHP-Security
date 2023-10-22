<?php

      session_start();
      include "../database/db.php";

     echo $_SESSION["email"] = "lamine@gmail.com";


?>

<form action="delete.php" method="post">
  <input type="submit" name="submit" value="Delete your account">
</form>

<a href="http://localhost/php-security/csrf/enemy/index.php">Gift for you</a>