<?php

// Router
include "rest/lib/shared.php";

if(isset($_SESSION["admin_token"]))
{
  include "html/admin/admin.php";
}
else
{
  include "html/home/home.php";
}
die();


?>
