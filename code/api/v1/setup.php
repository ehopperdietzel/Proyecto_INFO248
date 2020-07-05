<?php

include "../lib/MySQL-Utils.php";
include "../lib/Request-Validator.php";

checkAdminLogin();

function createTable($section, $conn, $sql)
{
  if ($conn->query($sql) === TRUE)
  {
    echo "<li>".$section." table created successfully.</li>";
    return true;
  }
  else
  {
    echo "<li style='color:red'>".$conn->error."</li>";
    return false;
  }
}

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);

// Check connection
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

// Create database
$sql = "CREATE DATABASE ".$dbname;

echo "<h1>Setting Up Database</h1><ul style='font-family:verdana;color:green'>";

if ($conn->query($sql) === TRUE)
    echo "<li>Database created successfully.</li>";
else
    echo "<li style='color:red'>".$conn->error."</li>";

// Convierte a UTF 8
$sql = "ALTER DATABASE ".$dbname." CHARACTER SET utf8 COLLATE utf8_general_ci";

if ($conn->query($sql) === TRUE)
    echo "<li>Database converted to UTF-8.</li>";
else
    echo "<li style='color:red'>".$conn->error."</li>";

// Connects to the db
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error)
    die("<li style='color:red'>Connection failed: ".$conn->connect_error."</li>");


// Images
$sql = "CREATE TABLE images (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  isURL BIT(1) DEFAULT b'0',
  url VARCHAR(64) DEFAULT 'no'
)";
if(createTable("images", $conn, $sql))
{
  $sql = "INSERT INTO images (isURL) VALUES (b'0')";
  $conn->query($sql);
}

// Slides
$sql = "CREATE TABLE slides (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  position INT(8) UNSIGNED,
  contain BIT(1) DEFAULT b'0',
  visible BIT(1) DEFAULT b'0',
  image INT(8) UNSIGNED DEFAULT 1,
  FOREIGN KEY (image) REFERENCES images(id)
)";
createTable("slides", $conn, $sql);

// Tutors
$sql = "CREATE TABLE products (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(256),
  description VARCHAR(2048),
  visible BIT(1) DEFAULT b'1',
  customizable BIT(1) DEFAULT b'1',
  defaultImage INT(8) UNSIGNED,
  FOREIGN KEY (defaultImage) REFERENCES images(id)
)";
createTable("products", $conn, $sql);

// Categories
$sql = "CREATE TABLE categories (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(128)
)";

if(createTable("categories", $conn, $sql))
{
  $sql = "INSERT INTO categories (title) VALUES ('Todo')";
  $conn->query($sql);
}

// Product Categories
$sql = "CREATE TABLE productCategories (
  product INT(8) UNSIGNED,
  category INT(8) UNSIGNED,
  FOREIGN KEY (product) REFERENCES products(id),
  FOREIGN KEY (category) REFERENCES categories(id)
)";
createTable("productCategories", $conn, $sql);

// Customizations
$sql = "CREATE TABLE customizations (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product INT(8) UNSIGNED,
  name VARCHAR(128),
  FOREIGN KEY (product) REFERENCES products(id)
)";
createTable("customizations", $conn, $sql);

// Customization Options
$sql = "CREATE TABLE customizationOptions (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customization INT(8) UNSIGNED,
  name VARCHAR(128),
  FOREIGN KEY (customization) REFERENCES customizations(id)
)";
createTable("customizationOptions", $conn, $sql);

// Product Variations
$sql = "CREATE TABLE productVariations (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product INT(8) UNSIGNED,
  price INT(8) UNSIGNED,
  image INT(8) UNSIGNED,
  FOREIGN KEY (product) REFERENCES products(id),
  FOREIGN KEY (image) REFERENCES images(id)

)";
createTable("productVariations", $conn, $sql);

// Customization Combinations
$sql = "CREATE TABLE customizationCombinations (
  productVariation INT(8) UNSIGNED,
  customization INT(8) UNSIGNED,
  customizationOption INT(8) UNSIGNED,
  FOREIGN KEY (productVariation) REFERENCES productVariations(id),
  FOREIGN KEY (customization) REFERENCES customizations(id),
  FOREIGN KEY (customizationOption) REFERENCES customizationOptions(id)

)";
createTable("customizationCombinations", $conn, $sql);

// Orders
$sql = "CREATE TABLE orders (
  id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  clientName VARCHAR(64),
  clientEmail VARCHAR(64),
  clientPhone VARCHAR(16),
  message VARCHAR(512),
  orderDate DATE,
  paid BIT(1) DEFAULT b'0',
  delivered BIT(1) DEFAULT b'0'
)";
createTable("orders", $conn, $sql);

// Order Products
$sql = "CREATE TABLE orderProducts (
  productVariation INT(8) UNSIGNED,
  orderId INT(8) UNSIGNED,
  count INT(6) UNSIGNED,
  FOREIGN KEY (productVariation) REFERENCES productVariations(id),
  FOREIGN KEY (orderId) REFERENCES orders(id)
)";
createTable("orderProducts", $conn, $sql);

// Contact Types
$sql = "CREATE TABLE contactTypes (
  id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  type VARCHAR(16)
)";

if(createTable("contactTypes", $conn, $sql))
{
  $types = [
    "facebook",
    "instagram",
    "phone",
    "email"
  ];

  foreach ($types as $type)
  {
    $sql = "INSERT INTO contactTypes (type) VALUES ('".$type."')";
    $conn->query($sql);
  }
}

// Contacts
$sql = "CREATE TABLE contacts (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  type INT(1) UNSIGNED,
  href VARCHAR(128),
  FOREIGN KEY (type) REFERENCES contactTypes(id)
)";
createTable("contacts", $conn, $sql);


$conn->close();

echo "</ul>"
?>
