<?php
require "conexion.php";

$correo_user = $_POST["correo_user"];
$contr_user = $_POST["contr_user"];

session_start();

$query = mysqli_query($conectar, "SELECT * FROM usuarios WHERE correo_user = '$correo_user' AND contr_user = '$contr_user'");

if ($query && mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);

    $_SESSION['nombre_user'] = $row['nombre_user'];
    $_SESSION['id_user'] = $row['id_user'];

    header("location: ../main/menu_registro.php");
    exit;
} else {
    include("login.php");
?>
    <div class="mensaje_login">
        <h1>Usuario o Contraseña Incorrecta</h1>
    </div>
<?php
    exit;
}
?>