<?php

// Sessión
session_start();

// Zona horaria
date_default_timezone_set("America/Santiago");

// Muestra errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Lee las configuraciones
$conf = json_decode(file_get_contents(realpath(dirname(__FILE__)."/../../conf.json")));

// Configuraciones
$image_quality = $conf->image_quality;

// Error
function httpError($error)
{
  header('HTTP/1.1 500 Internal Server Error');
  exit($error);
  die();
}
function httpOk($msg = "Ok")
{
  header("HTTP/1.1 200 OK");
  exit($msg);
  die();
}

?>
