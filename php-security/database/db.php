<?php
error_reporting();

  define('HOST','localhost');
  define('USER','root');
  define('PASS','250314');
  define('DB','php_security');

  $con = new Mysqli(HOST,USER,PASS,DB);
#If i put ECHO, i receive "php_network_getaddresses: getaddrinf failed: Temporary failure in name resolution".
  if($con->connect_error){
     $con->connect_error;     
  }
#But if i don;t have ECHO, i receive this "Empty".
?>