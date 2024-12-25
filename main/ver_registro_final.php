<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../styles/main.css">

</head>

<body>

  <?php
  include "header_menu_reg.php"
  ?>

  <section class="section_buscar">
    <form action="" method="post" class="ancho">
      <label for="matricula">Matrícula:</label>
      <input type="text" name="matricula" required id="matricula">
      <button type="submit">Buscar</button>
    </form>
  </section>

  <section class="ancho">
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
          <th>Comentario</th>
          <th>Fecha de Subida</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require "conexion.php";

        // Verificar si se ha enviado el formulario
        if (isset($_POST['matricula'])) {
          $matricula = $_POST['matricula'];

          // Consulta con JOIN para obtener los datos relacionados de info_alumno, ini_docs y ini_coment
          $alumno = "
        SELECT
          ia.id_registro, ia.nombre, ia.apellido_pa, ia.apellido_ma, ia.matricula, 
          fd.car_prese, fd.car_acept, fd.car_term_ss, fd.com_inscr, fd.com_vig_dd, 
          fd.rep_pre_res, fd.sol_proy, fc.comentario, fd.fecha_subida, fc.car_prese, fc.car_acept, fc.car_term_ss, fc.com_inscr, fc.com_vig_dd, fc.rep_pre_res, fc.sol_proy
        FROM info_alumno ia
        LEFT JOIN fin_docs fd ON ia.id_registro = fd.id_registro
        LEFT JOIN fin_coment fc ON fd.id_pdf = fc.id_pdf
        WHERE ia.matricula = '$matricula'
        ";

          // Ejecutar la consulta
          $resultado = mysqli_query($conectar, $alumno);

          // Verificar si hay resultados
          if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
              <tr>
                <td><?php echo htmlspecialchars($row["nombre"]) . " " . htmlspecialchars($row["apellido_pa"]) . " " . htmlspecialchars($row["apellido_ma"]); ?></td>

                <td><?php echo htmlspecialchars($row["matricula"]); ?></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_prese" target="_blank">PDF</a>
                </td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_acept" target="_blank">PDF</a></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=car_term_ss" target="_blank">PDF</a></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=com_inscr" target="_blank">PDF</a></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=com_vig_dd" target="_blank">PDF</a></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=rep_pre_res" target="_blank">PDF</a></td>

                <td><a href="ver_documento_final.php?id_registro=<?php echo $row['id_registro']; ?>&documento=sol_proy" target="_blank">PDF</a></td>

                <td><?php echo htmlspecialchars($row['comentario']); ?></td>

                <td><?php echo htmlspecialchars($row['fecha_subida']); ?></td>
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
          } else {
            echo "<tr><td colspan='11'>No se encontraron resultados para la matrícula '$matricula'.</td></tr>";
          }

          mysqli_free_result($resultado);
        }

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