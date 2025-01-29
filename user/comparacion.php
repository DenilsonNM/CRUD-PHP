<?php
require "conexion.php";

$nom_admin = $_POST["nom_admin"];
$contr_admin = $_POST["contr_admin"];

session_start();

$query = mysqli_query($conectar, "SELECT * FROM us_admin WHERE nom_admin = '$nom_admin' AND contr_admin = '$contr_admin'");

if ($query && mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);

    $_SESSION['nom_admin'] = $row['nom_admin'];

    header("location: index_admin.php");
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