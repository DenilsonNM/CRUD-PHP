<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí actualizarías la contraseña en la BD
    echo "Contraseña actualizada correctamente. Redirigiendo...";
    header("refresh:2; url=dashboard.php");
}
?>
