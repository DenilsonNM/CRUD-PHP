  <?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['nombre_user'];
  if ($varsesion == null || $varsesion == '') {
    header("location: ../user/login.php");
    die();
  }
  ?>
  <Header>
    <div class="div_header ancho">
      <img src="../img/logotransparente.png  " alt="">
      <h1> <?php
            echo "Usuario: " . $_SESSION['nombre_user'];
            ?></h1>
    </div>
  </Header>

  <nav class="nav_menu">
    <ul class="ancho">
      <li><a href="../main/menu_registro.php">REGISTRO</a></li>
      <li><a href="https://tecnm9-my.sharepoint.com/personal/banco_proyectos_isc_merida_tecnm_mx/_layouts/15/onedrive.aspx?id=%2Fpersonal%2Fbanco%5Fproyectos%5Fisc%5Fmerida%5Ftecnm%5Fmx%2FDocuments%2F2023%2D3%2FBanco%20de%20proyectos%202024%2D1&ct=1725688202766&or=OWA%2DNT%2DMail&cid=c14baf67%2Da972%2D7ff6%2D0f85%2De755c171c80a&ga=1" target="_blank">BANCO DE PROYECTOS</a></li>
      <li><a href="config.php">CONFIGURACIÓN</a></li>
      <li><a href="../main/cerrarsesion.php" onclick="return confirm('¿Estás seguro de que desea salir?')">Salir</a></li>
    </ul>
  </nav>