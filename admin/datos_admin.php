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
  <h2 class="h2_title_sections">Alumnos Registrados</h2>


  <section class="section_table_admin ancho">
    <table class="table_verdocs">
      <thead>
        <tr>
          <th>Alumno</th>
          <th>Matricula</th>
          <th>Genero</th>
          <th>Correos</th>
          <th>Telefono</th>
          <th>Banco de Proyectos</th>
          <th>ID de Proyecto</th>
          <th>Especialidad</th>
          <th>Nombre de Proyecto</th>
          <th>Empresa</th>
          <th>Fecha de Inicio</th>
          <th>Fecha de Finalización</th>
          <th>Partifipantes</th>
          <th>Nombre de Partifipantes</th>
          <th>Asesor Interno</th>
          <th>Asesor Externo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require "conexion.php";

        $alumno = "
        SELECT
          id_registro, nombre, apellido_pa, apellido_ma, matricula, sexo, correo_in, correo_ad, telefono, banco_datos, id_proyecto, especialidad, nom_proyecto, empresa, fecha_inicio, fecha_fin, participantes, parti_adic, asesor_ex, asesor_in
        FROM info_alumno
        ";

        // Ejecutar la consulta
        $resultado = mysqli_query($conectar, $alumno);

        // Verificar si hay resultados
        while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row["nombre"]) . " " . htmlspecialchars($row["apellido_pa"]) . " " . htmlspecialchars($row["apellido_ma"]); ?></td>

            <td><?php echo htmlspecialchars($row["matricula"]); ?></td>

            <td><?php echo htmlspecialchars($row['sexo']); ?></td>

            <td><?php echo htmlspecialchars($row["correo_in"]) . " " . htmlspecialchars($row["correo_ad"]); ?></td>

            <td><?php echo htmlspecialchars($row['telefono']); ?></td>

            <td><?php echo htmlspecialchars($row['banco_datos']); ?></td>

            <td><?php echo htmlspecialchars($row['id_proyecto']); ?></td>

            <td><?php echo htmlspecialchars($row['especialidad']); ?></td>

            <td><?php echo htmlspecialchars($row['nom_proyecto']); ?></td>

            <td><?php echo htmlspecialchars($row['empresa']); ?></td>

            <td><?php echo htmlspecialchars($row['fecha_inicio']); ?></td>

            <td><?php echo htmlspecialchars($row['fecha_fin']); ?></td>

            <td><?php echo htmlspecialchars($row['participantes']); ?></td>

            <td><?php echo htmlspecialchars($row['parti_adic']); ?></td>

            <td><?php echo htmlspecialchars($row['asesor_in']); ?></td>

            <td><?php echo htmlspecialchars($row['asesor_ex']); ?></td>

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