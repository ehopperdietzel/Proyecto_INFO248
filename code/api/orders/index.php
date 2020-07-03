<?php

/****************************************
*
* Cuarzo Software ®
* Valdivia, Chile
*
* Sección: Pedidos ( PHP REST )
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
  // Obtiene los pedidos
  case 'list':
  {
    checkAdminLogin();
    requiredParams(array('offset','filter'));

    $offset = validate($_POST["offset"],"number");
    $filterCase = validate($_POST["filter"],"number");

    $filter = "";

    if($filterCase == 1)
    {
      $filter = " AND orders.status = 2";
    }
    else if($filterCase == 2)
    {
      $filter = " AND orders.status = 1";
    }
    else if($filterCase == 3)
    {
      $filter = " AND orders.status = 3";
    }


    echo sqlSearchToJSON("SELECT
                          id,
                          price,
                          status,
                          orderDate,
                          clientFname,
                          clientLname,
                          clientPhone,
                          clientEmail
                          FROM orders
                          WHERE status=".$filter."
                          ORDER BY orderDate DESC LIMIT 50 OFFSET ".$offset);


    exit();
    break;
  }

  // Crea una nuevo pedido
  case 'new':
  {
    // Checkea los parámetros requeridos
    requiredParams(array('clientFname','clientLname','clientPhone','clientEmail','products'));

    $fname = validate($_POST['clientFname'],"name",256);
    $lname = validate($_POST['clientLname'],"name",256);
    $phone = validate($_POST['clientPhone'],"phone",11);
    $email = validate($_POST['clientEmail'],"phone",24);
    $products = validate($_POST['products'],"json");



    // FALTA ANALIZAR ARREGLO DE PRODUCTOS



    // Realiza la query
    sqlQuery($sql);

    // Retorna el ID de la nueva noticia
    httpOk(strval($conn->insert_id));
  }

  // Elimina un pedido
  case 'delete':
  {
    // Verifica sesión
    checkAdminLogin();

    // Verifica los parámetros requeridos
    requiredParams(array('id'));

    $id = validate($_POST['id'],"number",3);

    // Genera la query para eliminar
    $sql = "DELETE FROM orders WHERE id=".$id;



    // FALTA ELIMINAR PERSONALIZACIÓN


    // Realiza la query
    if(sqlQuery($sql)) httpOk();
  }

  // Modifica un pedido
  case 'update':
  {
    // Verifica sesión
    checkAdminLogin();

    // Verifica los parámetros requeridos
    requiredParams(array('changes','id'));

    // Obtiene que parametros fueron modificados
    $changes = validate($_POST["changes"],"json");
    $id = validate($_POST['id'],"number",3);

    // Variable para generar almacenar las queries
    $sql = "";

    // POR CAMBIAR

    // Añade los cambios a la query
    if($changes[0])
    {
      requiredParams(array('title'));
      $title = validate($_POST['title'],"text",256);
      $sql .= "UPDATE orders SET title='".$title."' WHERE id=".$id.";";
    }
    if($changes[1])
    {
      requiredParams(array('body'));
      $body = validate($_POST['body'],"text",2000);
      $sql .= "UPDATE news SET body='".$body."' WHERE id=".$id.";";
    }
    if($changes[2])
    {

    }
    if($changes[3])
    {
      requiredParams(array('mode'));
      $mode = validate($_POST['mode'],"number",1);
      $sql .= "UPDATE news SET mode=".$mode." WHERE id=".$id.";";
    }

    if(sqlQuery($sql,true))
      exit("ok");
  }
  // Modifica un pedido
  case 'update':
  {
    // Verifica sesión
    checkAdminLogin();
  }

}

exit();
 ?>
