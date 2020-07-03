<?php

/****************************************
*
* Cuarzo Software ®
* Valdivia, Chile
*
* Sección: Productos ( PHP REST )
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

    // Checkea los parámetros requeridos
    requiredParams(array('title','body','photo','mode'));

    // Obtiene el número de noticias en la base de datos
    $count = $conn->query("SELECT count(*) from news");

    $title = validate($_POST['title'],"text",256);
    $body = validate($_POST['body'],"text",2000);
    $photo = validate($_POST['photo'],"number",1);
    $mode = validate($_POST['mode'],"number",1);

    // Genera la query
    $sql = "INSERT INTO news (title,body,position,state,image,mode) VALUES ('".$title."','".$body."',".($count->num_rows + 1).",1,".$photo.",".$mode.")";

    // Realiza la query
    sqlQuery($sql);

    // Guarda la foto ( Si contiene )
    if($photo == 1)
    {
      if(!isset( $_FILES["image"]))
        httpError("Error de request");

      if($_FILES['image']['type'] != "image/jpeg" && $_FILES['image']['type'] != "image/png")
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $type = exif_imagetype($_FILES['image']['tmp_name']);

      if($type != IMAGETYPE_JPEG && $type != IMAGETYPE_PNG)
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $image = null;

      if($type == IMAGETYPE_PNG)
      {
        $image = imagecreatefrompng($_FILES['image']['tmp_name']);
      }
      else
      {
        $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
      }

      $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
      imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
      imagealphablending($bg, TRUE);
      imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
      imagedestroy($image);
      imagejpeg($bg, '../../img/news/'.$conn->insert_id.'.jpg', $image_quality);
      imagedestroy($bg);


    }

    // Retorna el ID de la nueva noticia
    httpOk(strval($conn->insert_id));
  }

  // Elimina un producto
  case 'delete':
  {
    // Verifica sesión
    checkAdminLogin();

    // Verifica los parámetros requeridos
    requiredParams(array('id'));

    $id = validate($_POST['id'],"number",3);

    // Path de la foto
    $path = '../../img/news/'.$id.'.jpg';

    // Verifica si tiene foto
    if(file_exists($path)) unlink($path);

    // Genera la query para eliminar
    $sql = "DELETE FROM products WHERE id=".$id;

    // Realiza la query
    if(sqlQuery($sql)) httpOk();
  }

  // Modifica un producto
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

    // Añade los cambios a la query
    if($changes[0])
    {
      requiredParams(array('title'));
      $title = validate($_POST['title'],"text",256);
      $sql .= "UPDATE news SET title='".$title."' WHERE id=".$id.";";
    }
    if($changes[1])
    {
      requiredParams(array('body'));
      $body = validate($_POST['body'],"text",2000);
      $sql .= "UPDATE news SET body='".$body."' WHERE id=".$id.";";
    }
    if($changes[2])
    {

      if(!isset( $_FILES["image"]))
        httpError("Error de request");

      if($_FILES['image']['type'] != "image/jpeg" && $_FILES['image']['type'] != "image/png")
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $type = exif_imagetype($_FILES['image']['tmp_name']);

      if($type != IMAGETYPE_JPEG && $type != IMAGETYPE_PNG)
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $image = null;

      if($type == IMAGETYPE_PNG)
      {
        $image = imagecreatefrompng($_FILES['image']['tmp_name']);
      }
      else
      {
        $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
      }

      $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
      imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
      imagealphablending($bg, TRUE);
      imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
      imagedestroy($image);
      imagejpeg($bg, '../../img/news/'.$id.'.jpg', $image_quality);
      imagedestroy($bg);

      $sql .= "UPDATE products SET image=1 WHERE id=".$id.";";
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

}

exit();
 ?>
