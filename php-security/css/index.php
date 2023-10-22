<?php

  include_once "../database/db.php";

  setcookie("password","lamine",strtotime("+1 day"),"/",true);

  echo $_COOKIE["password"];

  if(isset($_POST["submit"])){

    $name = htmlspecialchars($_POST["name"]);
    $message = htmlspecialchars($_POST["message"]);

    $pre_stmt = $con->prepare("INSERT INTO contact (name,message) VALUES (?,?)");

    $pre_stmt->bind_param("ss",$name,$message);

    if($pre_stmt->execute()){
      echo "Message posted";
    }else{
      echo "Some error";
    }

  }

?>


<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>

<p></p>
  <div class="container mt-5">
    <h2>Contact From</h2>
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="" autocomplete="on">
          <div class="form-group">
            <label for="exampleInputEmail1">Your Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter You Name">
          </div>
          <div class="form-group">
            <label for="msg">Enter Your Message</label>
            <textarea name="message" class="form-control" id="msg" placeholder="Enter Your Message here"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </div>
      </form>
    </div>
  </div>


  </div>
  <p></p>
  <div class="container">
    <?php
      $pre_stmt = $con->prepare("SELECT * FROM contact");
      $pre_stmt->execute();
      $result = $pre_stmt->get_result();
      while ($row = $result->fetch_assoc()) { 
        echo "<div class=`row`>
        <div class=`col-md-6`>
          <h4>".$row["name"]."</h4>
          <p>".$row["message"]."</p>
        </div>
        </div> ";
      }

    ?>
    
    </div>
  








  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>