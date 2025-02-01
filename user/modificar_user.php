<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONFIGURACIÓN</title>
  <link rel="stylesheet" href="../styles/main.css">

</head>

<body>

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

  <?php
  require "conexion.php";

  if (isset($_GET['id_user'])) {

    $id_user = $_GET['id_user'];
    $usuario = "
        SELECT
          id_user, nombre_user, edad_user, correo_user, contr_user
        FROM usuarios
        ";

    $resultado = mysqli_query($conectar, $usuario);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
      $estatus = mysqli_fetch_assoc($resultado);

      $id_user = $estatus['id_user'];
      $nombre_user = $estatus['nombre_user'];
      $edad_user = $estatus['edad_user'];
      $correo_user = $estatus['correo_user'];
      $contr_user = $estatus['contr_user'];
    } else {
      echo "alumno no encontrado";
      exit;
    }
  } else {
    echo "No se proporcionaron parámetros en la URL";
    exit;
  }
  ?>
  <div class="div_btnvolver ">
    <a href="config.php" class="button_mod" onclick="return confirm('¿Estás seguro de que desea regresar?')">Volver</a>
  </div>

  <section class="section_table_admin ancho">

    <form action="actualizar_user.php?id_user=<?= trim($id_user) ?>" method="POST">

      <table class="table_verdocs">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td><textarea name="nombre_user" style="white-space: pre-wrap;" required><?= htmlspecialchars($nombre_user) ?></textarea></td>

            <td><textarea name="edad_user" style="white-space: pre-wrap;" required><?= htmlspecialchars($edad_user) ?></textarea></td>

            <td><textarea name="correo_user" style="white-space: pre-wrap;" required><?= htmlspecialchars($correo_user) ?></textarea></td>

            <td><textarea name="contr_user" style="white-space: pre-wrap;" required><?= htmlspecialchars($contr_user) ?></textarea></td>

            <td>
              <button class="button_mod" type="submit" onclick="return confirm('¿Estás seguro de que desea continuar?')">Actualizar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </section>

  <?php
  include "../footer.php"
  ?>

</body>

</html>