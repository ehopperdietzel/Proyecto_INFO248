<?php

/****************************************
*
* Cuarzo Software ®
* Valdivia, Chile
*
* Sección: Images ( PHP REST )
* Autor: Eduardo Hopperdietzel
* Año: 2020
*
******************************************/

include_once("../../lib/MySQL-Utils.php");
include_once("../../lib/Request-Validator.php");


requiredParams(array('request'));

switch ($_POST['request'])
{

  case 'list':
  {
    checkAdminLogin();

    echo sqlSearchToJSON("SELECT * FROM images");
    exit();
    break;
  }

  case 'new':
  {

    checkAdminLogin();

    if(isset($_POST['imageURL']))
    {
      $imageURL = validate($_POST['imageURL'],'url');
      $sql = "INSERT INTO images (isURL,url) VALUES (b'1','"+$imageURL+"')";
      if(sqlQuery($sql))
        httpOk(strval($conn->insert_id));
    }

    if(isset($_FILES["image"]))
    {

      if($_FILES['image']['type'] != "image/jpeg" && $_FILES['image']['type'] != "image/png")
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $type = exif_imagetype($_FILES['image']['tmp_name']);

      if($type != IMAGETYPE_JPEG && $type != IMAGETYPE_PNG)
        httpError("Formatos de imagen disponibles (JPEG,PNG)");

      $sql = "INSERT INTO images (isURL) VALUES (b'0')";
      sqlQuery($sql)

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
      imagejpeg($bg, '../../img/images/'.$conn->insert_id.'.jpg', $image_quality);
      imagedestroy($bg);

      httpOk(strval($conn->insert_id));
    }

    httpError("Request Inválida.");
  }


  case 'delete':
  {
    checkAdminLogin();

    requiredParams(array('id'));

    $image = validate($_POST['id'],'image');

    // Falta eliminar archivo

    $sql = "DELETE FROM images WHERE id=".$id;

    if(sqlQuery($sql))
      httpOk("");
  }



}

exit();
 ?>
