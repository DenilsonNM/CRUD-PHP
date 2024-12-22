<?php
require "conexion.php";

$nom_admin = $_POST["nom_admin"];
$contr_admin = $_POST["contr_admin"];

session_start();

$query = mysqli_query($conectar, "SELECT * FROM us_admin WHERE nom_admin = '$nom_admin' AND contr_admin = '$contr_admin'");

$nr = mysqli_num_rows($query);

if ($nr == 1) {

    $row = mysqli_fetch_assoc($query);

    header("location: ");
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
