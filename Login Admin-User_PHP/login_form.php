<?php

  include 'config.php';

  session_start();

  if (isset($_POST['submit'])) {           #Validate the informations put in the DATABASE.

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);  

    if (mysqli_num_rows($result) > 0){             #The condition if this user_type ADMIN exist ?

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {          #Determinate that this type of ADMIN exist.
                
        $_SESSION['admin_name'] = $row['name'];
        header('location:admin_page.php');         #Send a raw HTTP header.

      } elseif ($row['user_type'] == 'user') {     #Determinate that this type of USER exist.

        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');         
      } 
      
    } else {                                        #Don't confirm if you have a bad information.
      $error[] = 'incorrect email or password';
    }
    
  };

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login form</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="form container mt-5" style="min-height: 100vh;display: flex;align-items: center;justify-content: center;padding: 20px;padding-bottom: 60px;background: #eee;">
    <form action="" method="post" style="padding: 20px;border-radius: 5px;box-shadow: 0 5px 10px rgba(0, 0, 0, .1);background: #fff;text-align: center;">
      <h3 style=" font-size: 30px;text-transform: uppercase;margin-bottom: 10px;color: #333;">login now</h3>

      <?php
      
        if (isset($error)) {            #Return the condition email or password if we don't confirm.
          foreach($error as $error){
            echo '<span class="error-msg" style="margin: 10px 0;display: block;background: crimson;color: #fff;
            border-radius: 5px;font-size: 20px;padding:10px;">'.$error.'</span>';
          };
        };
      
      ?>

      <input type="email" name="email" required placeholder="enter your email" style="width: 500px;padding: 10px 15px;font-size: 20px;margin: 8px 0;background: #eee;">
      <input type="password" name="password" required placeholder="enter your password" style="width: 500px;padding: 10px 15px;font-size: 20px;margin: 8px 0;background: #eee;">
      
      <input type="submit" name="submit" value="login now" class="form-btn" style="background: #fbd0db;
  color: crimson;text-transform: capitalize;font-size: 20px;cursor:pointer;">
      <p style="margin-top: 10px;font-size: 20px;color: #333;">don't have an account? <a href="register_form.php" style="color: crimson;">register now</a></p>
    </form>
  </div>

</body>

</html>