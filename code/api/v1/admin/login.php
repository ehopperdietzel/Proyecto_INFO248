<?php

include_once("../../lib/Request-Validator.php");


// Parámetros requeridos
requiredParams(array('username', 'password'));

if($_POST["username"] == $conf->admin_user && $_POST["password"] == $conf->admin_pass)
{
  $res = new stdClass();
  $res->token = true;
  $_SESSION["admin_token"] = $res->token;
  echo json_encode( (object)$res );
}
else
{
  httpError("Usuario o contraseña incorrecta");
}
exit();
?>
