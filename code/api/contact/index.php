<?php

include_once("../lib/shared.php");

$res = new stdClass();

$res->facebook = $conf->facebook;
$res->instagram = $conf->instagram;
$res->email = $conf->email;
$res->whatsapp = $conf->whatsapp;

echo json_encode($res);

exit();
 ?>
