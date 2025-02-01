<?php
require "../main/conexion.php";


$id_user = $_GET['id_user'];

$nombre_user = $_POST['nombre_user'];
$edad_user = $_POST['edad_user'];
$correo_user = $_POST['correo_user'];
$contr_user = $_POST['contr_user'];

$consulta = "UPDATE usuarios SET nombre_user='$nombre_user', edad_user='$edad_user', correo_user='$correo_user', contr_user='$contr_user' WHERE id_user = '$id_user'";

$resultado = mysqli_query($conectar, $consulta);

if ($resultado) {
  echo "Los datos se actualizaron correctamente.";
?>
  <script>
    setTimeout(function() {
      window.location.href = 'login.php';
    }, 2000);
  </script>
<?php
} else {
  echo "Error al ejecutar la consulta: " . mysqli_error($conectar);
}
exit;
?>