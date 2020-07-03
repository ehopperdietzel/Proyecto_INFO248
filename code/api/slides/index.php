<?php

/****************************************
*
* Cuarzo Software ®
* Valdivia, Chile
*
* Sección: Slides ( PHP REST )
* Autor: Eduardo Hopperdietzel
* Año: 2020
*
******************************************/

include_once("../../lib/MySQL-Utils.php");
include_once("../../lib/Request-Validator.php");


// Se conecta a la base de datos
mysqlConnect();

// Obtiene la connexión a MySQL
global $conn;

// Verifica que exista el parametro "request"
requiredParams(array('request'));

// Obtiene el tipo de request
$req = $_POST['request'];

// Asigna una función a cada tipo de request
switch ($req)
{
  // Obtiene lista JSON de productos
  case 'list':
  {
    echo sqlSearchToJSON("SELECT * FROM products ORDER BY category");
    exit();
    break;
  }

  // Crea una nuevo producto
  case 'new':
  {
    // Verifica sesión
    checkAdminLogin();


  }

  // Elimina un producto
  case 'delete':
  {

  }

  // Modifica un producto
  case 'update':
  {

  }

}

exit();
 ?>
