<?php
require "conexion.php";

$usuario = $_POST["usuario"];
$contr = $_POST["contr"];

session_start();

$query = mysqli_query($conectar, "SELECT * FROM admini WHERE usuario = '$usuario' AND contr = '$contr'");

$nr = mysqli_num_rows($query);

if ($nr == 1) {

    $row = mysqli_fetch_assoc($query);

    header("location: admin/doc.php");
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
mysqli_free_result($query);
mysqli_close($conectar);
