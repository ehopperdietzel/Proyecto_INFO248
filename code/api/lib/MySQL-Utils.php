<?php

include_once("shared.php");

// MySQL
$conn;

$dbhost=$conf->mysql_host;
$dbuser=$conf->mysql_user;
$dbpass=$conf->mysql_pass;
$dbname=$conf->mysql_db;

// Connect to mysql
function mysqlConnect()
{
  global $dbhost, $dbuser, $dbpass, $dbname, $conn;

  // Connects to the db
  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  // Check connection
  if ($conn->connect_error)
      httpError("Connection failed");
}

// SQL query a JSON
function sqlSearchToJSON($sql)
{
  global $conn;
  $result = $conn->query($sql);

  if($result)
  {
    $rows = array();
    while($r = mysqli_fetch_assoc($result))
        $rows[] = $r;

    return json_encode($rows);
  }
  else
    httpError("MySQL Error:".$conn->error);
}

// SQL query
function sqlQuery($sql, $multi=false)
{
  global $conn;
  if($multi) $result = $conn->multi_query($sql);
  else $result = $conn->query($sql);

  if($result)
    return $result;
  else
    httpError("MySQL Error:".$conn->error);
}

// SQL search array
function sqlSearchToArray($sql)
{
  global $conn;
  $result = $conn->query($sql);

  if($result)
  {
    $rows = array();
    while($r = mysqli_fetch_assoc($result))
        $rows[] = $r;

    return $rows;
  }
  else
    httpError("MySQL Error:".$conn->error);
}

// Se conecta a la base de datos
mysqlConnect();

?>
