<?php

// Router
include "api/lib/shared.php";

if(isset($_SESSION["admin_token"]))
{
  //include "html/admin/admin.php";
  include "html/home/home.php";
}
else
{
  include "html/home/home.php";
}
die();


?>
