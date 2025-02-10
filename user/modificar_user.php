<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONFIGURACIÓN</title>
  <link rel="stylesheet" href="../styles/main.css">
</head>

<body>

  <?php include "header_menu_config.php"; ?>

  <div class="div_btnvolver">
    <a href="config.php" class="button_mod" onclick="return confirm('¿Estás seguro de que deseas regresar?')">Volver</a>
  </div>

  <?php
  require "conexion.php";

  if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $usuario = "SELECT id_user, nombre_user, edad_user, correo_user, contr_user FROM usuarios WHERE id_user = ?";

    $stmt = mysqli_prepare($conectar, $usuario);
    mysqli_stmt_bind_param($stmt, 'i', $id_user);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultado)) {
      $nombre_user = $row['nombre_user'];
      $edad_user = $row['edad_user'];
      $correo_user = $row['correo_user'];
      $contr_user = $row['contr_user'];
    } else {
      echo "<script>alert('Usuario no encontrado.'); window.location.href='config.php';</script>";
      exit;
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "<script>alert('ID de usuario inválido.'); window.location.href='config.php';</script>";
    exit;
  }
  ?>
  <section class="section_table_admin ancho">
    <form action="actualizar_user.php?id_user=<?= htmlspecialchars($id_user) ?>" method="POST">
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
            <td><textarea name="nombre_user" required><?= htmlspecialchars($nombre_user) ?></textarea></td>
            <td><textarea name="edad_user" required><?= htmlspecialchars($edad_user) ?></textarea></td>
            <td><textarea name="correo_user" required><?= htmlspecialchars($correo_user) ?></textarea></td>
            <td><textarea name="contr_user" required><?= htmlspecialchars($contr_user) ?></textarea></td>
            <td>
              <button class="button_mod" type="submit" onclick="return confirm('¿Estás seguro de que deseas continuar?')">Actualizar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </section>

  <?php include "../footer.php"; ?>

</body>

</html>