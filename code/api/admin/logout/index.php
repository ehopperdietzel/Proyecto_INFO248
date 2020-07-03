<?php

  include_once("../../lib/shared.php");

  session_start();
  session_unset();
  session_destroy();
  
  httpOk("Logged Out");

  die();
?>
