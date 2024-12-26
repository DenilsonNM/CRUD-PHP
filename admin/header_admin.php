  <?php
  require "redireccionar.php"
  ?>

  <Header>
    <div class="div_header ancho">
      <img src="../img/logotransparente.png  " alt="">
      <h1>ADMINISTRADOR</h1>
    </div>
  </Header>

  <nav class="nav_menu">
    <ul class="ancho">
      <li><a href="index_admin.php">Inicio</a></li>
      <li> <a href="cerrar_sesion.php" onclick="return confirm('¿Estás seguro de que desea salir?')">Salir</a>
      </li>
    </ul>
  </nav>