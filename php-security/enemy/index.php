<html lang="en">
<head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

  <script type="text/javascript">
      $(document).ready(function() {
        $.ajax({
          url : "http://localhost/php-security/csrf/delete.php",
          method : "POST"
        })
      })

  </script>
  
</body>
</html>