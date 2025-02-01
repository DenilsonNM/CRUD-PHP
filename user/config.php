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
  include "../main/header_menu_reg.php"
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

        $usuario = "
        SELECT
          id_user, nombre_user, edad_user, correo_user, contr_user
        FROM usuarios
        ";

        // Ejecutar la consulta
        $resultado = mysqli_query($conectar, $usuario);

        // Verificar si hay resultados
        while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row["nombre_user"]); ?></td>

            <td><?php echo htmlspecialchars($row['edad_user']); ?></td>

            <td><?php echo htmlspecialchars($row['correo_user']); ?></td>

            <td><?php echo htmlspecialchars($row['contr_user']); ?></td>

            <td>
              <?php
              echo "<a class=\"button_mod\" onclick=\"return confirm('¿Realmente deseas MODIFICAR?')\" href='modificar_user.php?id_user=" . $row['id_user'] . "'>Modificar</a>";
              ?>
            </td>
          </tr>
        <?php
        }
        mysqli_free_result($resultado);
        mysqli_close($conectar);
        ?>
      </tbody>
    </table>
  </section>

  <?php
  include "../footer.php"
  ?>

</body>

</html>