<?php

  @include 'config.php';

  session_start();            #Start new or resume existing session.
  session_unset();            #Free all session variables.
  session_destroy();          #Destroys all data registered to a session.

  header('location:login_form.php');

?>