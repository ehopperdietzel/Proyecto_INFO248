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

include_once("../lib/MySQL-Utils.php");
include_once("../lib/Request-Validator.php");

requiredParams(array('request'));

switch ($_POST['request'])
{

  case 'list':
  {
    echo sqlSearchToJSON("SELECT id, contain, image FROM slides WHERE visible=b'1' ORDER BY position");
    exit();
    break;
  }

  case 'listAll':
  {
    checkAdminLogin();

    echo sqlSearchToJSON("SELECT * FROM slides ORDER BY position");
    exit();
    break;
  }

  case 'new':
  {
    checkAdminLogin();

    $count = count(sqlSearchToArray("SELECT id FROM slides"));
    sqlQuery("INSERT INTO slides (position) VALUES (".$count.")");

    httpOk(strval($conn->insert_id));
  }

  case 'delete':
  {
    checkAdminLogin();

    requiredParams(array('id'));

    $id = validate($_POST['id'],'slide');

    $sql = "DELETE FROM slides WHERE id=".$id;

    if(sqlQuery($sql)) httpOk();
  }

  case 'update':
  {
    checkAdminLogin();

    requiredParams(array('id'));

    $id = validate($_POST['id'],'slide');

    if(isset($_POST['image']))
    {
      $image = validate($_POST['image'],'image');
      $sql = "UPDATE slides SET image=".$image." WHERE id=".$id;
      sqlQuery($sql);
    }

    if(isset($_POST['contain']))
    {
      $contain = validate($_POST['contain'],'bool');
      $sql = "UPDATE slides SET contain=".$contain." WHERE id=".$id;
      sqlQuery($sql);
    }

    if(isset($_POST['position']))
    {

    }

  }

}

exit();
 ?>
