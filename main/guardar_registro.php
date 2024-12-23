<?php
require "conexion.php";

// Obtener los datos del formulario
$matricula = $_POST['matricula'];
$apellido_pa = $_POST['apellido_pa'];
$apellido_ma = $_POST['apellido_ma'];
$nombre = $_POST['nombre'];
$sexo = $_POST['sexo'];
$correo_in = $_POST['correo_in'];
$correo_ad = $_POST['correo_ad'];
$telefono = $_POST['telefono'];
$banco_datos = $_POST['banco_datos'];
$id_proyecto = $_POST['id_proyecto'];
$especialidad = $_POST['especialidad'];
$nom_proyecto = $_POST['nom_proyecto'];
$empresa = $_POST['empresa'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$participantes = $_POST['participantes'];
$parti_adic = $_POST['parti_adic'];
$asesor_ex = $_POST['asesor_ex'];
$asesor_in = $_POST['asesor_in'];

// Subir y manejar los archivos correctamente
$car_prese = file_get_contents($_FILES['car_prese']['tmp_name']);
$car_acept = file_get_contents($_FILES['car_acept']['tmp_name']);
$car_term_ss = file_get_contents($_FILES['car_term_ss']['tmp_name']);
$com_inscr = file_get_contents($_FILES['com_inscr']['tmp_name']);
$com_vig_dd = file_get_contents($_FILES['com_vig_dd']['tmp_name']);
$rep_pre_res = file_get_contents($_FILES['rep_pre_res']['tmp_name']);
$sol_proy = file_get_contents($_FILES['sol_proy']['tmp_name']);

try {
  // Iniciar transacción
  mysqli_begin_transaction($conectar);

  // Insertar en info_alumno
  $sqlInfoAlumno = "INSERT INTO info_alumno (
        matricula, apellido_pa, apellido_ma, nombre, sexo, correo_in, correo_ad, telefono, banco_datos,id_proyecto, especialidad, nom_proyecto, empresa, fecha_inicio, fecha_fin, participantes, parti_adic, asesor_ex, asesor_in
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conectar, $sqlInfoAlumno);
  mysqli_stmt_bind_param(
    $stmt,
    'ssssssssissssssssss',
    $matricula,
    $apellido_pa,
    $apellido_ma,
    $nombre,
    $sexo,
    $correo_in,
    $correo_ad,
    $telefono,
    $banco_datos,
    $id_proyecto,
    $especialidad,
    $nom_proyecto,
    $empresa,
    $fecha_inicio,
    $fecha_fin,
    $participantes,
    $parti_adic,
    $asesor_ex,
    $asesor_in
  );
  mysqli_stmt_execute($stmt);

  // Obtener el id_registro
  $id_registro = mysqli_insert_id($conectar);

  // Insertar en ini_docs
  $sqlIniDocs = "INSERT INTO ini_docs (
        id_registro, car_prese, car_acept, car_term_ss, com_inscr, com_vig_dd, rep_pre_res, sol_proy, fecha_subida
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

  $stmtDocs = mysqli_prepare($conectar, $sqlIniDocs);
  mysqli_stmt_bind_param(
    $stmtDocs,
    'isssssss',
    $id_registro,
    $car_prese,
    $car_acept,
    $car_term_ss,
    $com_inscr,
    $com_vig_dd,
    $rep_pre_res,
    $sol_proy
  );
  mysqli_stmt_execute($stmtDocs);

  // Obtener el id_pdf generado para relacionar con ini_coment
  $id_pdf = mysqli_insert_id($conectar);

  // Insertar comentario en ini_coment
  $sqlComentario = "INSERT INTO ini_coment (id_pdf, comentario, car_prese, car_acept, car_term_ss, com_inscr, com_vig_dd, rep_pre_res, sol_proy) VALUES (?, 'Sin comentarios', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar')";
  $stmtComentario = mysqli_prepare($conectar, $sqlComentario);
  mysqli_stmt_bind_param($stmtComentario, 'i', $id_pdf);
  mysqli_stmt_execute($stmtComentario);

  // Confirmar transacción
  mysqli_commit($conectar);
  echo "Datos guardados correctamente.";
?>
  <script>
    setTimeout(function() {
      window.location.href = 'registro.php';
    }, 2000);
  </script>
<?php
} catch (Exception $e) {
  // Revertir transacción
  mysqli_rollback($conectar);
  echo "Error al guardar los datos: " . $e->getMessage();
}
