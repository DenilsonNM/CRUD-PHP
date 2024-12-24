<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Final</title>
  <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
  <?php
  include "header_menu_reg.php"
  ?>

  <section class="section_formregistro">
    <br>
    <section class="section_buscar">
      <form action="" method="post" class="ancho">
        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" required id="matricula">
        <button type="submit">Buscar</button>
      </form>
    </section>
  </section>

  <?php
  require "conexion.php";

  // Verificar si se ha enviado el formulario

  if (!empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];

    $alumno = "
        SELECT
            ia.id_registro, ia.nombre, ia.apellido_pa, ia.apellido_ma, ia.matricula
        FROM info_alumno ia
        LEFT JOIN fin_docs fd ON ia.id_registro = fd.id_registro
        LEFT JOIN fin_coment fc ON fd.id_pdf = fc.id_pdf
        WHERE ia.matricula = '$matricula'
    ";

    $resultado = mysqli_query($conectar, $alumno);

    if (mysqli_num_rows($resultado) > 0) {
      $id_registro = null;

      while ($row = mysqli_fetch_assoc($resultado)) {
        $id_registro = $row['id_registro'];
  ?>
        <div class="div_respuesta_reg_fin">
          <p>Alumno: <?= htmlspecialchars($row["nombre"]) . " " . htmlspecialchars($row["apellido_pa"]) . " " . htmlspecialchars($row["apellido_ma"]); ?></p>
        </div>
  <?php
      }

      $action_url = $id_registro ? "guardar_registro_final.php?id_registro=" . htmlspecialchars($id_registro) : "#";
    } else {
      echo "<p>No se encontraron resultados para la matrícula '$matricula'.</p>";
      $action_url = "#";
    }
  } else {
    $action_url = "#";
  }
  ?>

  <section class="section_formregistro">
    <form action="<?= $action_url ?>" method="post" enctype="multipart/form-data">
      <br>
      <h2>SUBIDA DE DOCUMENTOS FINALES</h2>
      <br>

      <fieldset class="fieldset_info ancho">

        <table class="table_docs">

          <thead>
            <tr>
              <th>Documento</th>
              <th>Subir Archivo</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>carta de presentacón</td>
              <td><input type="file" id="car_prese" name="car_prese" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>carta de aceptación</td>
              <td>
                <input type="file" id="car_acept" name="car_acept" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>carta terminacion servicio social</td>
              <td>
                <input type="file" id="car_term_ss" name="car_term_ss" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>comprobante de inscripcion de pago (semestreactual)</td>
              <td>
                <input type="file" id="com_inscr" name="com_inscr" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>constancia de vigencia imss,isste</td>
              <td>
                <input type="file" id="com_vig_dd" name="com_vig_dd" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>reporte preeliminar de residencia</td>
              <td>
                <input type="file" id="rep_pre_res" name="rep_pre_res" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>solicitud del proyecto</td>
              <td>
                <input type="file" id="sol_proy" name="sol_proy" accept="application/pdf" required>
              </td>
            </tr>
          </tbody>
        </table>
      </fieldset>
      <br>
      <button type="submit">Enviar</button>
      <br><br>
    </form>
  </section>

  <?php
  include "../footer.php"
  ?>

</body>

</html>