<?php

      session_start();
      include "../database/db.php";

     if(isset($_SESSION["email"])){
      $pre_stmt = $con->prepare("DELETE FROM user_info WHERE email = ?");
      $pre_stmt->bind_param("s",$_SESSION["email"]);
      if($pre_stmt->execute()){
        echo "Your account is deleted";
      }
     }


?>