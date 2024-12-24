<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
  <link rel="stylesheet" href="../styles/main.css">
</head>

<body>

  <?php
  include "header_admin.php"
  ?>

  <nav class="nav_menu_regi ancho">
    <ul>
      <h3>Datos de Alumno y Proyecto</h3>
      <li><a href="datos_admin.php">Visualizar</a></li>
      <h3>Documentos Iniciales</h3>
      <li><a href="iniciales_admin.php">Administrar</a></li>
      <h3>Documentos Finales</h3>
      <li><a href="finales_admin.php">Administrar</a></li>
    </ul>
  </nav>

  <?php
  include "../footer.php"
  ?>

</body>

</html>