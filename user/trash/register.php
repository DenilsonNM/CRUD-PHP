<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Guardar en la BD (simulación)
    // Aquí conectarías con MySQL usando PDO o MySQLi

    // Envío de correo con las credenciales
    $asunto = "Registro Exitoso - Tus Credenciales";
    $mensaje = "Hola $nombre,\n\nTu cuenta ha sido creada.\nUsuario: $usuario\nContraseña: $contraseña\n\nIngresa y cambia tu contraseña.";
    $cabeceras = "From: no-reply@tuempresa.com";

    if (mail($email, $asunto, $mensaje, $cabeceras)) {
        echo "Registro exitoso. Revisa tu correo.";
    } else {
        echo "Error al enviar el correo.";
    }
}
?>
