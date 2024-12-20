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

  <section class="section_formregistro">
    <br>
    <form action="guardar_registro.php" method="post" enctype="multipart/form-data">

      <fieldset class="fieldset_info ancho">
        <div class="cajas">
          <h2>información personal del alumno</h2>
          <hr>
          <br>
          <label for="matricula">Matrícula *</label><br>
          <input type="text" id="matricula" name="matricula" required /><br><br>

          <label for="apellido_pa">Apellido Paterno *</label><br>
          <input type="text" id="apellido_pa" name="apellido_pa" required /><br><br>

          <label for="apellido_ma">Apellido Materno *</label><br>
          <input type="text" id="apellido_ma" name="apellido_ma" required /><br><br>

          <label for="nombre">Nombre(s) *</label><br>
          <input type="text" id="nombre" name="nombre" required /><br><br>

          <label for="sexo">Sexo *</label><br>
          <select id="sexo" name="sexo" required>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">helicoptero apache 1998</option>
          </select><br><br>

          <label for="correo_in">Correo Institucional *</label><br>
          <input type="email" id="correo_in" name="correo_in" required /><br><br>

          <label for="correo_ad">Correo Adicional</label><br>
          <input type="email" id="correo_ad" name="correo_ad" /><br><br>

          <label for="telefono">Teléfono de contacto *</label>
          <br>
          <input type="number" id="telefono" name="telefono" required />
        </div>

        <div class="cajas">
          <h2>información de la residencia</h2>
          <hr>
          <br>
          <label>¿Está el proyecto aprobado en el Banco de Datos? *</label><br><br>
          <input type="radio" id="banco_datos_si" name="banco_datos" value="si" required />
          <label for="banco_datos_si">Sí</label>
          <input type="radio" id="banco_datos_no" name="banco_datos" value="no" />
          <label for="banco_datos_no">No</label>
          <br><br>
          <label for="id_proyecto">ID de Proyecto de Residencia Profesional *</label><br>
          <input type="text" id="id_proyecto" name="id_proyecto" required /><br><br>

          <label for="especialidad">Especialidad *</label><br>
          <select id="especialidad" name="especialidad" required>
            <option value="Desarrollo Web y Aplicaciones Móviles">
              Desarrollo Web y Aplicaciones Móviles
            </option>
            <option value="Ciberseguridad">Ciberseguridad</option>
            <option value="Inteligencia Artificial">
              Inteligencia Artificial
            </option>
          </select><br><br>

          <label for="nom_proyecto">Nombre del Proyecto de Residencia Profesional *</label><br>
          <input type="text" id="nom_proyecto" name="nom_proyecto" required /><br><br>

          <label for="empresa">Empresa (Institución) *</label><br>
          <input type="text" id="empresa" name="empresa" required /><br><br>

        </div>

        <div class="cajas">
          <h2>información de la residencia</h2>
          <hr>
          <br>
          <label for="fecha_inicio">Fecha de Inicio de Residencia *</label><br>
          <input type="date" id="fecha_inicio" name="fecha_inicio" required /><br><br>

          <label for="fecha_fin">Fecha de Finalización de Residencia *</label><br>
          <input type="date" id="fecha_fin" name="fecha_fin" required /><br><br>

          <label for="participantes">Participantes del Proyecto *</label><br>
          <input type="text" id="participantes" name="participantes" required /><br><br>

          <label for="parti_adic">Participantes Adicionales</label><br>
          <input type="text" id="parti_adic" name="parti_adic" /><br><br>

          <label for="asesor_ex">Asesor Externo *</label><br>
          <input type="text" id="asesor_ex" name="asesor_ex" required /><br><br>

          <label for="asesor_in">Asesor Interno *</label><br>
          <input type="text" id="asesor_in" name="asesor_in" required /><br><br>
        </div>
      </fieldset>

      <br>
      <h2>SUBIDA DE DOCUMENTOS</h2>
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
              <td><input type="file" id="file1" name="car_prese" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>carta de aceptación</td>
              <td>
                <input type="file" id="file1" name="car_acept" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>carta terminacion servicio social</td>
              <td>
                <input type="file" id="file1" name="car_term_ss" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>comprobante de inscripcion de pago (semestreactual)</td>
              <td>
                <input type="file" id="file1" name="com_inscr" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>constancia de vigencia imss,isste</td>
              <td>
                <input type="file" id="file1" name="com_vig_dd" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>reporte preeliminar de residencia</td>
              <td>
                <input type="file" id="file1" name="rep_pre_res" accept="application/pdf" required>
              </td>
            </tr>

            <tr>
              <td>solicitud del proyecto</td>
              <td>
                <input type="file" id="file1" name="sol_proy" accept="application/pdf" required>
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