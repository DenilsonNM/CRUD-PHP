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

  <?php
  require "conexion.php";

  if (isset($_GET['id_registro'])) {

    $id_registro = $_GET['id_registro'];
    // echo $id_registro;
    $alumno = "
            SELECT
              ia.id_registro, ia.nombre, ia.apellido_pa, ia.apellido_ma, ia.matricula, 
              ic.car_prese, ic.car_acept, ic.car_term_ss, ic.com_inscr, ic.com_vig_dd, 
              ic.rep_pre_res, ic.sol_proy, ic.comentario, id.fecha_subida
            FROM info_alumno ia
            LEFT JOIN ini_docs id ON ia.id_registro = id.id_registro
            LEFT JOIN ini_coment ic ON id.id_pdf = ic.id_pdf
            WHERE ia.id_registro = $id_registro";

    $resultado = mysqli_query($conectar, $alumno);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
      $estatus = mysqli_fetch_assoc($resultado);

      $id_registro = $estatus['id_registro'];
      $nombre = $estatus['nombre'];
      $apellido_pa = $estatus['apellido_pa'];
      $apellido_ma = $estatus['apellido_ma'];
      $matricula = $estatus['matricula'];
      $car_prese = $estatus['car_prese'];
      $car_acept = $estatus['car_acept'];
      $car_term_ss = $estatus['car_term_ss'];
      $com_inscr = $estatus['com_inscr'];
      $com_vig_dd = $estatus['com_vig_dd'];
      $rep_pre_res = $estatus['rep_pre_res'];
      $sol_proy = $estatus['sol_proy'];
      $comentario = $estatus['comentario'];
      $fecha_subida = $estatus['fecha_subida'];
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
    <a href="iniciales_admin.php" class="button_mod">Volver</a>

  </div>
  <section class="section_table_admin ancho">

    <form action="actualizar_estatus.php?id_registro=<?= trim($id_registro) ?>" method="POST">


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
            <th></th>
          </tr>
        </thead>

        <tbody>

          <tr>
            <td><?php echo htmlspecialchars($estatus["nombre"]) . " " . htmlspecialchars($estatus["apellido_pa"]) . " " . htmlspecialchars($estatus["apellido_ma"]); ?></td>

            <td><?php echo htmlspecialchars($estatus["matricula"]); ?></td>

            <td>
              <select name="car_prese" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($car_prese == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($car_prese == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="car_acept" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($car_acept == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($car_acept == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="car_term_ss" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($car_term_ss == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($car_term_ss == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="com_inscr" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($com_inscr == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($com_inscr == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="com_vig_dd" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($com_vig_dd == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($com_vig_dd == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="rep_pre_res" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($rep_pre_res == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($rep_pre_res == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td>
              <select name="sol_proy" required>
                <option value="">Seleccione...</option>
                <option value="Aprobado" <?php if ($sol_proy == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                <option value="Rechazado" <?php if ($sol_proy == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
              </select>
            </td>

            <td><textarea name="comentario" style="white-space: pre-wrap;" required><?= htmlspecialchars($comentario) ?></textarea></td>

            <td>
              <button class="button_mod" type="submit" onclick="return confirm('¿Estás seguro de que desea continuar?')">Actualizar</button>
            </td>

          </tr>

          <?php
          mysqli_free_result($resultado);
          mysqli_close($conectar);
          ?>
        </tbody>
      </table>
    </form>
  </section>

  <?php
  include "../footer.php"
  ?>

</body>

</html>