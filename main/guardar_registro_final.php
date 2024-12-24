<?php
require "conexion.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
  // Obtener el id_registro desde la URL
  $id_registro = $_GET['id_registro'];
  if (!$id_registro) {
    throw new Exception("ID de registro no especificado.");
  }

  // Verificar si id_registro existe en info_alumno
  $checkRegistro = "SELECT id_registro FROM info_alumno WHERE id_registro = ?";
  $stmtCheck = mysqli_prepare($conectar, $checkRegistro);
  mysqli_stmt_bind_param($stmtCheck, 'i', $id_registro);
  mysqli_stmt_execute($stmtCheck);
  $resultCheck = mysqli_stmt_get_result($stmtCheck);

  if (mysqli_num_rows($resultCheck) === 0) {
    throw new Exception("El id_registro no existe en info_alumno.");
  }

  // Leer el contenido binario de los archivos
  $car_prese = file_get_contents($_FILES['car_prese']['tmp_name']);
  $car_acept = file_get_contents($_FILES['car_acept']['tmp_name']);
  $car_term_ss = file_get_contents($_FILES['car_term_ss']['tmp_name']);
  $com_inscr = file_get_contents($_FILES['com_inscr']['tmp_name']);
  $com_vig_dd = file_get_contents($_FILES['com_vig_dd']['tmp_name']);
  $rep_pre_res = file_get_contents($_FILES['rep_pre_res']['tmp_name']);
  $sol_proy = file_get_contents($_FILES['sol_proy']['tmp_name']);

  // Iniciar transacción
  mysqli_begin_transaction($conectar);

  // Insertar en la tabla fin_docs
  $sqlFinDocs = "INSERT INTO fin_docs (
        id_registro, car_prese, car_acept, car_term_ss, com_inscr, com_vig_dd, rep_pre_res, sol_proy, fecha_subida
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

  $stmtDocs = mysqli_prepare($conectar, $sqlFinDocs);
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

  // Obtener el id_pdf generado automáticamente
  $id_pdf = mysqli_insert_id($conectar);

  // Insertar en la tabla fin_coment
  $sqlComentario = "INSERT INTO fin_coment (
        id_pdf, comentario, car_prese, car_acept, car_term_ss, com_inscr, com_vig_dd, rep_pre_res, sol_proy
    ) VALUES (?, 'Sin comentarios', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar', 'Sin revisar')";

  $stmtComentario = mysqli_prepare($conectar, $sqlComentario);
  mysqli_stmt_bind_param($stmtComentario, 'i', $id_pdf);
  mysqli_stmt_execute($stmtComentario);

  // Confirmar la transacción
  mysqli_commit($conectar);
  echo "Datos guardados correctamente.";
?>
  <script>
    setTimeout(function() {
      window.location.href = 'registro_final.php';
    }, 2000);
  </script>
<?php
} catch (Exception $e) {
  // Revertir la transacción en caso de error
  mysqli_rollback($conectar);
  die("Error al guardar los datos: " . $e->getMessage());
}
?>