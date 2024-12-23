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

  <section class="section_table_admin ancho">
    <table class="table_verdocs">
      <thead>
        <tr>
          <th>Alumno</th>
          <th>Matricula</th>
          <th>Carta Presentación</th>
          <th>Carta Aceptación</th>
          <th>Carta Terminación SS</th>
          <th>Comprobante Inscripción</th>
          <th>Comprobante Vigencia DD</th>
          <th>Reporte Preliminar Residencia</th>
          <th>Solicitud Proyecto</th>
          <th>Fecha de Subida</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        require "conexion.php";

        $alumno = "
        SELECT
          ia.id_registro, ia.nombre, ia.apellido_pa, ia.apellido_ma, ia.matricula, 
          id.car_prese, id.car_acept, id.car_term_ss, id.com_inscr, id.com_vig_dd, 
          id.rep_pre_res, id.sol_proy, ic.comentario, id.fecha_subida, ic.car_prese, ic.car_acept, ic.car_term_ss, ic.com_inscr, ic.com_vig_dd, ic.rep_pre_res, ic.sol_proy
        FROM info_alumno ia
        LEFT JOIN ini_docs id ON ia.id_registro = id.id_registro
        LEFT JOIN ini_coment ic ON id.id_pdf = ic.id_pdf
        ";

        // Ejecutar la consulta
        $resultado = mysqli_query($conectar, $alumno);

        // Verificar si hay resultados
        while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
          <tr>
            <td><?php echo htmlspecialchars($row["nombre"]) . " " . htmlspecialchars($row["apellido_pa"]) . " " . htmlspecialchars($row["apellido_ma"]); ?></td>

            <td><?php echo htmlspecialchars($row["matricula"]); ?></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_prese" target="_blank">PDF</a>
            </td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_acept" target="_blank">PDF</a></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_term_ss" target="_blank">PDF</a></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=com_inscr" target="_blank">PDF</a></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=com_vig_dd" target="_blank">PDF</a></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=rep_pre_res" target="_blank">PDF</a></td>

            <td><a href="ver_documento.php?id_registro=<?php echo $row['id_registro']; ?>&documento=sol_proy" target="_blank">PDF</a></td>

            <td><?php echo htmlspecialchars($row['fecha_subida']); ?></td>

            <td>
              <?php
              echo "<a class=\"button_mod\" onclick=\"return confirm('¿Realmente deseas MODIFICAR?')\" href='modificar_estatus.php?id_registro=" . $row['id_registro'] . "'>Modificar</a>";
              ?>
            </td>

            <!-- <td><?php echo htmlspecialchars($row['comentario']); ?></td> -->

          </tr>

          <tr>
            <td></td>
            <td></td>
            <td><?php echo htmlspecialchars($row['car_prese']); ?></td>
            <td><?php echo htmlspecialchars($row['car_acept']); ?></td>
            <td><?php echo htmlspecialchars($row['car_term_ss']); ?></td>
            <td><?php echo htmlspecialchars($row['com_inscr']); ?></td>
            <td><?php echo htmlspecialchars($row['com_vig_dd']); ?></td>
            <td><?php echo htmlspecialchars($row['rep_pre_res']); ?></td>
            <td><?php echo htmlspecialchars($row['sol_proy']); ?></td>
            <td></td>
            <td></td>
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