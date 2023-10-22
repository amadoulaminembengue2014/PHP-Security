<html>
  <head>
    <title></title>
  </head>
  <body>
    
      <form method="post" action="" autocomplete="off">
        <input type="text" name="email" placeholder="Enter email"></br>
        <input type="text" name="password" placeholder="Enter password"></br>
        <input type="submit" name="submit" value="Login"></br>
      </form>

  </body>
</html>

<?php

$con = new Mysqli("localhost","root","250314","php_security");

if ($con->connect_error) {
  echo $con->connect_error;
}

if (isset($_POST["submit"])) {
    
  $pre_stmt = $con->prepare("SELECT * FROM user_info WHERE email = ? AND password = ?" );
  $pre_stmt->bind_param("ss",$_POST["email"],$_POST["password"]);
  $pre_stmt->execute();
  $result = $pre_stmt->get_result();

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    //echo $row["email"];            #Allow of put up the email.
    header("location:profile.php?email=".$row["email"]);
  } else{
    echo "login fail";            #But if you doing ' OR '1'='1 it past
  }

}

    
    // $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
    
    // $run_query = $con->query($sql);

    // if ($run_query) {
    //   $row = $run_query->fetch_assoc();
    //   $email = $row["email"];
    //   header("location:profile.php?email=".$email);       #Allow of put up the email forward an other
    // }

  
  

?>