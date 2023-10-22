<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {        #Allow to affich the name registered.
  header('location:login_form.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin page</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="container mt-5" style="text-align: center;font-size: 30px;
  color: #333;">

    <div class="content">
      <h3>hi, <span style="background: crimson;color: #fff;border-radius: 5px;padding: 0 10px;">admin</span></h3>
      <h1 style="font-size: 50px;color: #333;">Welcom <span style="color: crimson;"><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p style="font-size: 25px;margin-bottom: 20px;">This is an admin page</p>
      <a href="login_form.php" class="btn" style="display: inline-block;padding: 10px 30px;font-size: 20px;
  background: #333;color: #fff;margin: 0 5px;">login</a>
      <a href="register_form.php" class="btn" style="display: inline-block;padding: 10px 30px;font-size: 20px;
  background: #333;color: #fff;margin: 0 5px;">register</a>
      <a href="logout.php" class="btn" style="display: inline-block;padding: 10px 30px;font-size: 20px;
  background: #333;color: #fff;margin: 0 5px;">logout</a>
    </div>

  </div>

</body>

</html>