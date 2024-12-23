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
        UPDATE ini_coment AS ic
        INNER JOIN ini_docs AS id ON ic.id_pdf = id.id_pdf
        INNER JOIN info_alumno AS ia ON ia.id_registro = id.id_registro
        SET 
            ic.car_prese = ?, 
            ic.car_acept = ?, 
            ic.car_term_ss = ?, 
            ic.com_inscr = ?, 
            ic.com_vig_dd = ?, 
            ic.rep_pre_res = ?, 
            ic.sol_proy = ?, 
            ic.comentario = ?
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
          window.location.href = 'iniciales_admin.php';
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
