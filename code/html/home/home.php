<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <title>Calzados Lara Paillaco</title>

  <!-- Google Font Lato -->
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <!-- Estilos Globales -->
  <link rel="stylesheet" type="text/css" href="css/shared/shared.css"/>

  <!-- Estilos Home -->
  <link rel="stylesheet" type="text/css" href="css/home/home.css"/>

  <!-- Estilos Secciones -->
  <link rel="stylesheet" type="text/css" href="css/home/welcome.css"/>
  <link rel="stylesheet" type="text/css" href="css/home/products.css"/>
  <link rel="stylesheet" type="text/css" href="css/home/history.css"/>
  <link rel="stylesheet" type="text/css" href="css/home/contact.css"/>

  <!-- Librerías -->
  <script type="text/javascript" src="js/lib/showdown.min.js"></script>
  <script type="text/javascript" src="js/lib/jquery-3.5.1.min.js"></script>


  <script type="text/javascript" src="js/lib/tabs-manager.js"></script>
  <script type="text/javascript" src="js/lib/carousel.js"></script>
  <script type="text/javascript" src="js/lib/contact-displayer.js"></script>
  <script type="text/javascript" src="js/lib/modal.js"></script>

  <!-- Scripts Secciones -->
  <script type="text/javascript" src="js/home/welcome.js"></script>
  <script type="text/javascript" src="js/home/products.js"></script>
  <script type="text/javascript" src="js/home/history.js"></script>
  <script type="text/javascript" src="js/home/contact.js"></script>

  <!-- Controlador de la página principal -->
  <script type="text/javascript" src="js/home/controller.js"></script>


</head>
<body>

  <!-- Top Bar-->
  <div id="top-bar">

    <!-- Logo -->
    <div id="logo">
      <img id="icon-logo" src="img/logo.png"/>
      <img id="text-logo" src="img/text-logo.png"/>
    </div>

    <!-- Tabs -->
    <div id="tabs"></div>

    <!-- Spacer -->
    <div class="spacer"></div>

    <!-- Shopping Button-->
    <img id="shopping-btn" class="btn" src="img/shopping.png"/>

  </div>


  <!-- Sections -->
  <div id="sections">

    <!-- Incluye el html de cada sección -->
    <?php

      include "html/home/welcome.php";
      include "html/home/products.php";
      include "html/home/history.php";
      include "html/home/contact.php";
    ?>
  </div>

  <div id="footer">Calzados Lara Paillaco ® - 2020 <b id="adminBtn" class="btn">Administrador</b></div>

</body>
</html>
