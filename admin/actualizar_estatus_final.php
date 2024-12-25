<?php
require "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id_registro'])) {
  $id_registro = trim($_GET['id_registro']); // Asegurarse de que no tenga espacios adicionales.

  // Valores recibidos del formulario
  $car_prese = $_POST['car_prese'];
  $car_acept = $_POST['car_acept'];
  $car_term_ss = $_POST['car_term_ss'];
  $com_inscr = $_POST['com_inscr'];
  $com_vig_dd = $_POST['com_vig_dd'];
  $rep_pre_res = $_POST['rep_pre_res'];
  $sol_proy = $_POST['sol_proy'];
  $comentario = $_POST['comentario'];

  // Consulta preparada para actualizar
  $query = "
        UPDATE fin_coment AS fc
        INNER JOIN fin_docs AS fd ON fc.id_pdf = fd.id_pdf
        INNER JOIN info_alumno AS ia ON ia.id_registro = fd.id_registro
        SET 
            fc.car_prese = ?, 
            fc.car_acept = ?, 
            fc.car_term_ss = ?, 
            fc.com_inscr = ?, 
            fc.com_vig_dd = ?, 
            fc.rep_pre_res = ?, 
            fc.sol_proy = ?, 
            fc.comentario = ?
        WHERE ia.id_registro = ?
    ";

  $stmt = mysqli_prepare($conectar, $query);

  if ($stmt) {
    // Asociar parámetros
    mysqli_stmt_bind_param(
      $stmt,
      "ssssssssi", // Tipos de los parámetros
      $car_prese,
      $car_acept,
      $car_term_ss,
      $com_inscr,
      $com_vig_dd,
      $rep_pre_res,
      $sol_proy,
      $comentario,
      $id_registro
    );

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
      echo "Los datos se actualizaron correctamente.";
?>
      <script>
        setTimeout(function() {
          window.location.href = 'finales_admin.php';
        }, 2000);
      </script>
<?php
    } else {
      echo "Error al ejecutar la consulta: " . mysqli_error($conectar);
    }

    // Cerrar la consulta
    mysqli_stmt_close($stmt);
  } else {
    echo "Error al preparar la consulta: " . mysqli_error($conectar);
  }

  // Cerrar la conexión
  mysqli_close($conectar);
} else {
  echo "Datos inválidos.";
}
