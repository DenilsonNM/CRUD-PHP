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
  include "header_menu_config.php";
  ?>

  <section class="section_table_admin ancho">
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
        <?php
        require "conexion.php";

        $usuario = "SELECT id_user, nombre_user, edad_user, correo_user, contr_user FROM usuarios WHERE id_user = ?";

        $stmt = mysqli_prepare($conectar, $usuario);
        mysqli_stmt_bind_param($stmt, 'i', $idsesion);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultado)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row["nombre_user"]); ?></td>
            <td><?php echo htmlspecialchars($row['edad_user']); ?></td>
            <td><?php echo htmlspecialchars($row['correo_user']); ?></td>
            <td><?php echo htmlspecialchars($row['contr_user']); ?></td>
            <td>
              <a class="button_mod" onclick="return confirm('¿Realmente deseas MODIFICAR?')" href='modificar_user.php?id_user=<?php echo $row['id_user']; ?>'>Modificar</a>
            </td>
          </tr>
        <?php
        } else {
          echo "<tr><td colspan='5'>No se encontró información del usuario.</td></tr>";
        }

        // Liberar recursos
        mysqli_stmt_close($stmt);
        mysqli_close($conectar);
        ?>
      </tbody>
    </table>
  </section>

  <?php
  include "../footer.php";
  ?>

</body>

</html>