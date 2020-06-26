<html>
<head>
  <meta charset="utf-8">
  <title>Calzados Lara Paillaco</title>

  <!-- Librerías -->
  <script type="text/javascript" src="js/lib/jquery-3.5.1.min.js"></script>

  <!-- Scripts Secciones -->
  <script type="text/javascript" src="js/home/welcome.js"></script>
  <script type="text/javascript" src="js/home/products.js"></script>
  <script type="text/javascript" src="js/home/history.js"></script>
  <script type="text/javascript" src="js/home/contact.js"></script>

  <!-- Controlador de la página principal -->
  <script type="text/javascript" src="js/home/controller.js"></script>

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
    <div id="tabs">
      <div id="tab-1" class="tab">
        <div class="text">Inicio</div>
        <div class="selectIndicator" style="display:block"></div>
      </div>
      <div id="tab-2" class="tab">
        <div class="text">Productos</div>
        <div class="selectIndicator"></div>
      </div>
      <div id="tab-3" class="tab">
        <div class="text">Historia</div>
        <div class="selectIndicator"></div>
      </div>
      <div id="tab-4" class="tab">
        <div class="text">Contacto</div>
        <div class="selectIndicator"></div>
      </div>
    </div>

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

</body>
</html>
